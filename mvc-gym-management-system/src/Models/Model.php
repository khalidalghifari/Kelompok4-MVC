<?php

namespace App\Models;

use App\Database;
use PDO;

abstract class Model
{
    protected $table;
    protected $conn;

    public function __construct($table)
    {
        $db = new Database();
        $this->conn = $db->getConnection();
        $this->table = $table;
    }

    public function create($data)
    {
        $fields = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $query = 'INSERT INTO ' . $this->table . " ($fields) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => &$val) {
            $stmt->bindParam(':' . $key, $val);
        }

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function findOne($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return null;
    }

    public function update($id, $data)
    {
        $fields = '';
        foreach ($data as $key => $val) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ', ');

        $query = 'UPDATE ' . $this->table . " SET $fields WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        foreach ($data as $key => &$val) {
            $stmt->bindParam(':' . $key, $val);
        }

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getAll()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findBy($column, $value)
    {
        if (is_null($value)) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' IS NULL';
            $stmt = $this->conn->prepare($query);
        } else {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :value';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':value', $value);
        }

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return [];
    }

    public function count($column = null, $value = null)
    {
        if ($column && $value) {
            $query = 'SELECT COUNT(*) as count FROM ' . $this->table . ' WHERE ' . $column . ' = :value';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':value', $value);
        } else {
            $query = 'SELECT COUNT(*) as count FROM ' . $this->table;
            $stmt = $this->conn->prepare($query);
        }

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        }

        return 0;
    }

    public function leftJoin($table, $first, $operator, $second, $columns = '*')
    {
        // If columns is an array, convert it to a string
        if (is_array($columns)) {
            $columns = implode(', ', $columns);
        }

        $query = "SELECT $columns FROM " . $this->table . ' LEFT JOIN ' . $table . ' ON ' . $first . ' ' . $operator . ' ' . $second;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
