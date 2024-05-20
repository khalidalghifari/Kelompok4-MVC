<?php

use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Router;

$router = new Router();

// Home
$router->get('/', HomeController::class, 'index');
$router->post('/', UserController::class, 'bookingNow');

// Admin Login
$router->get('/login/admin', AdminController::class, 'login');
$router->post('/login/admin', AdminController::class, 'loginPost');

// Users
$router->get('/users', UserController::class, 'index');

// Admin Dashboard
$router->get('/admins/dashboard', AdminController::class, 'index');

// Categories
$router->get('/admins/addcategory', AdminController::class, 'addCategory');
$router->post('/admins/addcategory', AdminController::class, 'addCategoryPost');
$router->get('/admins/addcategory/delete/{od}', AdminController::class, 'addCategoryDelete');

// Add more routes for managing categories if needed

// Package Types
$router->get('/admins/addpackage-type', AdminController::class, 'addPackageType');
$router->post('/admins/addpackage-type', AdminController::class, 'addPackageTypeStore');
$router->get('/admins/packagetype/delete/{id}', AdminController::class, 'addPackageTypeDelete');

// Add more routes for managing package types if needed

// Packages
$router->get('/admins/addpackage', AdminController::class, 'addPackage');
$router->post('/admins/addpackage', AdminController::class, 'addPackageStore');
$router->get('/admins/package/{id}', AdminController::class, 'managePackageEdit');
$router->post('/admins/package/{id}', AdminController::class, 'managePackageUpdate');

$router->get('/admins/package', AdminController::class, 'managePackage');

// Booking History
$router->get('/admins/booking/new', AdminController::class, 'newBooking');
$router->get('/admins/booking/partial', AdminController::class, 'partialPaymentBooking');
$router->get('/admins/booking/full', AdminController::class, 'fullPaymentBooking');
$router->get('/admins/booking', AdminController::class, 'allBookings');

// Reports
$router->get('/admins/booking/report', AdminController::class, 'bookingReport');
$router->post('/admins/booking/report', AdminController::class, 'bookingReportPost');

$router->get('/admins/registration/partial', AdminController::class, 'registrationReport');
$router->post('/admins/registration/partial', AdminController::class, 'registrationPost');

$router->get('/adminds/profile', AdminController::class, 'profile');
$router->post('/adminds/profile', AdminController::class, 'profilePost');

$router->get('/adminds/changepassword', AdminController::class, 'changePassword');
$router->post('/adminds/changepassword', AdminController::class, 'changePasswordPost');

$router->get('/adminds/logout', AdminController::class, 'logout');

// user
$router->get('/user/login', HomeController::class, 'login');
$router->get('/user/registration', HomeController::class, 'registration');
$router->post('/user/login', HomeController::class, 'loginPost');
$router->post('/user/registration', HomeController::class, 'registrationPost');

$router->get('/contact', HomeController::class, 'contact');
$router->get('/about', HomeController::class, 'about');
$router->get('/history', UserController::class, 'history');

$router->get('/booking/{id}', UserController::class, 'detailBooking');

$router->get('/user/profile', UserController::class, 'profile');
$router->post('/user/profile', UserController::class, 'profilePost');

$router->get('/user/changepassword', UserController::class, 'changePassword');
$router->post('/user/changepassword', UserController::class, 'changePasswordPost');

$router->get('/user/logout', UserController::class, 'logout');

$router->dispatch();
