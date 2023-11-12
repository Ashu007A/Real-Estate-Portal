<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.php");
    exit();
}

require_once "../../models/BrokerModel.php";
$brokerModel = new BrokerModel();

if (!isset($_GET['broker_id'])) {
    header("Location: ../display_all_brokers.php");
    exit();
}

$brokerId = $_GET['broker_id'];
$brokerDetails = $brokerModel->getBrokerDetails($brokerId);

if (!$brokerDetails) {
    header("Location: ../display_all_brokers.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBroker'])) {
    $name = $_POST['brokerName'];
    $contact = $_POST['brokerContact'];
    $email = $_POST['brokerEmail'];
    $experience = $_POST['brokerExperience'];
    $property = $_POST['selectedProperty'];
    $commission = $_POST['brokerCommission'];
    $status = $_POST['brokerStatus'];

    $result = $brokerModel->updateBroker($brokerId, $name, $contact, $email, $experience, $property, $commission, $status);

    if ($result) {
        header("Location: ../success_page_broker.php");
        exit();
    } else {
        $error = "Error updating broker. Please try again.";
    }
}

require_once "../../models/PropertyModel.php";
$propertyModel = new PropertyModel();

$properties = $propertyModel->getAllProperties();
?>