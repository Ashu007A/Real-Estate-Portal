<?php
require_once "controllers/AdminController.php";

$adminController = new AdminController();
$adminController->index();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Portal</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">Real Estate Portal</h1>
        </header>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            <?php
                            echo isset($_POST['signup']) ? 'Admin Sign Up' : 'Admin Login';
                            ?>
                        </h3>
                    </div>
                    <div class="card-body">
                    <form action="index.php" method="post">
                        <?php if (isset($_GET['signup'])) { ?>
                            <input type="hidden" name="signup_mode" value="1">
                        <?php } ?>

                        <?php if (!isset($_GET['signup'])) { ?>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                            <p class="mt-3 text-center">Don't have an account? <a href="?signup">Sign Up</a></p>
                        <?php } ?>

                        <?php if (isset($_GET['signup'])) { ?>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" required>
                            </div>
                            <div class="form-group">
                                <label for="new_username">New Username:</label>
                                <input type="text" class="form-control" id="new_username" name="new_username" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="signup">Sign Up</button>
                            <p class="mt-3 text-center">Already have an account? <a href="?">Login</a></p>
                        <?php } ?>
                    </form>

                        <?php
                        if (isset($loginError)) {
                            echo '<div class="alert alert-danger mt-3" role="alert">' . $loginError . '</div>';
                        }
                        if (isset($signupError)) {
                            echo '<div class="alert alert-danger mt-3" role="alert">' . $signupError . '</div>';
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

    <script src="img.png"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>