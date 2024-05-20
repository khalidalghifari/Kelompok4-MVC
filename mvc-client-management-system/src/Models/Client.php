<?php

namespace App\Models;

use App\Database;
use Error;
use PDO;

class Client
{
    private $db;

    private $table_name = 'tblclient';

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAllClients()
    {
        $query = 'SELECT * FROM tblclient';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClientById($id)
    {
        $query = 'SELECT * FROM tblclient WHERE ID = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $password)
    {
        $query = 'SELECT * FROM ' . $this->table_name . ' WHERE Email=:userName and Password=:password';
        $stmt = $this->db->prepare($query);

        $password = md5($password);
        $stmt->bindParam(':userName', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($row)) {
            return $row;
        }
        return false;
    }

    public function changePassword($oldPw, $pw, $id)
    {
        $query = 'SELECT * FROM tblclient WHERE ID=:id';
        $stmSelect = $this->db->prepare($query);
        $stmSelect->bindParam('id', $id);
        $stmSelect->execute();
        $rowSelect = $stmSelect->fetch(PDO::FETCH_ASSOC);
        if (count($rowSelect) > 0) {
            $pwAdmin = $rowSelect['Password'];
            if ($pwAdmin == md5($oldPw)) {
                $queryUpdate = 'update tblclient set Password = :pw where ID=:id';
                $stmntUpdate = $this->db->prepare($queryUpdate);
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

    public function addClient($data)
    {
        try {
            //code...
            $dataToPost = [
                'AccountID' => rand(100, 999),
                'AccountType' => $data['accounttype'],
                'ContactName' => $data['cname'],
                'CompanyName' => $data['comname'],
                'Address' => $data['address'],
                'City' => $data['city'],
                'State' => $data['state'],
                'ZipCode' => $data['zcode'],
                'Workphnumber' => $data['wphnumber'],
                'Cellphnumber' => $data['cellphnumber'],
                'Otherphnumber' => $data['ophnumber'],
                'Email' => $data['email'],
                'WebsiteAddress' => $data['websiteadd'],
                'Notes' => $data['notes'],
                'Password' => md5($data['password']),
            ];
            $query = 'INSERT INTO tblclient (AccountID, AccountType, ContactName, CompanyName, Address, City, State, ZipCode, Workphnumber, Cellphnumber, Otherphnumber, Email, WebsiteAddress, Notes, Password) VALUES (:AccountID, :AccountType, :ContactName, :CompanyName, :Address, :City, :State, :ZipCode, :Workphnumber, :Cellphnumber, :Otherphnumber, :Email, :WebsiteAddress, :Notes, :Password)';
            $stmt = $this->db->prepare($query);
            return $stmt->execute($dataToPost);
        } catch (\Throwable $th) {
            //throw $th;
            throw new Error($th->getMessage());
        }
    }

    public function updateClient($data)
    {
        // Prepare the data to post
        $dataToPost = [
            'ContactName' => $data['cname'],
            'CompanyName' => $data['comname'],
            'Address' => $data['address'],
            'City' => $data['city'],
            'State' => $data['state'],
            'ZipCode' => $data['zcode'],
            'Workphnumber' => $data['wphnumber'],
            'Cellphnumber' => $data['cellphnumber'],
            'Otherphnumber' => $data['ophnumber'],
            'Email' => $data['email'],
            'WebsiteAddress' => $data['websiteadd'],
            'Notes' => $data['notes'],
            'ID' => $data['id'],
        ];

        // Prepare the query
        $query = "UPDATE tblclient SET
        ContactName = :ContactName,
        CompanyName = :CompanyName,
        Address = :Address,
        City = :City,
        State = :State,
        ZipCode = :ZipCode,
        Workphnumber = :Workphnumber,
        Cellphnumber = :Cellphnumber,
        Otherphnumber = :Otherphnumber,
        Email = :Email,
        WebsiteAddress = :WebsiteAddress,
        Notes = :Notes
        WHERE ID = :ID";

        // Prepare the statement
        $stmt = $this->db->prepare($query);

        // Execute the statement with the data
        return $stmt->execute($dataToPost);
    }

    public function deleteClient($id)
    {
        $query = 'DELETE FROM tblclient WHERE ID = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
