<?php

use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Router;


$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->get('/admin/login', AdminController::class, 'login');
$router->get('/admin', AdminController::class, 'index');
$router->get('/admin/client/add', AdminController::class, 'clientAdd');
$router->post('/admin/client/add', AdminController::class, 'clientStore');
$router->get('/admin/client/edit/{id}', AdminController::class, 'clientEdit');
$router->post('/admin/client/edit/{id}', AdminController::class, 'clientUpdate');
$router->get('/admin/client', AdminController::class, 'clients');
$router->post('/admin/login', AdminController::class, 'loginPost');
$router->get('/admin/service', AdminController::class, 'service');
$router->get('/admin/service/add', AdminController::class, 'serviceAdd');
$router->post('/admin/service/add', AdminController::class, 'serviceStore');
$router->get('/admin/service/edit/{id}', AdminController::class, 'serviceEdit');
$router->post('/admin/service/edit/{id}', AdminController::class, 'serviceUpdate');
$router->get('/admin/client/service/add/{id}', AdminController::class, 'addClientService');
$router->post('/admin/client/service/add/{id}', AdminController::class, 'clientServiceStore');
$router->get('/admin/invoices', AdminController::class, 'invoices');
$router->get('/admin/invoices', AdminController::class, 'invoices');
$router->get('/admin/invoices/{id}', AdminController::class, 'invoiceDetail');
$router->get('/admin/invoice/searchInvoice', AdminController::class, 'searchInvoice');
$router->post('/admin/invoice/searchInvoice', AdminController::class, 'searchInvoicePost');
$router->get('/admin/profile', AdminController::class, 'profile');
$router->post('/admin/profile', AdminController::class, 'updateProfile');

$router->get('/admin/password', AdminController::class, 'password');
$router->post('/admin/password', AdminController::class, 'passwordPost');

$router->get('/admin/logout', AdminController::class, 'logout');




$router->get('/user/login', UserController::class, 'index');
$router->post('/user/login', UserController::class, 'login');
$router->get('/user/dashboard', UserController::class, 'dashboard');
$router->get('/user/invoices', UserController::class, 'invoice');
$router->get('/user/invoices/{id}', UserController::class, 'invoiceDetail');
$router->get('/user/invoices/search/searchInvoice', UserController::class, 'searchInvoice');
$router->post('/user/invoices/search/searchInvoice', UserController::class, 'searchInvoicePost');
$router->get('/user/profile', UserController::class, 'profile');
$router->post('/user/profile', UserController::class, 'profileUpdate');
$router->get('/user/password', UserController::class, 'password');
$router->post('/user/password', UserController::class, 'passwordUpdate');
$router->get('/user/logout', UserController::class, 'logout');



$router->dispatch();
