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
        $query = "SELECT * FROM admins WHERE username = '$username'";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            $hashedPassword = $admin['password'];

            if (password_verify($password, $hashedPassword)) {
                return true;
            }
        }

        return false;
    }

    public function addAdmin($name, $mobile, $username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO admins (name, mobile, username, password) VALUES ('$name', '$mobile', '$username', '$hashedPassword')";
        return $this->db->query($query);
    }
}
