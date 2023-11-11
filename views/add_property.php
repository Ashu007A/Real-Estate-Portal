<!-- views/add_property.php -->

<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Add Property Panel</h1>
        </header>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="process_add_property.php" method="post">
                            <div class="form-group">
                                <label for="ownerName">Property Owner Name:</label>
                                <input type="text" class="form-control" id="ownerName" name="ownerName" required>
                            </div>
                            <div class="form-group">
                                <label for="ownerContact">Owner Contact:</label>
                                <input type="text" class="form-control" id="ownerContact" name="ownerContact" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="zipCode">Zip Code:</label>
                                <input type="text" class="form-control" id="zipCode" name="zipCode" required>
                            </div>
                            <div class="form-group">
                                <label for="kindOfProperty">Kind Of Property:</label>
                                <input type="text" class="form-control" id="kindOfProperty" name="kindOfProperty" required>
                            </div>
                            <div class="form-group">
                                <label for="area">Area:</label>
                                <input type="text" class="form-control" id="area" name="area" required>
                            </div>
                            <div class="form-group">
                                <label for="totalValuation">Total Valuation:</label>
                                <input type="text" class="form-control" id="totalValuation" name="totalValuation" required>
                            </div>
                            <div class="form-group">
                                <label for="propertyStatus">Property Status:</label>
                                <select class="form-control" id="propertyStatus" name="propertyStatus" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="addProperty">Add Property</button>
                            <a href="admin_panel.php" class="btn btn-danger btn-block mt-3">Go Back to Admin Panel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5">
            <p>&copy; 2023 Real Estate Portal</p>
        </footer>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>