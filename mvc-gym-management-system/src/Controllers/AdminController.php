<?php

namespace App\Controllers;

use App\Controller;
use App\Models\AddPackage;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Package;
use App\Models\User;

class AdminController extends Controller
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


    public function login()
    {
        $this->render('admin/login');
    }

    public function loginPost()
    {
        $data = $_POST;
        try {
            //code...
            $isLogin = $this->admin->login($data['email'], $data['password']);
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = true;
            $_SESSION['name'] = $isLogin['name'];
            $_SESSION['mobile'] = $isLogin['mobile'];
            $_SESSION['email'] = $isLogin['email'];
            $_SESSION['id'] = $isLogin['id'];
            $this->showAlertAndRedirect('success login', '/admins/dashboard');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }


    public function index()
    {
        $this->isAdmin();
        $data['category'] = $this->category->count();
        $data['booking'] = $this->booking->count();
        $data['packages'] = $this->package->count();
        $partialPayment = $this->booking->findBy('paymentType', 'Partial Payment');
        $full = $this->booking->findBy('paymentType', 'Full Payment');
        $null = $this->booking->findBy('paymentType', NULL);
        $data['partial'] = count($partialPayment);
        $data['full'] = count($full);
        $data['null'] = count($null);


        return $this->render('admin/index', $data);
    }


    public function addCategory()
    {
        $this->isAdmin();
        $data = $this->category->getAll();
        return $this->render('admin/add-category', $data);
    }

    public function addCategoryPost()
    {
        $this->isAdmin();
        $category = $_POST['category'];
        try {
            $this->category->create([
                "category_name" => $category
            ]);
            $this->showAlertAndRedirect("success add category");
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }

    public function addCategoryDelete($id)
    {
        $this->isAdmin();
        try {
            //code...
            $this->category->delete($id);
            $this->showAlertAndRedirect("success delete category");
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
        // return $this->render('admin/add-category');
    }

    // Add Package Type
    public function addPackageType()
    {
        $this->isAdmin();
        $data['categories'] = $this->category->getAll();
        $data['package'] = $this->package->leftJoin('tblcategory', 'tblpackage.cate_id', '=', 'tblcategory.id', ['tblpackage.id', 'tblcategory.category_name', 'tblpackage.PackageName']);

        return $this->render('admin/add-package', $data);
    }

    public function addPackageTypeDelete($id)
    {
        $this->isAdmin();

        try {
            $deleted = $this->package->delete($id);
            if ($deleted) {
                $this->showAlertAndRedirect('Package Type deleted successfully.');
            } else {
                $this->showAlertAndRedirect('Failed to delete Package Type.');
            }
        } catch (\Throwable $th) {
            $this->showAlertAndRedirect($th->getMessage(), '/admins/package-type');
        }
    }


    public function addPackageTypeStore()
    {
        $this->isAdmin();
        try {
            //code...
            $this->package->create([
                'cate_id' => $_POST['category'],
                'PackageName' => $_POST['addPackage']
            ]);
            $this->showAlertAndRedirect("success add package");
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }

    // Add Package
    public function addPackage()
    {
        $this->isAdmin();
        $data['category'] = $this->category->getAll();
        $data['package'] = $this->package->getAll();

        return $this->render('admin/add-post', $data);
    }

    public function addPackageStore()
    {
        $this->isAdmin();
        $data = $_POST;
        try {
            //code...

            $this->addPackage->create([
                'category' => $data['category'],
                'PackageType' => $data['package'],
                'titlename' => $data['titlename'],
                'PackageDuratiobn' => $data['packageduratiobn'],
                'Price' => $data['Price'],
                'Description' => $data['description']
            ]);
            $this->showAlertAndRedirect('success add new post');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }

    public function managePackageEdit($id)
    {
        $data['result'] = $this->addPackage->findOne($id);
        $data['category'] = $this->category->getAll();
        $data['package'] = $this->package->getAll();
        return $this->render('admin/edit-post', $data);
    }

    public function managePackageUpdate($id)
    {
        try {
            //code...
            $data = $_POST;
            $this->addPackage->update(
                $id,
                [
                    'category' => $data['category'],
                    'PackageType' => $data['package'],
                    'titlename' => $data['titlename'],
                    'PackageDuratiobn' => $data['packageduration'],
                    'Price' => $data['Price'],
                    'Description' => $data['description']
                ]
            );
            $this->showAlertAndRedirect('success memperbarui data post', '/admins/package');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }


    // Manage Package
    public function managePackage()
    {
        $this->isAdmin();
        $packages = $this->package->getAll();
        return $this->render('admin/manage-post', ['packages' => $packages]);
    }

    // Add Booking
    public function newBooking()
    {
        $this->isAdmin();
        $data = $this->booking->getBooking();
        return $this->render('admin/new-bookings', $data);
    }


    // Partial Payment Booking
    public function partialPaymentBooking()
    {
        $this->isAdmin();
        $data = $this->booking->getBooking('Partial Payment');
        return $this->render('admin/partial-payment-bookings', $data);
    }

    // Full Payment Booking
    public function fullPaymentBooking()
    {
        $this->isAdmin();
        $data = $this->booking->getBooking('Full Payment');
        return $this->render('admin/full-payment-bookings', $data);
    }

    // All Bookings
    public function allBookings()
    {
        $this->isAdmin();
        $bookings = $this->booking->leftJoin('tbluser', 'tblbooking.userid', '=', 'tbluser.id');
        return $this->render('admin/booking-history', $bookings);
    }

    // Booking Report
    public function bookingReport()
    {
        $this->isAdmin();
        // Implement the logic to generate the booking report
        return $this->render('admin/report-booking');
    }

    public function bookingReportPost()
    {
        $data = $_POST;
        $bookingData = $this->booking->bookingReport($data['fdate'], $data['todate']);
        return $this->render('admin/report-booking', $bookingData);
    }


    // Registration Report
    public function registrationReport()
    {
        $this->isAdmin();
        // Implement the logic to generate the registration report
        return $this->render('admin/report-registration');
    }


    public function registrationPost()
    {
        $this->isAdmin();
        $data = $_POST;
        // Implement the logic to generate the registration report $data = $_POST;
        $bookingData = $this->user->getRegistrationReport($data['fdate'], $data['todate']);

        return $this->render('admin/report-registration', $bookingData);
    }

    public function changePassword()
    {
        $this->render('admin/change-password');
    }


    public function changePasswordPost()
    {
        $this->isAdmin();
        try {
            //code...
            $data = $_POST;
            if ($data['newpassword'] != $data['confirmpassword']) {
                return $this->showAlertAndRedirect('password tidak sama');
            }
            $id = $_SESSION['id'];


            $this->admin->changePassword($data['password'], $data['newpassword'], $id);
            $this->showAlertAndRedirect('success memperbarui password');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }


    public function profile()
    {
        $this->isAdmin();
        $id = $_SESSION['id'];
        $admin = $this->admin->findOne($id);
        $this->render('admin/profile', $admin);
    }


    public function profilePost()
    {
        $this->isAdmin();
        try {
            //code...
            $id = $_SESSION['id'];
            $data = $_POST;
            $this->admin->update($id, [
                'name' => $data['name'],
                'mobile' => $data['mobile']
            ]);
            $this->showAlertAndRedirect('success update data admin please relog to update your data');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }

    public function logout()
    {
        $this->isAdmin();
        session_unset();
        session_destroy();
        $this->showAlertAndRedirect('success logout', '/login/admin');
    }
}
