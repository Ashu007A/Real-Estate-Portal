<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

require_once "../models/PropertyModel.php";

$propertyModel = new PropertyModel();

if (!isset($_GET['property_id'])) {
    header("Location: display_all_properties.php");
    exit();
}

$propertyId = $_GET['property_id'];
$propertyDetails = $propertyModel->getPropertyDetails($propertyId);

if (!$propertyDetails) {
    header("Location: display_all_properties.php");
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
        header("Location: success_page_property.php");
        exit();
    } else {
        $error = "Error updating property. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Edit Property</h1>
        </header>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="edit_property.php?property_id=<?php echo $propertyId; ?>" method="post">
                            <div class="form-group">
                                <label for="ownerName">Owner Name:</label>
                                <input type="text" class="form-control" id="ownerName" name="ownerName" value="<?php echo $propertyDetails['owner_name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ownerContact">Owner Contact:</label>
                                <input type="text" class="form-control" id="ownerContact" name="ownerContact" value="<?php echo $propertyDetails['owner_contact']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $propertyDetails['address']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?php echo $propertyDetails['city']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="zipCode">Zip Code:</label>
                                <input type="text" class="form-control" id="zipCode" name="zipCode" value="<?php echo $propertyDetails['zip_code']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="kindOfProperty">Kind Of Property:</label>
                                <input type="text" class="form-control" id="kindOfProperty" name="kindOfProperty" value="<?php echo $propertyDetails['kind_of_property']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="area">Area:</label>
                                <input type="text" class="form-control" id="area" name="area" value="<?php echo $propertyDetails['area']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="totalValuation">Total Valuation:</label>
                                <input type="text" class="form-control" id="totalValuation" name="totalValuation" value="<?php echo $propertyDetails['total_valuation']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="propertyStatus">Property Status:</label>
                                <select class="form-control" id="propertyStatus" name="propertyStatus" required>
                                    <option value="1" <?php echo ($propertyDetails['status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                    <option value="0" <?php echo ($propertyDetails['status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="updateProperty">Update Property</button>
                            <a href="display_all_property.php" class="btn btn-danger btn-block mt-3">Cancel</a>
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