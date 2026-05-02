<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use CodeIgniter\HTTP\ResponseInterface;
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


    public function landing_page(){
        $categoryModel     = new \App\Models\Category();
        $activeCategories = $categoryModel->where('status', 'active')->findAll();
        return view('web/product-landing',[
            'categories'      => $activeCategories,
        ]);
    }
    public function about(){
        return view('web/about-us');
    }
    public function contact(){
        return view('web/contact-us');
    }
    public function features(){
        return view('web/features');
    }

    public function contactSubmit(): ResponseInterface
    {
        if ($spamResponse = $this->rejectSpam('contact')) {
            return $spamResponse;
        }

        $rules = [
            'first_name' => [
                'rules' => 'required|min_length[2]|max_length[80]',
                'errors' => [
                    'required'   => 'First name is required',
                    'min_length' => 'First name must be at least 2 characters',
                    'max_length' => 'First name cannot exceed 80 characters',
                ]
            ],
            'last_name' => [
                'rules' => 'required|min_length[1]|max_length[80]',
                'errors' => [
                    'required'   => 'Last name is required',
                    'min_length' => 'Last name must be at least 1 characters',
                    'max_length' => 'Last name cannot exceed 80 characters',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[150]',
                'errors' => [
                    'required'    => 'Email is required',
                    'valid_email' => 'Please enter a valid email address',
                    'max_length'  => 'Email cannot exceed 150 characters',
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[7]|max_length[25]',
                'errors' => [
                    'required'   => 'Phone number is required',
                    'min_length' => 'Phone number must be at least 7 digits',
                    'max_length' => 'Phone number cannot exceed 25 digits',
                ]
            ],
            'message' => [
                'rules' => 'required|min_length[5]|max_length[2000]',
                'errors' => [
                    'required'   => 'Message is required',
                    'min_length' => 'Message must be at least 5 characters',
                    'max_length' => 'Message cannot exceed 2000 characters',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)->setJSON([
                'success' => false,
                'errors'  => $this->validator->getErrors(),
            ]);
        }

        $data = [
            'first_name' => trim((string) $this->request->getPost('first_name')),
            'last_name'  => trim((string) $this->request->getPost('last_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')),
            'message'    => trim((string) $this->request->getPost('message')),
            'page'       => trim((string) $this->request->getPost('page')),
        ];

        $subject = 'New contact enquiry from ' . $data['first_name'] . ' ' . $data['last_name'];
        $body = view('emails/contact-enquiry', ['data' => $data]);

        if (! $this->sendSiteMail($subject, $body, $data['email'])) {
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Unable to send your message right now. Please try again shortly.',
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Thank you. Your message has been sent successfully.',
        ]);
    }

    public function subscribeSubmit(): ResponseInterface
    {
        if ($spamResponse = $this->rejectSpam('subscribe')) {
            return $spamResponse;
        }

        if (! $this->validate([
            'email' => 'required|valid_email|max_length[150]',
        ])) {
            return $this->response->setStatusCode(422)->setJSON([
                'success' => false,
                'errors'  => $this->validator->getErrors(),
            ]);
        }

        $email = trim((string) $this->request->getPost('email'));
        $subject = 'New update subscription';
        $body = view('emails/update-subscription', [
            'email' => $email,
            'page'  => trim((string) $this->request->getPost('page')),
        ]);

        if (! $this->sendSiteMail($subject, $body, $email)) {
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Unable to subscribe right now. Please try again shortly.',
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Thank you. You have been subscribed successfully.',
        ]);
    }

    private function rejectSpam(string $type): ?ResponseInterface
    {
        if (trim((string) $this->request->getPost('website')) !== '') {
            return $this->response->setStatusCode(422)->setJSON([
                'success' => false,
                'message' => 'Unable to submit the form.',
            ]);
        }

        $startedAt = (int) $this->request->getPost('form_started_at');
        if ($startedAt < 1 || (time() - $startedAt) < 3) {
            return $this->response->setStatusCode(422)->setJSON([
                'success' => false,
                'message' => 'Please wait a moment before submitting.',
            ]);
        }

        $rateKey = 'last_' . $type . '_submission_at';
        $lastSubmissionAt = (int) session()->get($rateKey);
        if ($lastSubmissionAt > 0 && (time() - $lastSubmissionAt) < 30) {
            return $this->response->setStatusCode(429)->setJSON([
                'success' => false,
                'message' => 'Please wait before submitting again.',
            ]);
        }

        session()->set($rateKey, time());

        return null;
    }

    private function sendSiteMail(string $subject, string $body, string $replyTo = ''): bool
    {
        $from = (string) (env('email.from') ?: env('email.fromEmail') ?: env('email.SMTPUser'));
        $recipient = (string) (env('email.recipient') ?: env('email.recipients') ?: $from);

        $email = service('email');
        $email->initialize([
            'protocol'   => env('email.protocol') ?: 'smtp',
            'SMTPHost'   => env('email.SMTPHost') ?: '',
            'SMTPUser'   => env('email.SMTPUser') ?: '',
            'SMTPPass'   => env('email.SMTPPass') ?: '',
            'SMTPPort'   => (int) (env('email.SMTPPort') ?: 465),
            'SMTPCrypto' => env('email.SMTPCrypto') ?: 'ssl',
            'mailType'   => env('email.mailType') ?: 'html',
            'charset'    => 'UTF-8',
            'newline'    => "\r\n",
            'CRLF'       => "\r\n",
        ]);

        $email->setFrom($from, 'Moriz Website');
        $email->setTo($recipient);
        if ($replyTo !== '') {
            $email->setReplyTo($replyTo);
        }
        $email->setSubject($subject);
        $email->setMessage($body);

        return $email->send(false);
    }

    public function mail_view(){
        return view('emails/contact-enquiry');
    }
}
