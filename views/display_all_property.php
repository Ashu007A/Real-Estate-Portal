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
    <title>Display All Properties</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Display All Properties</h1>
        </header>

        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Property ID</th>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Owner Contact</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Zip Code</th>
                            <th scope="col">Kind Of Property</th>
                            <th scope="col">Area</th>
                            <th scope="col">Total Valuation</th>
                            <th scope="col">Property Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($properties as $property) : ?>
                            <tr>
                                <th scope="row"><?php echo $property['id']; ?></th>
                                <td><?php echo $property['owner_name']; ?></td>
                                <td><?php echo $property['owner_contact']; ?></td>
                                <td><?php echo $property['address']; ?></td>
                                <td><?php echo $property['city']; ?></td>
                                <td><?php echo $property['zip_code']; ?></td>
                                <td><?php echo $property['kind_of_property']; ?></td>
                                <td><?php echo $property['area']; ?></td>
                                <td><?php echo $property['total_valuation']; ?></td>
                                <td><?php echo $property['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                                <td>
                                    <a href="edit_property.php?property_id=<?php echo $property['id']; ?>" class="btn btn-primary btn-sm">Edit</a><hr>
                                    <a href="delete_property.php?property_id=<?php echo $property['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="admin_panel.php" class="btn btn-danger btn-block mt-3" style="width:44%">Go Back to Admin Panel</a>
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
