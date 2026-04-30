<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Subcategory;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;

class AdminCatalogController extends BaseController
{
    private Category $categoryModel;
    private Subcategory $subcategoryModel;
    private Product $productModel;
    private ProductImage $productImageModel;

    public function __construct()
    {
        $this->categoryModel     = new Category();
        $this->subcategoryModel  = new Subcategory();
        $this->productModel      = new Product();
        $this->productImageModel = new ProductImage();
        helper(['form', 'text']);
    }

    private function ensureAdmin()
    {
        if (session()->get('admin_logged_in') !== true) {
            return redirect()->to('/morris-admin-login')->with('error', 'Please login first.');
        }

        return null;
    }

    private function adminView(string $view, array $data = [])
    {
        return view($view, array_merge([
            'adminName' => (string) session()->get('admin_name'),
            'adminRole' => (string) session()->get('admin_role'),
        ], $data));
    }

    public function categories()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $perPage = 10;
        $group   = 'categories';

        return $this->adminView('admin/categories/list', [
            'categories'  => $this->categoryModel->orderBy('id', 'DESC')->paginate($perPage, $group),
            'pager'       => $this->categoryModel->pager,
            'currentPage' => (int) ($this->request->getVar('page_' . $group) ?? 1),
            'perPage'     => $perPage,
        ]);
    }

    public function createCategory()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        return $this->adminView('admin/categories/form', [
            'pageTitle' => 'Add Category',
            'action'    => base_url('admin/categories/store'),
            'category'  => null,
        ]);
    }

    public function storeCategory()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $name = trim((string) $this->request->getPost('name'));

        if (! $this->validateCategory()) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->categoryModel->insert([
            'name'           => $name,
            'slug'           => $this->uniqueSlug($this->categoryModel, url_title($name, '-', true)),
            'thumbnail'      => $this->storeOptionalUpload($this->request->getFile('thumbnail'), 'uploads/categories'),
            'description'    => trim((string) $this->request->getPost('description')),
            'catalogue_file' => $this->storeOptionalUpload($this->request->getFile('catalogue_file'), 'uploads/catalogues'),
            'status'         => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/categories')->with('success', 'Category added successfully.');
    }

    public function editCategory($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $category = $this->categoryModel->find((int) $id);
        if ($category === null) {
            return redirect()->to('/admin/categories')->with('error', 'Category not found.');
        }

        return $this->adminView('admin/categories/form', [
            'pageTitle' => 'Edit Category',
            'action'    => base_url('admin/categories/update/' . $id),
            'category'  => $category,
        ]);
    }

    public function updateCategory($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $category = $this->categoryModel->find((int) $id);
        if ($category === null) {
            return redirect()->to('/admin/categories')->with('error', 'Category not found.');
        }

        $name = trim((string) $this->request->getPost('name'));

        if (! $this->validateCategory()) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $slugBase = url_title($name, '-', true);
        $slug     = $category['slug'];
        if ($category['name'] !== $name) {
            $slug = $this->uniqueSlug($this->categoryModel, $slugBase, (int) $id);
        }

        $thumbnailPath = $category['thumbnail'] ?? null;
        $thumbnailFile = $this->request->getFile('thumbnail');
        if ($thumbnailFile && $thumbnailFile->isValid() && $thumbnailFile->getError() !== UPLOAD_ERR_NO_FILE) {
            $thumbnailPath = $this->storeUpload($thumbnailFile, 'uploads/categories');
            $this->deleteFileIfExists($category['thumbnail'] ?? null);
        }

        $cataloguePath = $category['catalogue_file'] ?? null;
        $catalogueFile = $this->request->getFile('catalogue_file');
        if ($catalogueFile && $catalogueFile->isValid() && $catalogueFile->getError() !== UPLOAD_ERR_NO_FILE) {
            $cataloguePath = $this->storeUpload($catalogueFile, 'uploads/catalogues');
            $this->deleteFileIfExists($category['catalogue_file'] ?? null);
        }

        $this->categoryModel->update((int) $id, [
            'name'           => $name,
            'slug'           => $slug,
            'thumbnail'      => $thumbnailPath,
            'description'    => trim((string) $this->request->getPost('description')),
            'catalogue_file' => $cataloguePath,
            'status'         => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/categories')->with('success', 'Category updated successfully.');
    }

    public function deleteCategory($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $category = $this->categoryModel->find((int) $id);
        if ($category !== null) {
            $this->deleteFileIfExists($category['thumbnail'] ?? null);
            $this->deleteFileIfExists($category['catalogue_file'] ?? null);
            $this->categoryModel->delete((int) $id);
        }

        return redirect()->to('/admin/categories')->with('success', 'Category deleted successfully.');
    }

    public function subcategories()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $perPage = 10;
        $group   = 'subcategories';

        $subcategories = $this->subcategoryModel
            ->select('subcategories.*, categories.name as category_name')
            ->join('categories', 'categories.id = subcategories.category_id')
            ->orderBy('subcategories.id', 'DESC')
            ->paginate($perPage, $group);

        return $this->adminView('admin/subcategories/list', [
            'subcategories' => $subcategories,
            'pager'         => $this->subcategoryModel->pager,
            'currentPage'   => (int) ($this->request->getVar('page_' . $group) ?? 1),
            'perPage'       => $perPage,
        ]);
    }

    public function createSubcategory()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        return $this->adminView('admin/subcategories/form', [
            'pageTitle'    => 'Add Subcategory',
            'action'       => base_url('admin/subcategories/store'),
            'subcategory'  => null,
            'categories'   => $this->activeCategories(),
        ]);
    }

    public function storeSubcategory()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        if ($response = $this->validateSubcategoryRequest()) {
            return $response;
        }

        $name = trim((string) $this->request->getPost('name'));

        $this->subcategoryModel->insert([
            'category_id' => (int) $this->request->getPost('category_id'),
            'name'        => $name,
            'slug'        => $this->uniqueSlug($this->subcategoryModel, url_title($name, '-', true)),
            'thumbnail'   => $this->storeOptionalUpload($this->request->getFile('thumbnail'), 'uploads/subcategories'),
            'status'      => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/subcategories')->with('success', 'Subcategory added successfully.');
    }

    public function editSubcategory($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $subcategory = $this->subcategoryModel->find((int) $id);
        if ($subcategory === null) {
            return redirect()->to('/admin/subcategories')->with('error', 'Subcategory not found.');
        }

        return $this->adminView('admin/subcategories/form', [
            'pageTitle'   => 'Edit Subcategory',
            'action'      => base_url('admin/subcategories/update/' . $id),
            'subcategory' => $subcategory,
            'categories'  => $this->activeCategories(),
        ]);
    }

    public function updateSubcategory($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $subcategory = $this->subcategoryModel->find((int) $id);
        if ($subcategory === null) {
            return redirect()->to('/admin/subcategories')->with('error', 'Subcategory not found.');
        }

        if ($response = $this->validateSubcategoryRequest()) {
            return $response;
        }

        $name = trim((string) $this->request->getPost('name'));
        $slug = $subcategory['slug'];
        if ($subcategory['name'] !== $name) {
            $slug = $this->uniqueSlug($this->subcategoryModel, url_title($name, '-', true), (int) $id);
        }

        $thumbnailPath = $subcategory['thumbnail'] ?? null;
        $thumbnailFile = $this->request->getFile('thumbnail');
        if ($thumbnailFile && $thumbnailFile->isValid() && $thumbnailFile->getError() !== UPLOAD_ERR_NO_FILE) {
            $thumbnailPath = $this->storeUpload($thumbnailFile, 'uploads/subcategories');
            $this->deleteFileIfExists($subcategory['thumbnail'] ?? null);
        }

        $this->subcategoryModel->update((int) $id, [
            'category_id' => (int) $this->request->getPost('category_id'),
            'name'        => $name,
            'slug'        => $slug,
            'thumbnail'   => $thumbnailPath,
            'status'      => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/subcategories')->with('success', 'Subcategory updated successfully.');
    }

    public function deleteSubcategory($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $subcategory = $this->subcategoryModel->find((int) $id);
        if ($subcategory !== null) {
            $this->deleteFileIfExists($subcategory['thumbnail'] ?? null);
            $this->subcategoryModel->delete((int) $id);
        }

        return redirect()->to('/admin/subcategories')->with('success', 'Subcategory deleted successfully.');
    }

    public function products()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $perPage = 10;
        $group   = 'products';

        $products = $this->productModel
            ->select('products.*, categories.name as category_name, subcategories.name as subcategory_name')
            ->join('categories', 'categories.id = products.category_id')
            ->join('subcategories', 'subcategories.id = products.subcategory_id', 'left')
            ->orderBy('products.id', 'DESC')
            ->paginate($perPage, $group);

        $galleryMap = [];
        $productIds = array_column($products, 'id');
        if ($productIds !== []) {
            foreach ($this->productImageModel->whereIn('product_id', $productIds)->orderBy('sort_order', 'ASC')->findAll() as $image) {
                $galleryMap[$image['product_id']][] = $image;
            }
        }

        return $this->adminView('admin/products/list', [
            'products'          => $products,
            'productGalleryMap' => $galleryMap,
            'pager'             => $this->productModel->pager,
            'currentPage'       => (int) ($this->request->getVar('page_' . $group) ?? 1),
            'perPage'           => $perPage,
        ]);
    }

    public function createProduct()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        return $this->adminView('admin/products/form', $this->productFormData([
            'pageTitle' => 'Add Product',
            'action'    => base_url('admin/products/store'),
            'product'   => null,
            'gallery'   => [],
        ]));
    }

    public function storeProduct()
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        if ($response = $this->validateProductRequest(true)) {
            return $response;
        }

        $db = Database::connect();
        $db->transStart();

        $name      = trim((string) $this->request->getPost('name'));
        $slugInput = trim((string) $this->request->getPost('slug'));
        $productId = $this->productModel->insert([
            'category_id'         => (int) $this->request->getPost('category_id'),
            'subcategory_id'      => $this->normalizeSubcategoryId(),
            'name'                => $name,
            'slug'                => $this->uniqueSlug($this->productModel, url_title($slugInput !== '' ? $slugInput : $name, '-', true)),
            'type'                => trim((string) $this->request->getPost('type')),
            'thumbnail'           => $this->storeUpload($this->request->getFile('thumbnail')),
            'product_information' => $this->normalizeRichText($this->request->getPost('product_information')),
            'features'            => $this->normalizeRichText($this->request->getPost('features')),
            'status'              => (string) $this->request->getPost('status'),
        ], true);

        $this->appendGalleryImages($productId, $this->request->getFileMultiple('gallery') ?? []);

        $db->transComplete();

        if (! $db->transStatus()) {
            return redirect()->back()->withInput()->with('error', 'Unable to save the product right now.');
        }

        return redirect()->to('/admin/products')->with('success', 'Product added successfully.');
    }

    public function editProduct($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $product = $this->productModel->find((int) $id);
        if ($product === null) {
            return redirect()->to('/admin/products')->with('error', 'Product not found.');
        }

        return $this->adminView('admin/products/form', $this->productFormData([
            'pageTitle' => 'Edit Product',
            'action'    => base_url('admin/products/update/' . $id),
            'product'   => $product,
            'gallery'   => $this->productImageModel->where('product_id', (int) $id)->orderBy('sort_order', 'ASC')->findAll(),
        ]));
    }

    public function updateProduct($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $product = $this->productModel->find((int) $id);
        if ($product === null) {
            return redirect()->to('/admin/products')->with('error', 'Product not found.');
        }

        if ($response = $this->validateProductRequest(false)) {
            return $response;
        }

        $thumbnailPath = $product['thumbnail'];
        $thumbnailFile = $this->request->getFile('thumbnail');
        if ($thumbnailFile && $thumbnailFile->isValid() && $thumbnailFile->getError() !== UPLOAD_ERR_NO_FILE) {
            $thumbnailPath = $this->storeUpload($thumbnailFile);
            $this->deleteFileIfExists($product['thumbnail']);
        }

        $name = trim((string) $this->request->getPost('name'));
        $slugInput = trim((string) $this->request->getPost('slug'));
        $slug = $product['slug'];
        $normalizedSlugInput = url_title($slugInput !== '' ? $slugInput : $name, '-', true);
        if ($product['name'] !== $name || $product['slug'] !== $normalizedSlugInput) {
            $slug = $this->uniqueSlug($this->productModel, $normalizedSlugInput, (int) $id);
        }

        $db = Database::connect();
        $db->transStart();

        $this->productModel->update((int) $id, [
            'category_id'         => (int) $this->request->getPost('category_id'),
            'subcategory_id'      => $this->normalizeSubcategoryId(),
            'name'                => $name,
            'slug'                => $slug,
            'type'                => trim((string) $this->request->getPost('type')),
            'thumbnail'           => $thumbnailPath,
            'product_information' => $this->normalizeRichText($this->request->getPost('product_information')),
            'features'            => $this->normalizeRichText($this->request->getPost('features')),
            'status'              => (string) $this->request->getPost('status'),
        ]);

        $deletedImageIds = $this->request->getPost('delete_gallery') ?? [];
        if (is_array($deletedImageIds) && $deletedImageIds !== []) {
            foreach ($this->productImageModel->whereIn('id', $deletedImageIds)->findAll() as $image) {
                $this->deleteFileIfExists($image['image']);
                $this->productImageModel->delete((int) $image['id']);
            }
        }

        $this->appendGalleryImages((int) $id, $this->request->getFileMultiple('gallery') ?? []);

        $db->transComplete();

        if (! $db->transStatus()) {
            return redirect()->back()->withInput()->with('error', 'Unable to update the product right now.');
        }

        return redirect()->to('/admin/products')->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        if ($redirect = $this->ensureAdmin()) {
            return $redirect;
        }

        $product = $this->productModel->find((int) $id);
        if ($product !== null) {
            $this->deleteFileIfExists($product['thumbnail']);
            foreach ($this->productImageModel->where('product_id', (int) $id)->findAll() as $image) {
                $this->deleteFileIfExists($image['image']);
            }
            $this->productModel->delete((int) $id);
        }

        return redirect()->to('/admin/products')->with('success', 'Product deleted successfully.');
    }

    public function subcategoriesByCategory($categoryId): ResponseInterface
    {
        if (session()->get('admin_logged_in') !== true) {
            return $this->response->setStatusCode(401)->setJSON(['message' => 'Unauthorized']);
        }

        return $this->response->setJSON(
            $this->subcategoryModel
                ->where('category_id', (int) $categoryId)
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll()
        );
    }

    public function quickStoreCategory(): ResponseInterface
    {
        if (session()->get('admin_logged_in') !== true) {
            return $this->response->setStatusCode(401)->setJSON(['message' => 'Unauthorized']);
        }

        $name = trim((string) $this->request->getPost('name'));
        $status = (string) ($this->request->getPost('status') ?: 'active');

        if ($name === '') {
            return $this->response->setStatusCode(422)->setJSON(['message' => 'Category name is required.']);
        }

        $id = $this->categoryModel->insert([
            'name'   => $name,
            'slug'   => $this->uniqueSlug($this->categoryModel, url_title($name, '-', true)),
            'status' => $status,
        ], true);

        return $this->response->setJSON([
            'id'   => $id,
            'name' => $name,
        ]);
    }

    public function quickStoreSubcategory(): ResponseInterface
    {
        if (session()->get('admin_logged_in') !== true) {
            return $this->response->setStatusCode(401)->setJSON(['message' => 'Unauthorized']);
        }

        $categoryId = (int) $this->request->getPost('category_id');
        $name       = trim((string) $this->request->getPost('name'));
        $status     = (string) ($this->request->getPost('status') ?: 'active');

        if ($categoryId < 1 || $this->categoryModel->find($categoryId) === null) {
            return $this->response->setStatusCode(422)->setJSON(['message' => 'Select a valid category first.']);
        }

        if ($name === '') {
            return $this->response->setStatusCode(422)->setJSON(['message' => 'Subcategory name is required.']);
        }

        $id = $this->subcategoryModel->insert([
            'category_id' => $categoryId,
            'name'        => $name,
            'slug'        => $this->uniqueSlug($this->subcategoryModel, url_title($name, '-', true)),
            'status'      => $status,
        ], true);

        return $this->response->setJSON([
            'id'   => $id,
            'name' => $name,
        ]);
    }

    private function productFormData(array $data): array
    {
        return array_merge($data, [
            'categories'    => $this->activeCategories(),
            'subcategories' => $this->subcategoryModel->where('status', 'active')->orderBy('name', 'ASC')->findAll(),
        ]);
    }

    private function activeCategories(): array
    {
        return $this->categoryModel->where('status', 'active')->orderBy('name', 'ASC')->findAll();
    }

    private function validateCategory(): bool
    {
        return $this->validate([
            'name'           => 'required|min_length[2]|max_length[150]',
            'description'    => 'permit_empty',
            'thumbnail'      => 'if_exist|is_image[thumbnail]|max_size[thumbnail,4096]',
            'catalogue_file' => 'if_exist|ext_in[catalogue_file,pdf]|max_size[catalogue_file,10240]',
            'status'         => 'required|in_list[active,inactive]',
        ]);
    }

    private function validateSubcategoryRequest()
    {
        if (! $this->validate([
            'category_id' => 'required|integer',
            'name'        => 'required|min_length[2]|max_length[150]',
            'thumbnail'   => 'if_exist|is_image[thumbnail]|max_size[thumbnail,4096]',
            'status'      => 'required|in_list[active,inactive]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($this->categoryModel->find((int) $this->request->getPost('category_id')) === null) {
            return redirect()->back()->withInput()->with('error', 'Selected category was not found.');
        }

        return null;
    }

    private function validateProductRequest(bool $thumbnailRequired)
    {
        $thumbnailRule = $thumbnailRequired
            ? 'uploaded[thumbnail]|is_image[thumbnail]|max_size[thumbnail,4096]'
            : 'if_exist|is_image[thumbnail]|max_size[thumbnail,4096]';

        if (! $this->validate([
            'category_id'         => 'required|integer',
            'name'                => 'required|min_length[2]|max_length[180]',
            'slug'                => 'permit_empty|min_length[2]|max_length[220]',
            'type'                => 'permit_empty|max_length[100]',
            'product_information' => 'permit_empty',
            'features'            => 'permit_empty',
            'status'              => 'required|in_list[active,inactive]',
            'thumbnail'           => $thumbnailRule,
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $categoryId = (int) $this->request->getPost('category_id');
        $subcategoryId = $this->normalizeSubcategoryId();

        if ($this->categoryModel->find($categoryId) === null) {
            return redirect()->back()->withInput()->with('error', 'Selected category was not found.');
        }

        if ($subcategoryId !== null) {
            $subcategory = $this->subcategoryModel->find($subcategoryId);
            if ($subcategory === null || (int) $subcategory['category_id'] !== $categoryId) {
                return redirect()->back()->withInput()->with('error', 'Selected subcategory is invalid for this category.');
            }
        }

        return null;
    }

    private function normalizeSubcategoryId(): ?int
    {
        $subcategoryId = $this->request->getPost('subcategory_id');
        return $subcategoryId !== null && $subcategoryId !== '' ? (int) $subcategoryId : null;
    }

    private function normalizeRichText($value): ?string
    {
        $html = trim((string) $value);

        if ($html === '') {
            return null;
        }

        $text = trim(str_replace("\xc2\xa0", ' ', html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8')));
        $withoutEmptyMarkup = preg_replace('/(&nbsp;|\s|<br\s*\/?>|<\/?(p|div|span|strong|em|u|s|ul|ol|li|blockquote|h[1-6])[^>]*>)+/i', '', $html);

        if ($text === '' && trim((string) $withoutEmptyMarkup) === '') {
            return null;
        }

        return $html;
    }

    private function appendGalleryImages(int $productId, array $galleryFiles): void
    {
        $currentMax = (int) ($this->productImageModel
            ->selectMax('sort_order')
            ->where('product_id', $productId)
            ->first()['sort_order'] ?? 0);

        foreach ($galleryFiles as $galleryFile) {
            if (! $galleryFile->isValid() || $galleryFile->getError() === UPLOAD_ERR_NO_FILE) {
                continue;
            }

            if (! in_array($galleryFile->getMimeType(), ['image/jpeg', 'image/png', 'image/webp', 'image/gif'], true)) {
                continue;
            }

            $currentMax++;
            $this->productImageModel->insert([
                'product_id' => $productId,
                'image'      => $this->storeUpload($galleryFile),
                'sort_order' => $currentMax,
            ]);
        }
    }

    private function uniqueSlug($model, string $slugBase, ?int $ignoreId = null): string
    {
        $slugBase = $slugBase !== '' ? $slugBase : strtolower(random_string('alnum', 8));
        $slug = $slugBase;
        $counter = 1;

        while (true) {
            $query = $model->where('slug', $slug);
            if ($ignoreId !== null) {
                $query = $query->where('id !=', $ignoreId);
            }

            if ($query->countAllResults() === 0) {
                return $slug;
            }

            $slug = $slugBase . '-' . $counter;
            $counter++;
        }
    }

    private function storeUpload($file, string $directory = 'uploads/products'): string
    {
        $uploadPath = FCPATH . trim($directory, '/\\');
        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $newName = $file->getRandomName();
        $file->move($uploadPath, $newName);

        return trim($directory, '/\\') . '/' . $newName;
    }

    private function storeOptionalUpload($file, string $directory): ?string
    {
        if ($file && $file->isValid() && $file->getError() !== UPLOAD_ERR_NO_FILE) {
            return $this->storeUpload($file, $directory);
        }

        return null;
    }

    private function deleteFileIfExists(?string $relativePath): void
    {
        if ($relativePath === null || $relativePath === '') {
            return;
        }

        $fullPath = FCPATH . ltrim($relativePath, '/\\');
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }
}
