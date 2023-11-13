<?php
session_start();

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
    <title>Admin Panel</title>
    <link rel ="icon" href ="../logo.jpg" type ="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Admin Panel</h1>
        </header>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Options:</h3>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="display_all_property.php">View Property Panel</a></li>
                            <li class="list-group-item"><a href="display_all_broker.php">View Broker Panel</a></li>
                            <!-- <li class="list-group-item"><a href="broker_login.php">Broker Login Panel</a></li> -->
                            <li class="list-group-item"><a href="add_broker.php">Add Broker Panel</a></li>
                            <li class="list-group-item"><a href="add_property.php">Add Property Panel</a></li>
                        </ul>
                        <a href="../index.php?action=logout" class="btn btn-danger btn-block mt-3">Logout</a>
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