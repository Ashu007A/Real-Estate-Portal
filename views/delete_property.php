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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Property</title>
    <link rel ="icon" href ="../logo.jpg" type ="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Delete Property</h1>
        </header>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="process/process_delete_property.php?property_id=<?php echo $propertyId; ?>" method="post">
                            <p class="text-center">
                                Are you sure you want to delete the property '<?php echo $propertyDetails['address']; ?>'?
                            </p>
                            <button type="submit" class="btn btn-danger btn-block" name="deleteProperty">Delete Property</button>
                            <a href="display_all_property.php" class="btn btn-secondary btn-block mt-3">Cancel</a>
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