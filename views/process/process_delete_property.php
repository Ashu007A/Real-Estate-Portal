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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteProperty'])) {
    $result = $propertyModel->deleteProperty($propertyId);

    if ($result) {
        header("Location: ../success_page_propertyDeleted.php");
        exit();
    } else {
        $error = "Error deleting property. Please try again.";
    }
}
?>