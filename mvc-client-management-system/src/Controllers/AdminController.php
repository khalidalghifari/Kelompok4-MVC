<?php

namespace App\Controllers;


use App\Controller;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Service;

class AdminController extends Controller
{


    public function index()
    {
        $this->isAdmin();
        return $this->render('admin/dashboard');
    }

    public function addClientService()
    {
        $this->isAdmin();

        return $this->render('admin/add-client-services');
    }


    public function login()
    {
        return $this->render('admin/index');
    }

    public function clientAdd()
    {
        $this->isAdmin();

        return $this->render('admin/add-client');
    }

    public function service()
    {
        $this->isAdmin();

        $service = new Service();
        $data = $service->getAllServices();
        return $this->render('admin/manage-services', $data);
    }

    public function serviceAdd()
    {
        $this->isAdmin();

        return $this->render('admin/add-services');
    }

    public function serviceStore()
    {
        $this->isAdmin();

        try {
            //code...
            $data = $_POST;
            $service = new Service();
            $service->addService($data['sname'], $data['price']);
            $this->showAlertAndRedirect('success add new service', '/admin/service');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage(), '/admin/service');
        }
    }

    public function invoices()
    {
        $this->isAdmin();

        $invoice = new Invoice();
        $invoices = $invoice->getAllInvoiceWithUser();
        return $this->render('admin/invoices', $invoices);
    }


    public function invoiceDetail($id)
    {
        $this->isAdmin();

        $invoice = new Invoice();
        $data = $invoice->getAllInvoiceWithUserAndId($id);
        return $this->render('admin/view-invoice', $data);
    }


    public function searchInvoice()
    {
        $this->isAdmin();

        return $this->render('admin/search-invoices');
    }

    public function searchInvoicePost()
    {
        $this->isAdmin();

        $searchData = $_POST['searchdata'];
        $invoice = new Invoice();
        $data = $invoice->getAllInvoiceWithUserAndId($searchData);
        return $this->render('admin/search-invoices', $data);
    }


    public function clientServiceStore($id)
    {
        $this->isAdmin();

        $data = $_POST;
        $invoice = new Invoice();
        $bilingId = rand(1000000000, 9999999999);

        try {
            //code...
            foreach ($data['sids'] as $key => $value) {
                # code...
                $invoice->addInvoice($id, $value, $bilingId);
            }
            return $this->showAlertAndRedirect('success create invoice with invoice ' . $bilingId, '/admin/invoices');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->showAlertAndRedirect('failed to create invoice with id' . $bilingId . $th->getMessage(), '/admin/client/service/add/' . $id);
        }
    }


    public function serviceEdit($id)
    {
        $this->isAdmin();

        $service = new Service();
        $data = $service->getServiceById($id);
        return $this->render('admin/edit-services-details', $data);
    }

    public function serviceUpdate($id)
    {
        $this->isAdmin();

        try {
            //code...
            $data = $_POST;
            $service = new Service();
            $service->updateService($id, $data['sname'], $data['price']);
            $this->showAlertAndRedirect('success update service', '/admin/service');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage(), '/admin/service/edit/' . $id);
        }
    }


    public function clients()
    {
        $this->isAdmin();
        $client = new Client();
        $data = $client->getAllClients();

        return $this->render('admin/manage-client', $data);
    }


    public function clientEdit($id)
    {
        $this->isAdmin();

        $client = new Client();
        $data = $client->getClientById($id);
        if (!$data) {
            return $this->showAlertAndRedirect('client not found', '/admin/client');
        }
        return $this->render('admin/edit-client-details', $data);
    }


    public function clientUpdate($id)
    {
        $this->isAdmin();

        try {
            //code...
            $data = $_POST;
            $data['id'] = $id;
            $client = new Client();
            $client->updateClient($data);
            return $this->showAlertAndRedirect('success memperbarui client', '/admin/client');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->showAlertAndRedirect($th->getMessage(), '/admin/client/edit/' . $id);
        }
    }

    public function clientStore()
    {
        $this->isAdmin();

        try {
            //code...
            $data = $_POST;
            $client = new Client();
            $client->addClient($data);
            return $this->showAlertAndRedirect('success add new client', '/admin/client');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->showAlertAndRedirect('failed to add client' . $th->getMessage(), '/admin/client/add');
        }
    }

    public function loginPost()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $admin = new Admin();
            $admin->userName = $_POST['username'];
            $admin->password = $_POST['password'];
            $isLogin = $admin->login();
            if ($isLogin) {
                $_SESSION['clientmsaid'] = $isLogin->id;
                $_SESSION['login'] = $isLogin->userName;
                $_SESSION['role'] = 'admin';
                $this->showAlertAndRedirect('success login', '/admin');
            } else {
                $this->showAlertAndRedirect('failed to login', '/admin/login');
            }
        } else {
            $this->render('admin/login');
        }
    }


    public function updateProfile()
    {
        $this->isAdmin();

        try {
            //code...
            $userId = $_SESSION['clientmsaid'];
            $data = $_POST;
            $admin = new Admin();
            $admin->updateProfile($data, $userId);
            return $this->showAlertAndRedirect('succes update data admin', '/admin/profile');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->showAlertAndRedirect($th->getMessage(), '/admin/profile');
        }
    }


    public function profile()
    {
        $this->isAdmin();

        return $this->render('admin/admin-profile');
    }

    public function logout()
    {
        $this->isAdmin();
        session_destroy();
        session_unset();
        return $this->showAlertAndRedirect('success logout', '/admin/login');
    }
    public function password()
    {
        $this->isAdmin();

        return $this->render('admin/change-password');
    }

    public function passwordPost()
    {
        $this->isAdmin();

        $userId = $_SESSION['clientmsaid'];

        if ($_POST['newpassword'] != $_POST['confirmpassword']) {
            return $this->showAlertAndRedirect('password dan confirmasi password tidak sama', '/admin/password');
        }
        try {
            //code...
            $admin = new Admin();
            $admin->changePassword($_POST['currentpassword'], $_POST['newpassword'], $userId);
            return $this->showAlertAndRedirect('success memperbarui password', '/admin/password');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->showAlertAndRedirect('ggal memperbarui password ' . $th->getMessage(), '/admin/password');
        }
    }
}
