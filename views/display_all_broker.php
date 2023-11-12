<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

require_once "../models/BrokerModel.php";
$brokerModel = new BrokerModel();

$brokers = $brokerModel->getAllBrokers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display All Brokers</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Display All Brokers</h1>
        </header>

        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Broker ID</th>
                            <th scope="col">Broker Name</th>
                            <th scope="col">Broker Contact</th>
                            <th scope="col">Broker Email</th>
                            <th scope="col">Broker Experience</th>
                            <th scope="col">Selected Property</th>
                            <th scope="col">Broker Commission (%)</th>
                            <th scope="col">Broker Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($brokers as $broker) : ?>
                            <tr>
                                <th scope="row"><?php echo $broker['id']; ?></th>
                                <td><?php echo $broker['name']; ?></td>
                                <td><?php echo $broker['contact']; ?></td>
                                <td><?php echo $broker['email']; ?></td>
                                <td><?php echo $broker['experience']; ?></td>
                                <td><?php echo $broker['property_id']; ?></td>
                                <td><?php echo $broker['commission']; ?></td>
                                <td><?php echo $broker['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                                <td>
                                    <a href="edit_broker.php?broker_id=<?php echo $broker['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="delete_broker.php?broker_id=<?php echo $broker['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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