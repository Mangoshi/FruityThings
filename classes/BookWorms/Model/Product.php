<?php


namespace BookWorms\Model;

use PDO;
use Exception;

class Product
{
public $id;
public $title;
public $description;
public $price;
public $age_rating;
public $average_rating;
public $release_date;
public $on_windows;
public $on_linux;
public $on_mac;
public $developer;
public $publisher;
public $genre_id;
public $image_id;

    function __construct() {
        $this->id = null;
    }

    public function save() {
        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $params = [
                ":title" => $this->title,
                ":description" => $this->description,
                ":price" => $this->price,
                ":age_rating" => $this->age_rating,
                ":average_rating" => $this->average_rating,
                ":release_date" => $this->release_date,
                ":on_windows" => $this->on_windows,
                ":on_linux" => $this->on_linux,
                ":on_mac" => $this->on_mac,
                ":developer" => $this->developer,
                ":publisher" => $this->publisher,
                ":genre_id" => $this->genre_id,
                ":image_id" => $this->image_id

            ];
            if ($this->id === null) {
                $sql = "INSERT INTO products (title, description, price, age_rating, average_rating, release_date, on_windows, on_linux, on_mac, developer, publisher, genre_id, image_id) 
                        VALUES (:title, :description, :price, :age_rating, :average_rating, :release_date, :on_windows, :on_linux, :on_mac, :developer, :publisher, :genre_id, :image_id)";
            } else {
                $sql = "UPDATE products 
                        SET title = :title,
                            description = :description, 
                            price = :price, 
                            age_rating = :age_rating, 
                            average_rating = :average_rating, 
                            release_date = :release_date, 
                            on_windows = :on_windows, 
                            on_linux = :on_linux, 
                            on_mac = :on_mac, 
                            developer = :developer, 
                            publisher = :publisher, 
                            genre_id = :genre_id,
                            image_id = :image_id
                        WHERE id = :id";
                $params[":id"] = $this->id;
            }
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 1) {
                throw new Exception("Failed to save product.");
            }

            if ($this->id === null) {
                $this->id = $conn->lastInsertId();
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }
    }

    public function delete() {
        $db = null;
        try {
            if ($this->id !== null) {
                $db = new DB();
                $db->open();
                $conn = $db->get_connection();

                $sql = "DELETE FROM products WHERE id = :id" ;
                $params = [
                    ":id" => $this->id
                ];
                $stmt = $conn->prepare($sql);
                $status = $stmt->execute($params);

                if (!$status) {
                    $error_info = $stmt->errorInfo();
                    $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                    throw new Exception("Database error executing database query: " . $message);
                }

                if ($stmt->rowCount() !== 1) {
                    throw new Exception("Failed to delete product.");
                }
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }
    }

    public static function findAll() {
        $products = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM products";
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
                    $product = new Product();
                    $product->id = $row['ID'];
                    $product->title = $row['title'];
                    $product->description = $row['description'];
                    $product->price = $row['price'];
                    $product->age_rating = $row['age_rating'];
                    $product->average_rating = $row['average_rating'];
                    $product->release_date = $row['release_date'];
                    $product->on_windows = $row['on_windows'];
                    $product->on_linux = $row['on_linux'];
                    $product->on_mac = $row['on_mac'];
                    $product->developer = $row['developer'];
                    $product->publisher = $row['publisher'];
                    $product->genre_id = $row['genre_id'];
                    $product->image_id = $row['image_id'];
                    $products[] = $product;
                    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $products;
    }

    public static function findById($id) {
        $product = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM products WHERE id = :id";
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
                $product = new Product();
                $product->title = $row['title'];
                $product->description = $row['description'];
                $product->price = $row['price'];
                $product->age_rating = $row['age_rating'];
                $product->average_rating = $row['average_rating'];
                $product->release_date = $row['release_date'];
                $product->on_windows = $row['on_windows'];
                $product->on_linux = $row['on_linux'];
                $product->on_mac = $row['on_mac'];
                $product->developer = $row['developer'];
                $product->publisher = $row['publisher'];
                $product->genre_id = $row['genre_id'];
                $product->image_id = $row['image_id'];
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $product;
    }

    public static function findByTagId($genre_id) {
        $product = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM products WHERE genre_id = :genre_id";
            $select_params = [
                ":genre_id" => $genre_id
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
                $product = new Product();
                $product->id = $row['id'];
                $product->title = $row['title'];
                $product->description = $row['description'];
                $product->price = $row['price'];
                $product->age_rating = $row['age_rating'];
                $product->average_rating = $row['average_rating'];
                $product->release_date = $row['release_date'];
                $product->on_windows = $row['on_windows'];
                $product->on_linux = $row['on_linux'];
                $product->on_mac = $row['on_mac'];
                $product->release_date = $row['release_date'];
                $product->available_platforms = $row['available_platforms'];
                $product->genre_id = $row['genre_id'];
                $product->image_id = $row['image_id'];
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $product;
    }
}