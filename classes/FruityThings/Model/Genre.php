<?php

namespace FruityThings\Model;

use PDO;
use Exception;

class Genre
{
    public $id;
    public $name;

    function __construct() {
        $this->id = null;
    }

    public static function findAll() {
        $genres = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM genres";
            $select_stmt = $conn->prepare($select_sql);
            $select_status = $select_stmt->execute();

            if (!$select_status) {
                $error_info = $select_stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($select_stmt->rowCount() !== 0) {
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $genre = new Genre();
                    $genre->id = $row['id'];
                    $genre->name = $row['name'];
                    $genres[] = $genre;
                    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $genres;
    }

    public static function findById($id) {
        $genre = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM genres WHERE id = :id";
            $select_params = [
                ":id" => $id
            ];
            $select_stmt = $conn->prepare($select_sql);
            $select_status = $select_stmt->execute($select_params);

            if (!$select_status) {
                $error_info = $select_stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($select_stmt->rowCount() !== 0) {
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                $genre = new Genre();
                $genre->id = $row['id'];
                $genre->name = $row['name'];
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $genre;
    }
}