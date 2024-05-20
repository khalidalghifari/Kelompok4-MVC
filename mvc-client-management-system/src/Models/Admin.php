<?php

namespace App\Models;

use PDO;
use App\Database;

class Admin
{
    private $conn;
    private $table_name = 'tbladmin';

    public $id;
    public $adminName;
    public $userName;
    public $mobileNumber;
    public $email;
    public $password;
    public $adminRegdate;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Create admin
    public function create()
    {
        $query = 'INSERT INTO ' . $this->table_name . ' SET AdminName=:adminName, UserName=:userName, MobileNumber=:mobileNumber, Email=:email, Password=:password';
        $stmt = $this->conn->prepare($query);

        $this->adminName = htmlspecialchars(strip_tags($this->adminName));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->mobileNumber = htmlspecialchars(strip_tags($this->mobileNumber));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':adminName', $this->adminName);
        $stmt->bindParam(':userName', $this->userName);
        $stmt->bindParam(':mobileNumber', $this->mobileNumber);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read admins
    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Update admin
    public function update()
    {
        $query = 'UPDATE ' . $this->table_name . ' SET AdminName=:adminName, UserName=:userName, MobileNumber=:mobileNumber, Email=:email, Password=:password WHERE ID=:id';
        $stmt = $this->conn->prepare($query);

        $this->adminName = htmlspecialchars(strip_tags($this->adminName));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->mobileNumber = htmlspecialchars(strip_tags($this->mobileNumber));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':adminName', $this->adminName);
        $stmt->bindParam(':userName', $this->userName);
        $stmt->bindParam(':mobileNumber', $this->mobileNumber);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete admin
    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table_name . ' WHERE ID=:id';
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Login admin
    public function login()
    {
        $query = 'SELECT * FROM ' . $this->table_name . ' WHERE UserName=:userName and Password=:password';
        $stmt = $this->conn->prepare($query);

        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $password = md5($this->password);
        $stmt->bindParam(':userName', $this->userName, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->id = $row['ID'];
            $this->adminName = $row['AdminName'];
            $this->userName = $row['UserName'];
            $this->mobileNumber = $row['MobileNumber'];
            $this->email = $row['Email'];
            $this->password = $row['Password'];
            $this->adminRegdate = $row['AdminRegdate'];
            return $this;
        }

        return false;
    }

    public function updateProfile($data, $id)
    {
        $query = 'UPDATE `tbladmin` SET `AdminName`=:name, `UserName`=:username, `MobileNumber`=:phone, `Email`=:email WHERE ID=:id';
        $stm = $this->conn->prepare($query);
        $stm->bindParam('name', $data['adminname']);
        $stm->bindParam('username', $data['username']);
        $stm->bindParam('phone', $data['mobilenumber']);
        $stm->bindParam('email', $data['email']);
        $stm->bindParam('id', $id);

        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function changePassword($oldPw, $pw, $id)
    {
        $query = 'SELECT * FROM tbladmin WHERE ID=:id';
        $stmSelect = $this->conn->prepare($query);
        $stmSelect->bindParam('id', $id);
        $stmSelect->execute();
        $rowSelect = $stmSelect->fetch(PDO::FETCH_ASSOC);
        if (count($rowSelect) > 0) {
            $pwAdmin = $rowSelect['Password'];
            if ($pwAdmin == md5($oldPw)) {
                $queryUpdate = 'update tbladmin set Password = :pw where ID=:id';
                $stmntUpdate = $this->conn->prepare($queryUpdate);
                $pwHash = md5($pw);
                $stmntUpdate->bindParam('pw', $pwHash);
                $stmntUpdate->bindParam('id', $id);
                $stmntUpdate->execute();
                return true;
            } else {
                throw new \Exception('current password is wrong');
            }
        } else {
        }
    }
}
