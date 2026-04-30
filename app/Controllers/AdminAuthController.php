<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

class AdminAuthController extends BaseController
{
    public function login()
    {
        if (session()->get('admin_logged_in') === true) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login');
    }

    public function authenticate()
    {
        $usernameOrEmail = trim((string) $this->request->getPost('username'));
        $password        = (string) $this->request->getPost('password');

        if ($usernameOrEmail === '' || $password === '') {
            return redirect()->back()->withInput()->with('error', 'Username/email and password are required.');
        }

        $adminModel = new Admin();
        $admin      = $adminModel
            ->groupStart()
            ->where('username', $usernameOrEmail)
            ->orWhere('email', $usernameOrEmail)
            ->groupEnd()
            ->first();

        if ($admin === null || ! password_verify($password, (string) $admin['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid login credentials.');
        }

        if (($admin['status'] ?? '') !== 'active') {
            return redirect()->back()->withInput()->with('error', 'Your admin account is inactive.');
        }

        session()->set([
            'admin_logged_in' => true,
            'admin_id'        => $admin['id'],
            'admin_name'      => $admin['name'],
            'admin_role'      => $admin['role'],
        ]);

        return redirect()->to('/admin/dashboard');
    }

    public function dashboard()
    {
        if (session()->get('admin_logged_in') !== true) {
            return redirect()->to('/morris-admin-login')->with('error', 'Please login first.');
        }

        $categoryModel    = new Category();
        $subcategoryModel = new Subcategory();
        $productModel     = new Product();

        return view('admin/dashboard', [
            'adminName'        => (string) session()->get('admin_name'),
            'adminRole'        => (string) session()->get('admin_role'),
            'categoryCount'    => $categoryModel->countAllResults(),
            'subcategoryCount' => $subcategoryModel->countAllResults(),
            'productCount'     => $productModel->countAllResults(),
        ]);
    }

    public function logout()
    {
        session()->remove([
            'admin_logged_in',
            'admin_id',
            'admin_name',
            'admin_role',
        ]);

        return redirect()->to('/morris-admin-login')->with('success', 'You have been logged out.');
    }
}
