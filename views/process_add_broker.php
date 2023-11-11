<!-- views/process_add_broker.php -->

<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

// Include AdminModel
require_once "../models/BrokerModel.php";
$brokerModel = new BrokerModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addBroker'])) {
    // Retrieve data from the form
    $brokerName = $_POST['brokerName'];
    $brokerContact = $_POST['brokerContact'];
    $brokerEmail = $_POST['brokerEmail'];
    $brokerExperience = $_POST['brokerExperience'];
    $selectedProperty = $_POST['selectProperty'];
    $brokerCommission = $_POST['brokerCommission'];
    $brokerStatus = $_POST['brokerStatus'];

    // Add broker to the database
    $result = $brokerModel->addBroker($brokerName, $brokerContact, $brokerEmail, $brokerExperience, $selectedProperty, $brokerCommission, $brokerStatus);

    if ($result) {
        // Redirect to a success page
        header("Location: success_page_broker.php");
        exit();
    } else {
        // Handle error, you can redirect to an error page or show a message
        $error = "Error adding broker. Please try again.";
    }
}

// If the code reaches here, there was an issue, and we redirect to the add_broker.php page
header("Location: add_broker.php?error=" . urlencode($error));
exit();
?>