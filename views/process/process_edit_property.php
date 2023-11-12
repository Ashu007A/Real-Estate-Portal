<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.php");
    exit();
}

require_once "../../models/PropertyModel.php";

$propertyModel = new PropertyModel();

if (!isset($_GET['property_id'])) {
    header("Location: ../display_all_properties.php");
    exit();
}

$propertyId = $_GET['property_id'];
$propertyDetails = $propertyModel->getPropertyDetails($propertyId);

if (!$propertyDetails) {
    header("Location: ../display_all_properties.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProperty'])) {
    $ownerName = $_POST['ownerName'];
    $ownerContact = $_POST['ownerContact'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipCode = $_POST['zipCode'];
    $kindOfProperty = $_POST['kindOfProperty'];
    $area = $_POST['area'];
    $totalValuation = $_POST['totalValuation'];
    $propertyStatus = $_POST['propertyStatus'];

    $result = $propertyModel->updateProperty($propertyId, $ownerName, $ownerContact, $address, $city, $zipCode, $kindOfProperty, $area, $totalValuation, $propertyStatus);

    if ($result) {
        header("Location: ../success_page_property.php");
        exit();
    } else {
        $error = "Error updating property. Please try again.";
    }
}
?>