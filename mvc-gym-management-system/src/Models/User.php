<?php

namespace App\Models;

use Error;
use PDO;

class User extends Model
{
    public function getRegistrationReport($from, $to)
    {
        $sql = "SELECT id, fname, lname, email, mobile, password, state, city, address, create_date from tbluser
where date(create_date) between :fdate and :tdate";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':fdate', $from, PDO::PARAM_STR);
        $query->bindParam(':tdate', $to, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

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
        $query = 'SELECT * FROM tbluser WHERE ID=:id';
        $stmSelect = $this->conn->prepare($query);
        $stmSelect->bindParam('id', $id);
        $stmSelect->execute();
        $rowSelect = $stmSelect->fetch(PDO::FETCH_ASSOC);
        if (count($rowSelect) > 0) {
            $pwAdmin = $rowSelect['password'];
            if ($pwAdmin == md5($oldPw)) {
                $queryUpdate = 'update tbluser set password = :pw where ID=:id';
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
