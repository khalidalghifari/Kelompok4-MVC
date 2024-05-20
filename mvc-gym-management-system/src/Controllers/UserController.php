<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;

class UserController extends Controller
{
    private $booking;
    private $payment;

    private $user;

    public function __construct()
    {
        session_start();
        $this->isUser();
        $this->booking = new Booking('tblbooking');
        $this->payment = new Payment('tblpayment');
        $this->user = new User('tbluser');
    }

    public function contact()
    {
        $this->render('contact');
    }

    public function about()
    {
        $this->render('about');
    }

    public function history()
    {
        $data = $this->booking->showHistory($this->getId());
        // var_dump($data, $this->getId());

        $this->render('Booking-History', $data);
    }

    public function detailBooking($id)
    {
        $data = $this->booking->showHistoryDetal($this->getId(), (int) $id);
        $data['payment'] = $this->payment->findBy('bookingID', $id);
        return $this->render('booking-details', $data);
    }

    public function bookingNow()
    {
        $data = $_POST;
        $pId = $data['pid'];
        $currentDate = date('Y-m-d H:i:s', time());

        $userId = $this->getId();
        try {
            //code...
            $this->booking->create([
                'package_id' => $pId,
                'userid' => $userId,
                'booking_date' => $currentDate,
            ]);
            $this->showAlertAndRedirect('booking berhasil', '/history');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }

    public function profile()
    {
        $data = $this->user->findOne($this->getId());
        $this->render('profile', $data);
    }

    public function profilePost()
    {
        try {
            //code...
            $data = $_POST;
            unset($data['submit']);
            $this->user->update($this->getId(), $data);
            $this->showAlertAndRedirect('berhasil memperbarui user');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }

    public function changePassword()
    {
        $this->render('changepassword');
    }

    public function changePasswordPost()
    {
        try {
            //code...
            $data = $_POST;
            if ($data['newpassword'] != $data['confirmpassword']) {
                return $this->showAlertAndRedirect('password tidak sama');
            }
            $id = $this->getId();

            $this->user->changePassword($data['password'], $data['newpassword'], $id);
            $this->showAlertAndRedirect('success memperbarui password');
        } catch (\Throwable $th) {
            //throw $th;
            $this->showAlertAndRedirect($th->getMessage());
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->showAlertAndRedirect('success logout', '/user/login');
    }

    private function getId()
    {
        return $_SESSION['uid'];
    }
}
