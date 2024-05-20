<?php

namespace App\Models;

use App\Database;
use PDO;

class Service
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function getAllServices()
    {
        $sql = 'SELECT * FROM tblservices';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mendapatkan layanan berdasarkan ID
    public function getServiceById($id)
    {
        $sql = 'SELECT * FROM tblservices WHERE ID = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambahkan layanan baru
    public function addService($serviceName, $servicePrice)
    {
        $sql = 'INSERT INTO tblservices (ServiceName, ServicePrice) VALUES (:serviceName, :servicePrice)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':serviceName', $serviceName, PDO::PARAM_STR);
        $stmt->bindParam(':servicePrice', $servicePrice, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Memperbarui layanan berdasarkan ID
    public function updateService($id, $serviceName, $servicePrice)
    {
        $sql = 'UPDATE tblservices SET ServiceName = :serviceName, ServicePrice = :servicePrice WHERE ID = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':serviceName', $serviceName, PDO::PARAM_STR);
        $stmt->bindParam(':servicePrice', $servicePrice, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Menghapus layanan berdasarkan ID
    public function deleteService($id)
    {
        $sql = 'DELETE FROM tblservices WHERE ID = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
