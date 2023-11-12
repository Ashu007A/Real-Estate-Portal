<?php
require_once 'models/AdminModel.php';

class AdminController
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        session_start();

        if (isset($_SESSION['admin'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'logout') {
                $this->logout();
            }

            header("Location: views/admin_panel.php");
            exit();
        }

        $this->handleLogin();
    }

    private function handleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['login'])) {
                $this->login();
            } elseif (isset($_POST['signup'])) {
                $this->signup();
            }
        }
    }

    private function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($this->adminModel->authenticateAdmin($username, $password)) {
            $_SESSION['admin'] = $username;
            header("Location: views/admin_panel.php");
            exit();
        } else {
            $loginError = "Invalid credentials. Please try again.";
        }
    }

    private function signup()
    {
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $newUsername = $_POST['new_username'];
        $newPassword = $_POST['new_password'];

        if ($this->adminModel->addAdmin($name, $mobile, $newUsername, $newPassword)) {
            $_SESSION['admin'] = $newUsername;
            header("Location: index.php?action=admin_panel");
            exit();
        } else {
            $signupError = "Error signing up. Please try again.";
        }
    }

    public function logout()
{
    if (session_id() == '') {
        session_start();
    }

    session_destroy();
    unset($_SESSION['admin']);
    header("Location: index.php");
    exit();
}
}