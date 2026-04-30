<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use CodeIgniter\HTTP\RequestInterface;
use Psr\Log\LoggerInterface;

class WebController extends BaseController
{
    

    public function index()
    {
        $categoryModel = new Category();
        $data['activeCategories'] = $categoryModel->where('status', 'active')->findAll();
        return view('web/index', $data);
    }
    public function category_detail($slug)
    {
        $categoryModel     = new \App\Models\Category();
        $subcategoryModel  = new \App\Models\Subcategory();
        $productModel      = new \App\Models\Product();

        $category = $categoryModel->where('slug', $slug)->first();

        $activeCategories = $categoryModel->where('status', 'active')->findAll();
        // dd($activeCategories);
        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $subcategories = $subcategoryModel
            ->where('category_id', $category['id'])
            ->where('status', 'active')
            ->orderBy('id', 'ASC')
            ->findAll();

        if (!empty($subcategories)) {
            $products = $productModel
                ->where('category_id', $category['id'])
                ->whereIn('subcategory_id', array_column($subcategories, 'id'))
                ->where('status', 'active')
                ->orderBy('id', 'DESC')
                ->findAll();
        } else {
            $products = $productModel
                ->where('category_id', $category['id'])
                ->where('status', 'active')
                ->orderBy('id', 'DESC')
                ->findAll();
        }

        return view('web/category-detail', [
            'category'      => $category,
            'subcategories' => $subcategories,
            'products'      => $products,
            'categories'      => $activeCategories,
        ]);
    }

    public function product_detail($slug)
    {
        $productModel      = new \App\Models\Product();
        $productImageModel = new \App\Models\ProductImage();
        $categoryModel     = new \App\Models\Category();
        $activeCategories = $categoryModel->where('status', 'active')->findAll();

        $product = $productModel
            ->select('products.*, categories.name as category_name, categories.slug as category_slug, categories.catalogue_file as category_catalogue_file, subcategories.name as subcategory_name')
            ->join('categories', 'categories.id = products.category_id')
            ->join('subcategories', 'subcategories.id = products.subcategory_id', 'left')
            ->where('products.slug', $slug)
            ->where('products.status', 'active')
            ->first();

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $relatedBuilder = $productModel
            ->select('products.*, subcategories.name as subcategory_name')
            ->join('subcategories', 'subcategories.id = products.subcategory_id', 'left')
            ->where('products.category_id', $product['category_id'])
            ->where('products.id !=', $product['id'])
            ->where('products.status', 'active')
            ->orderBy('products.id', 'DESC')
            ->limit(4);

        if (! empty($product['subcategory_id'])) {
            $relatedBuilder->where('products.subcategory_id', $product['subcategory_id']);
        } else {
            $relatedBuilder->where('products.subcategory_id', null);
        }

        return view('web/product-detail', [
            'product'         => $product,
            'gallery'         => $productImageModel->where('product_id', $product['id'])->orderBy('sort_order', 'ASC')->findAll(),
            'features'        => $this->splitProductFeatures((string) ($product['features'] ?? '')),
            'relatedProducts' => $relatedBuilder->findAll(),
            'categories'      => $activeCategories,
        ]);
    }

    private function splitProductFeatures(string $features): array
    {
        $features = trim(strip_tags($features, '<li>'));

        if ($features === '') {
            return [];
        }

        if (strpos($features, '<li>') !== false) {
            preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $features, $matches);
            return array_values(array_filter(array_map(
                static fn ($feature) => trim(strip_tags($feature)),
                $matches[1] ?? []
            )));
        }

        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', strip_tags($features)))));
    }
}
