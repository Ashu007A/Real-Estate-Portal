<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
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
    <title>Add Broker Panel</title>
    <link rel ="icon" href ="../logo.jpg" type ="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Add Broker Panel</h1>
        </header>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="process/process_add_broker.php" method="post">
                            <div class="form-group">
                                <label for="brokerName">Broker Name:</label>
                                <input type="text" class="form-control" id="brokerName" name="brokerName" required>
                            </div>
                            <div class="form-group">
                                <label for="brokerContact">Broker Contact:</label>
                                <input type="text" class="form-control" id="brokerContact" name="brokerContact" required>
                            </div>
                            <div class="form-group">
                                <label for="brokerEmail">Broker Email Address:</label>
                                <input type="email" class="form-control" id="brokerEmail" name="brokerEmail" required>
                            </div>
                            <div class="form-group">
                                <label for="brokerExperience">Broker Experience (in Yr.):</label>
                                <input type="number" class="form-control" id="brokerExperience" name="brokerExperience" required>
                            </div>
                            <div class="form-group">
                                <label for="selectProperty">Select Property:</label>
                                <select class="form-control" id="selectProperty" name="selectProperty" required>
                                    <?php
                                    foreach ($properties as $property) {
                                        echo "<option value='{$property['id']}'>{$property['id']} - {$property['owner_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brokerCommission">Broker Commission (%):</label>
                                <input type="number" class="form-control" id="brokerCommission" name="brokerCommission" required>
                            </div>
                            <div class="form-group">
                                <label for="brokerStatus">Broker Status:</label>
                                <select class="form-control" id="brokerStatus" name="brokerStatus" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="addBroker">Add Broker</button>
                            <a href="admin_panel.php" class="btn btn-danger btn-block mt-3">Cancel</a>
                        </form>
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