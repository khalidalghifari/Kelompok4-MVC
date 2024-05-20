<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $this->render('client/index');
    }

    public function dashboard()
    {
        $this->isUser();
        return $this->render('client/dashboard');
    }


    public function login()
    {
        session_start();
        $client = new Client();
        $email = $_POST['email'];
        $password =  $_POST['password'];
        $isLogin =  $client->login($email, $password);
        if (isset($isLogin)) {
            $_SESSION['clientmsaid'] = $isLogin['ID'];
            $_SESSION['role'] = 'user';
            $_SESSION['login'] = $email;
            $this->showAlertAndRedirect('success login', '/user/dashboard');
        } else {
            $this->showAlertAndRedirect('failed to login please check email or password', '/user/login');
        }
    }


    public function invoice()
    {
        $this->isUser();

        $invoice = new Invoice();
        $userId = $_SESSION['clientmsaid'];

        $data = $invoice->getInvoiceUserLogin($userId);
        return $this->render('client/invoices', $data);
    }


    public function invoiceDetail($id)
    {
        $this->isUser();

        $invoice = new Invoice();
        $userId = $_SESSION['clientmsaid'];

        $data = $invoice->getInvoiceUserLoginAndBiling($userId, $id);
        return $this->render('client/view-invoice', $data);
    }


    public function searchInvoice()
    {
        $this->isUser();
        return $this->render('client/search-invoices');
    }

    public function searchInvoicePost()
    {
        $this->isUser();

        $searchData = $_POST['searchdata'];
        $userId = $_SESSION['clientmsaid'];

        $invoice = new Invoice();
        $data = $invoice->getAllInvoiceWithUserAndIdLikeUser($searchData, $userId);
        return $this->render('client/search-invoices', $data);
    }

    public function profile()
    {
        $this->isUser();
        $userId = $_SESSION['clientmsaid'];
        $client = new Client();
        $data = $client->getClientById($userId);
        $this->render('client/client-profile', $data);
    }


    public function profileUpdate()
    {
        $this->isUser();
        try {
            //code...
            $data = $_POST;
            $userId = $_SESSION['clientmsaid'];
            $data['id'] = $userId;
            $client = new Client();
            $client->updateClient($data);
            return $this->showAlertAndRedirect('success memperbarui profile', '/user/profile');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->showAlertAndRedirect($th->getMessage(), '/user/client');
        }
    }

    public function logout()
    {
        $this->isUser();
        session_start();
        session_unset();
        session_destroy();
        return $this->showAlertAndRedirect('success logout', '/user/login');
    }
    public function password()
    {
        $this->isUser();

        $this->render('client/change-password');
    }

    public function passwordUpdate()
    {
        $this->isUser();

        $userId = $_SESSION['clientmsaid'];

        if ($_POST['newpassword'] != $_POST['confirmpassword']) {
            return $this->showAlertAndRedirect('password dan confirmasi password tidak sama', '/user/password');
        }
        try {
            //code...
            $admin = new Client();
            $admin->changePassword($_POST['currentpassword'], $_POST['newpassword'], $userId);
            return $this->showAlertAndRedirect('success memperbarui password', '/user/password');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->showAlertAndRedirect('ggal memperbarui password ' . $th->getMessage(), '/user/password');
        }
    }
}
