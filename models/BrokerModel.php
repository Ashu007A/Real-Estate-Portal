<?php

class BrokerModel
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'realestate');

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    // public function authenticateBroker($username, $password)
    // {
    //     $query = "SELECT * FROM brokers WHERE username = '$username'";
    //     $result = $this->db->query($query);

    //     if ($result->num_rows > 0) {
    //         $row = $result->fetch_assoc();
    //         if (password_verify($password, $row['password'])) {
    //             return true;
    //         }
    //     }

    //     return false;
    // }

    public function addBroker($name, $contact, $email, $experience, $property_id, $commission, $status)
    {
        $query = "INSERT INTO brokers (name, contact, email, experience, property_id, commission, status) VALUES ('$name', '$contact', '$email', '$experience', '$property_id', '$commission', '$status')";
        return $this->db->query($query);
    }

    public function getBrokerDetails($brokerId)
    {
        $query = "SELECT * FROM brokers WHERE id = '$brokerId'";
        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }

    public function updateBroker($brokerId, $name, $contact, $email, $experience, $property, $commission, $status)
    {
        $query = "UPDATE brokers SET
                    name = '$name',
                    contact = '$contact',
                    email = '$email',
                    experience = '$experience',
                    property_id = '$property',
                    commission = '$commission',
                    status = '$status'
                  WHERE id = '$brokerId'";

        return $this->db->query($query);
    }

    public function deleteBroker($brokerId)
    {
        $query = "DELETE FROM brokers WHERE id = '$brokerId'";
        return $this->db->query($query);
    }
}