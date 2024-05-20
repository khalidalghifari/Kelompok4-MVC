<?php

namespace App\Models;

use Error;
use PDO;

class Admin extends Model
{
    public function login($email, $password)
    {
        $data = $this->findBy('email', $email);
        if (count($data) > 0) {
            if ($data[0]['password'] == md5($password)) {
                return $data[0];
            } else {
                throw new Error('password wrong!');
            }
        }
        throw new Error('email not found');
    }

    public function changePassword($oldPw, $pw, $id)
    {
        $query = 'SELECT * FROM tbladmin WHERE ID=:id';
        $stmSelect = $this->conn->prepare($query);
        $stmSelect->bindParam('id', $id);
        $stmSelect->execute();
        $rowSelect = $stmSelect->fetch(PDO::FETCH_ASSOC);
        if (count($rowSelect) > 0) {
            $pwAdmin = $rowSelect['password'];
            if ($pwAdmin == md5($oldPw)) {
                $queryUpdate = 'update tbladmin set password = :pw where ID=:id';
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
