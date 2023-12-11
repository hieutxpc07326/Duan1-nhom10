<?php

class Connect
{
    private $conn;

    function __construct()
    {
        $this->pdo_get_connection();
    }

    private function pdo_get_connection()
    {
        $dburl = "mysql:host=localhost;dbname=clockstore;charset=utf8";
        $username = 'root';
        $password = 'mysql';

        try {
            $this->conn = new PDO($dburl, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function pdo_execute($sql, $params = array())
    {
        try {
            $stmt = $this->conn->prepare($sql);
            
            foreach ($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    function pdo_query($sql, $params = array())
    {
        try {
            $stmt = $this->conn->prepare($sql);
            
            foreach ($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }

            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    function pdo_query_one($sql, $params = array())
    {
        try {
            $stmt = $this->conn->prepare($sql);
            
            foreach ($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    function pdo_query_value($sql, $params = array())
    {
        try {
            $stmt = $this->conn->prepare($sql);
            
            foreach ($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? array_values($row)[0] : null;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    function __destruct()
    {
        $this->conn = null;
    }
}

?>