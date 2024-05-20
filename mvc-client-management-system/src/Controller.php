<?php

namespace App;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);
        include "Views/$view.php";
    }

    protected function redirectBack($message = '', $messageType = 'success')
    {
        // Store message in session
        if (!empty($message)) {
            $_SESSION['message'] = $message;
            $_SESSION['message_type'] = $messageType;
        }

        var_dump($_SESSION);
        // Redirect to the previous page
        $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $previousUrl");
        exit();
    }

    protected function getFlashMessage()
    {
        if (isset($_SESSION['message'])) {
            $message = [
                'text' => $_SESSION['message'],
                'type' => $_SESSION['message_type']
            ];
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
            return $message;
        }

        return null;
    }


    public function showAlert($message)
    {
        $message = htmlspecialchars($message, ENT_QUOTES);
        echo "<script>alert('$message');</script>";
    }

    public function showAlertAndRedirect($message, $redirectUrl)
    {
        $message = htmlspecialchars($message, ENT_QUOTES);

        // Echo the JavaScript code with the escaped message
        echo "<script>alert('$message');</script>";
        echo "<script>window.location.href = '$redirectUrl';</script>";
        exit(); // Exit to prevent further execution of PHP code
    }


    public function isAdmin()
    {
        session_start();
        if (isset($_SESSION) && isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        } else {
            header("Location: /admin/login");
        }
    }


    public function isUser()
    {
        session_start();
        if (isset($_SESSION) && isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 'user') {
        } else {
            header("Location: /user/login");
        }
    }
}
