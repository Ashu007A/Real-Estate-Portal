<?php

class PropertyModel
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'realestate');

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function addProperty($ownerName, $ownerContact, $address, $city, $zipCode, $kindOfProperty, $area, $totalValuation, $propertyStatus)
    {
        $query = "INSERT INTO properties (owner_name, owner_contact, address, city, zip_code, kind_of_property, area, total_valuation, status) VALUES ('$ownerName', '$ownerContact', '$address', '$city', '$zipCode', '$kindOfProperty', '$area', '$totalValuation', '$propertyStatus')";
        return $this->db->query($query);
    }

    public function getAllProperties()
    {
        $query = "SELECT * FROM properties";
        $result = $this->db->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPropertyDetails($propertyId)
    {
        $query = "SELECT * FROM properties WHERE id = '$propertyId'";
        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }

    public function updateProperty($propertyId, $ownerName, $ownerContact, $address, $city, $zipCode, $kindOfProperty, $area, $totalValuation, $propertyStatus)
    {
        $query = "UPDATE properties SET owner_name = '$ownerName', owner_contact = '$ownerContact', address = '$address', city = '$city', zip_code = '$zipCode', kind_of_property = '$kindOfProperty', area = '$area', total_valuation = '$totalValuation', status = '$propertyStatus' WHERE id = '$propertyId'";
        return $this->db->query($query);
    }

    public function deleteProperty($propertyId)
    {
        $query = "DELETE FROM properties WHERE id = '$propertyId'";
        return $this->db->query($query);
    }
}