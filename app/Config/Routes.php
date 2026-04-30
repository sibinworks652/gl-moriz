<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/moriz-admin-login', 'AdminAuthController::login', ['as' => 'login']);
$routes->post('/admin/login', 'AdminAuthController::authenticate', ['as' => 'login-store']);
$routes->get('/admin/dashboard', 'AdminAuthController::dashboard', ['as' => 'dashboard']);
$routes->get('/admin/logout', 'AdminAuthController::logout', ['as' => 'logout']);

$routes->get('/admin/categories', 'AdminCatalogController::categories');
$routes->get('/admin/categories/create', 'AdminCatalogController::createCategory');
$routes->post('/admin/categories/store', 'AdminCatalogController::storeCategory');
$routes->get('/admin/categories/edit/(:num)', 'AdminCatalogController::editCategory/$1');
$routes->post('/admin/categories/update/(:num)', 'AdminCatalogController::updateCategory/$1');
$routes->post('/admin/categories/delete/(:num)', 'AdminCatalogController::deleteCategory/$1');
$routes->post('/admin/categories/quick-store', 'AdminCatalogController::quickStoreCategory');
$routes->get('/admin/categories/(:num)/subcategories', 'AdminCatalogController::subcategoriesByCategory/$1');

$routes->get('/admin/subcategories', 'AdminCatalogController::subcategories');
$routes->get('/admin/subcategories/create', 'AdminCatalogController::createSubcategory');
$routes->post('/admin/subcategories/store', 'AdminCatalogController::storeSubcategory');
$routes->get('/admin/subcategories/edit/(:num)', 'AdminCatalogController::editSubcategory/$1');
$routes->post('/admin/subcategories/update/(:num)', 'AdminCatalogController::updateSubcategory/$1');
$routes->post('/admin/subcategories/delete/(:num)', 'AdminCatalogController::deleteSubcategory/$1');
$routes->post('/admin/subcategories/quick-store', 'AdminCatalogController::quickStoreSubcategory');

$routes->get('/admin/products', 'AdminCatalogController::products');
$routes->get('/admin/products/create', 'AdminCatalogController::createProduct');
$routes->post('/admin/products/store', 'AdminCatalogController::storeProduct');
$routes->get('/admin/products/edit/(:num)', 'AdminCatalogController::editProduct/$1');
$routes->post('/admin/products/update/(:num)', 'AdminCatalogController::updateProduct/$1');
$routes->post('/admin/products/delete/(:num)', 'AdminCatalogController::deleteProduct/$1');



$routes->get('/', 'WebController::index',['as' => 'index']);
$routes->get('category/(:segment)', 'WebController::category_detail/$1',['as'=> 'category-detail']);
$routes->get('product/(:segment)', 'WebController::product_detail/$1', ['as' => 'product-detail']);
