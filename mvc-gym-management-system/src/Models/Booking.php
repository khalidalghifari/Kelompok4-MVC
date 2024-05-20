<?php

namespace App\Models;

use App\Models\Model;
use PDO;

class Booking extends Model
{
    public function getBooking($key = null)
    {
        if (is_null($key)) {
            $sql = "SELECT tblbooking.*, tbluser.*
            FROM tblbooking
            JOIN tbluser ON tblbooking.userid = tbluser.id
            WHERE tblbooking.paymentType IS NULL;
            ";
            $stmnt = $this->conn->prepare($sql);
        } else {
            $sql = "SELECT tblbooking.*, tbluser.*
            FROM tblbooking
            JOIN tbluser ON tblbooking.userid = tbluser.id where paymentType =:key";
            $stmnt = $this->conn->prepare($sql);
            $stmnt->bindParam('key', $key);
        }
        $stmnt->execute();
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bookingReport($startDate, $toDate)
    {
        $sql = "SELECT tblbooking.*, tbluser.*
                FROM tblbooking
                JOIN tbluser ON tblbooking.userid = tbluser.id
                WHERE tblbooking.booking_date BETWEEN :startDate AND :toDate";

        $stmnt = $this->conn->prepare($sql);
        $stmnt->bindParam(':startDate', $startDate);
        $stmnt->bindParam(':toDate', $toDate);

        $stmnt->execute();
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showHistory($userId)
    {
        $sql = "SELECT tblbooking.*, tbluser.fname,tbluser.email,                    tbladdpackage.titlename, tbladdpackage.PackageDuratiobn,tbladdpackage.Price , tbladdpackage.Description
                FROM tblbooking
                JOIN tbluser ON tblbooking.userid = tbluser.id
                JOIN tbladdpackage ON tblbooking.package_id = tbladdpackage.id
                WHERE tblbooking.userid = :userId";

        $stmnt = $this->conn->prepare($sql);
        $stmnt->bindParam(':userId', $userId, PDO::PARAM_INT);

        $stmnt->execute();
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showHistoryDetal($userId, $bookingId)
    {
        $sql = "SELECT tblbooking.*, tbluser.*, tbladdpackage.*
            FROM tblbooking
            JOIN tbluser ON tblbooking.userid = tbluser.id
            JOIN tbladdpackage ON tblbooking.package_id = tbladdpackage.id
            WHERE tblbooking.userid = :userId AND tblbooking.id = :bookingId";

        $stmnt = $this->conn->prepare($sql);
        $stmnt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmnt->bindParam(':bookingId', $bookingId, PDO::PARAM_STR);

        $stmnt->execute();
        return $stmnt->fetch(PDO::FETCH_ASSOC);
    }
}
