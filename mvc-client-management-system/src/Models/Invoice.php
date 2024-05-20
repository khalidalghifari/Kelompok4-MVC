<?php

namespace App\Models;

use App\Database;
use PDO;

class Invoice
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function getAllInvoices()
    {
        $sql = 'SELECT * FROM tblinvoice';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllInvoiceWithUser()
    {
        $sql = 'SELECT * from tblinvoice join tblclient on tblinvoice.Userid = tblclient.ID';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInvoiceUserLogin($id)
    {
        $sql = "select tblclient.ContactName,tblclient.CompanyName,tblinvoice.BillingId,tblinvoice.PostingDate from  tblclient
        join tblinvoice on tblclient.ID=tblinvoice.Userid  where tblinvoice.Userid=:uid";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':uid', $id, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    public function getInvoiceUserLoginAndBiling($id, $biling)
    {
        $sql = "SELECT *
        FROM tblinvoice
        JOIN tblclient ON tblinvoice.Userid = tblclient.ID
        JOIN tblservices ON tblservices.ID = tblinvoice.ServiceId
        WHERE tblinvoice.BillingId =:bilingId and tblinvoice.UserId=:userId;
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('bilingId', $biling);
        $stmt->bindParam('userId', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllInvoiceWithUserAndId($id)
    {
        $sql = "SELECT *
        FROM tblinvoice
        JOIN tblclient ON tblinvoice.Userid = tblclient.ID
        JOIN tblservices ON tblservices.ID = tblinvoice.ServiceId
        WHERE tblinvoice.BillingId =:bilingId;
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('bilingId', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllInvoiceWithUserAndIdLike($id)
    {
        $sql = "SELECT *
        FROM tblinvoice
        JOIN tblclient ON tblinvoice.Userid = tblclient.ID
        JOIN tblservices ON tblservices.ID = tblinvoice.ServiceId
        WHERE tblinvoice.BillingId LIKE :billingId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('bilingId', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllInvoiceWithUserAndIdLikeUser($id, $userId)
    {
        $sql = "SELECT *
        FROM tblinvoice
        JOIN tblclient ON tblinvoice.Userid = tblclient.ID
        JOIN tblservices ON tblservices.ID = tblinvoice.ServiceId
        WHERE tblinvoice.UserId=:userId and tblinvoice.BillingId LIKE :billingId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('billingId', $id);
        $stmt->bindParam('userId', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mendapatkan invoice berdasarkan ID
    public function getInvoiceById($id)
    {
        $sql = 'SELECT * FROM tblinvoice WHERE ID = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambahkan invoice baru
    public function addInvoice($userid, $serviceId, $billingId)
    {
        $sql = 'INSERT INTO tblinvoice (Userid, ServiceId, BillingId) VALUES (:userid, :serviceId, :billingId)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt->bindParam(':serviceId', $serviceId, PDO::PARAM_STR);
        $stmt->bindParam(':billingId', $billingId, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Memperbarui invoice berdasarkan ID
    public function updateInvoice($id, $userid, $serviceId, $billingId)
    {
        $sql = 'UPDATE tblinvoice SET Userid = :userid, ServiceId = :serviceId, BillingId = :billingId WHERE ID = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt->bindParam(':serviceId', $serviceId, PDO::PARAM_STR);
        $stmt->bindParam(':billingId', $billingId, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Menghapus invoice berdasarkan ID
    public function deleteInvoice($id)
    {
        $sql = 'DELETE FROM tblinvoice WHERE ID = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
