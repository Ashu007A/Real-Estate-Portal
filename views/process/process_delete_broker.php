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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBroker'])) {
    $result = $brokerModel->deleteBroker($brokerId);

    if ($result) {
        header("Location: ../success_page_brokerDeleted.php");
        exit();
    } else {
        $error = "Error deleting broker. Please try again.";
    }
}
?>