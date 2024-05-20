<?php

namespace App\Controllers;

use App\Controller;
use App\Models\AddPackage;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Package;
use App\Models\User;

class HomeController extends Controller
{
    protected $admin;
    protected $package;
    protected $booking;
    protected $payment;
    protected $user;
    protected $category;
    protected $addPackage;

    public function __construct()
    {
        $this->admin = new Admin('tbladmin');
        $this->category = new Category('tblcategory');
        $this->booking = new Booking('tblbooking');
        $this->package = new Package('tblpackage');
        $this->payment = new Package('tblpayment');
        $this->user = new User('tbluser');
        $this->addPackage = new AddPackage('tbladdpackage');
        session_start();
    }

    public function index()
    {
        $this->render('index');
    }

    public function login()
    {
        return $this->render('login');
    }

    public function loginPost()
    {
        try {
            $data = $_POST;
            $isLogin = $this->user->login($data['email'], $data['password']);
            $_SESSION['uid'] = $isLogin['id'];
            $_SESSION['role'] = 'user';
            $_SESSION['login'] = true;
            $_SESSION['name'] = $isLogin['name'];
            $_SESSION['mobile'] = $isLogin['mobile'];
            $_SESSION['email'] = $isLogin['email'];
            $this->showAlertAndRedirect('success to login', '/');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }

    public function about()
    {
        return $this->render('about');
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function registrationPost()
    {
        try {
            //code...
            $data = $_POST;
            if ($data['password'] != $data['RepeatPassword']) {
            }
            unset($data['RepeatPassword']);
            unset($data['submit']);
            $data['password'] = md5($data['password']);
            $this->user->create($data);
            $this->showAlertAndRedirect('success register please login', '/user/login');
        } catch (\Throwable $th) {
            $this->showAlertAndRedirect($th->getMessage());
        }
    }

    public function registration()
    {
        return $this->render('registration');
    }
}
