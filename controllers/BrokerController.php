<!-- <?php
require_once 'models/BrokerModel.php';

class BrokerController
{
    private $brokerModel;

    public function __construct()
    {
        $this->brokerModel = new BrokerModel();
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

            $broker = $this->brokerModel->getBrokerByUsername($username);

            if ($broker && password_verify($password, $broker['password']) && $broker['status'] == 1) {
                session_start();
                $_SESSION['user_type'] = 'broker';
                $_SESSION['user_id'] = $broker['id'];
                $_SESSION['username'] = $username;

                header("Location: broker.php");
                exit();
            } else {
                echo "Incorrect username or password, or broker is inactive.";
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
?> -->