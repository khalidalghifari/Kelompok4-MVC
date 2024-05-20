<?php

namespace App\Models;

class Package extends Model
{
    public function deleteData($id)
    {
        $query = 'delete from ' . $this->table . ' where id=:id';
        $stmnt = $this->conn->prepare($query);
        $stmnt->bindParam('id', $id);
        $stmnt->execute();
    }
}
