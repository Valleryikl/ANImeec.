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
                    $id_user = $this->model->userIdReq($user);
                    $countHobby = $this->model->countInterestReq($id_user);
                    session_start();
                    $_SESSION['user'] = $user;
                    $_SESSION['id_user'] = $id_user;
                    if($countHobby < 1) {
                        header("Location: http://localhost:6996/Views/LadingViews.php");
                    } else {
                        header("Location: http://localhost:6996/Views/FindMeViews.php");
                    }
                } else {
                    echo "Password or name is invalid";
                }
            }
        }
    }
}