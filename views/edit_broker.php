<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

require_once "../models/BrokerModel.php";
$brokerModel = new BrokerModel();

if (!isset($_GET['broker_id'])) {
    header("Location: display_all_brokers.php");
    exit();
}

$brokerId = $_GET['broker_id'];
$brokerDetails = $brokerModel->getBrokerDetails($brokerId);

if (!$brokerDetails) {
    header("Location: display_all_brokers.php");
    exit();
}

require_once "../models/PropertyModel.php";
$propertyModel = new PropertyModel();

$properties = $propertyModel->getAllProperties();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Broker</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Edit Broker</h1>
        </header>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="process/process_edit_broker.php?broker_id=<?php echo $brokerId; ?>" method="post">
                            <div class="form-group">
                                <label for="brokerName">Broker Name:</label>
                                <input type="text" class="form-control" id="brokerName" name="brokerName" value="<?php echo $brokerDetails['name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="brokerContact">Broker Contact:</label>
                                <input type="text" class="form-control" id="brokerContact" name="brokerContact" value="<?php echo $brokerDetails['contact']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="brokerEmail">Broker Email:</label>
                                <input type="email" class="form-control" id="brokerEmail" name="brokerEmail" value="<?php echo $brokerDetails['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="brokerExperience">Broker Experience (in Yr.):</label>
                                <input type="text" class="form-control" id="brokerExperience" name="brokerExperience" value="<?php echo $brokerDetails['experience']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="selectProperty">Select Property:</label>
                                <select class="form-control" id="selectProperty" name="selectProperty" required>
                                    <?php
                                    $properties = $propertyModel->getAllProperties();
                                    foreach ($properties as $property) {
                                        $selected = ($property['id'] == $brokerDetails['selectProperty']) ? 'selected' : '';
                                        echo "<option value='{$property['id']}' {$selected}>{$property['id']} - {$property['owner_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brokerCommission">Broker Commission (%):</label>
                                <input type="text" class="form-control" id="brokerCommission" name="brokerCommission" value="<?php echo $brokerDetails['commission']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="brokerStatus">Broker Status:</label>
                                <select class="form-control" id="brokerStatus" name="brokerStatus" required>
                                    <option value="1" <?php echo ($brokerDetails['status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                    <option value="0" <?php echo ($brokerDetails['status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="updateBroker">Update Broker</button>
                            <a href="display_all_broker.php" class="btn btn-danger btn-block mt-3">Cancel</a>
                        </form>
                        <?php
                        if (isset($error)) {
                            echo '<div class="alert alert-danger mt-3" role="alert">' . $error . '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5">
            <p>&copy; 2023 Real Estate Portal</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>