<?php

namespace App;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);

        include "Views/$view.php";
    }


    public function showAlertAndRedirect($message, $redirectUrl = null)
    {
        $message = htmlspecialchars($message, ENT_QUOTES);

        // Echo the JavaScript code with the escaped message
        echo "<script>alert('$message');</script>";
        if (!isset($redirectUrl)) {
            $redirectUrl = $_SERVER['HTTP_REFERER'] ?? '/';
        }
        echo "<script>window.location.href = '$redirectUrl';</script>";
        exit(); // Exit to prevent further execution of PHP code
    }

    public function isAdmin()
    {
        if (isset($_SESSION) && $_SESSION['login'] && $_SESSION['role'] == 'admin') {
        } else {
            header("Location: /login/admin");
        }
    }


    public function isUser()
    {
        if (isset($_SESSION) && $_SESSION['login'] && $_SESSION['role'] == 'user') {
        } else {
            header("Location: /user/login");
        }
    }
}
