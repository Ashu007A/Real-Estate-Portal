<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

require_once "../models/PropertyModel.php";
$propertyModel = new PropertyModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProperty'])) {
    $ownerName = $_POST['ownerName'];
    $ownerContact = $_POST['ownerContact'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipCode = $_POST['zipCode'];
    $kindOfProperty = $_POST['kindOfProperty'];
    $area = $_POST['area'];
    $totalValuation = $_POST['totalValuation'];
    $propertyStatus = $_POST['propertyStatus'];

    $result = $propertyModel->addProperty($ownerName, $ownerContact, $address, $city, $zipCode, $kindOfProperty, $area, $totalValuation, $propertyStatus);

    if ($result) {
        header("Location: success_page_property.php");
        exit();
    } else {
        $error = "Error adding property. Please try again.";
    }
}

header("Location: add_property.php?error=" . urlencode($error));
exit();
?>