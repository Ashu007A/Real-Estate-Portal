<?php
require_once 'models/AdminModel.php';

class AdminController
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                echo "Username and password are required.";
                return;
            }

            $admin = $this->adminModel->getAdminByUsername($username);

            if ($admin && password_verify($password, $admin['password'])) {
                session_start();
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];

                header("Location: admin.php");
                exit();
            } else {
                echo "Incorrect username or password.";
            }
        }

        include "views/login.php";
    }

    public function logout()
    {
        session_start();
        session_destroy();

        header("Location: index.php");
        exit();
    }
}
?>