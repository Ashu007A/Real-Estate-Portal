<?php

class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'realestate');

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function authenticateAdmin($username, $password)
    {
        $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
        $result = $this->db->query($query);

        return $result->num_rows > 0;
    }

    public function addAdmin($name, $mobile, $username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO admins (name, mobile, username, password) VALUES ('$name', '$mobile', '$username', '$hashedPassword')";
        return $this->db->query($query);
    }

    public function getAllBrokers()
    {
        $query = "SELECT * FROM brokers";
        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllProperties()
    {
        $query = "SELECT * FROM properties";
        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
