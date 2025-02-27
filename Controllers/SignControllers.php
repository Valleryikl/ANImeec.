<?php
require_once __DIR__ . '/../Models/SignModels.php';
class SignControllers
{
    private $model;

    public function __construct($dbh)
    {
        $this->model = new SignModels($dbh);
    }

    public function dataValidation()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $birthdate = $_POST['birthdate'];
        $genre = $_POST['genre'];
        $orientation = $_POST['orientation'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($firstname)) {
            echo "Entrez votre prenom.";
        } elseif (empty($lastname)) {
            echo "Entrez votre nom.";
        } elseif (empty($username)) {
            echo "Entrez votre username.";
        } elseif (empty($birthdate)) {
            echo "Entrez votre date de naissance.";
        } elseif (empty($genre)) {
            echo "Entrez votre genre.";
        } elseif (empty($orientation)) {
            echo "Entrez votre orientation.";
        } elseif (empty($country)) {
            echo "Entrez votre pay.";
        } elseif (empty($email)) {
            echo "Entrez votre email.";
        } elseif (empty($password)) {
            echo "Entrez votre password.";
        } else {
            // Проверка возраста
            $birthDate = new DateTime($birthdate);
            $today = new DateTime();
            $age = $today->diff($birthDate)->y;

            if ($age < 18) {
                echo "Vous devez avoir au moins 18 ans pour vous inscrire.";
                return;
            }
            $usernameCount = $this->model->usernameReq($username);
            $emailCount = $this->model->emailReq($email);
            
            if ($usernameCount > 0) {
                echo "Un utilisateur avec cette username <br>'{$username}' existe déjà";
            } elseif ($emailCount > 0) {
                echo "Un utilisateur avec cette e-mail '{$email}' existe déjà";
            } else {
                $user = $this->model->signReq($firstname, $lastname, $username, $birthdate, $genre, $orientation, $country, $email, $password);
                header("Location: http://localhost:6996/Views/SignViews.php");
            }
        }
    }
}

}

