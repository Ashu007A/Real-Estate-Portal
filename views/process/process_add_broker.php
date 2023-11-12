<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.php");
    exit();
}

require_once "../../models/BrokerModel.php";
$brokerModel = new BrokerModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addBroker'])) {
    $brokerName = $_POST['brokerName'];
    $brokerContact = $_POST['brokerContact'];
    $brokerEmail = $_POST['brokerEmail'];
    $brokerExperience = $_POST['brokerExperience'];
    $selectedProperty = $_POST['selectProperty'];
    $brokerCommission = $_POST['brokerCommission'];
    $brokerStatus = $_POST['brokerStatus'];

    $result = $brokerModel->addBroker($brokerName, $brokerContact, $brokerEmail, $brokerExperience, $selectedProperty, $brokerCommission, $brokerStatus);

    if ($result) {
        header("Location: ../success_page_broker.php");
        exit();
    } else {
        $error = "Error adding broker. Please try again.";
    }
}

header("Location: ../add_broker.php?error=" . urlencode($error));
exit();
?>