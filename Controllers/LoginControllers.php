<?php 
require_once __DIR__ . '/../Models/LoginModels.php';

class SignControllers
{
    private $model;

    public function __construct($dbh)
    {
        $this->model = new LoginModels($dbh);
    }

    public function dataValidation()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST['user'];
            $password = $_POST['password'];

            if(empty($user)) {
                echo "Entrez votre username ou e-mail";
            } elseif(empty($password)) {
                echo "Entrez votre email.";
            } else {
                $result = $this->model->loginReq($user, $password);                                                                                           
                if($result == 1) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header("Location: http://localhost:6996/Views/LadingViews.php");
                } else {
                    echo "Password or name is invalid";
                }
            }
        }
    }
}