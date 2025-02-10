<?php
include('../Models/LoginModels.php');

class LoginControllers
{
    public $firstname;
    public $lastname;
    public $username;
    public $birthdate;
    public $genre;
    public $orientation;
    public $country;
    protected $email;
    public $password;
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function dataValidation()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $this->firstname = $_POST['firstname'];
        $this->lastname = $_POST['lastname'];
        $this->username = $_POST['username'];
        $this->birthdate = $_POST['birthdate'];
        $this->genre = $_POST['genre'];
        $this->orientation = $_POST['orientation'];
        $this->country = $_POST['country'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        if (empty($this->firstname)) {
            echo "Entrez votre prenom.";
        } elseif (empty($this->lastname)) {
            echo "Entrez votre nom.";
        } elseif (empty($this->username)) {
            echo "Entrez votre username.";
        } elseif (empty($this->birthdate)) {
            echo "Entrez votre date de naissance.";
        } elseif (empty($this->genre)) {
            echo "Entrez votre genre.";
        } elseif (empty($this->orientation)) {
            echo "Entrez votre orientation.";
        } elseif (empty($this->country)) {
            echo "Entrez votre pay.";
        } elseif (empty($this->email)) {
            echo "Entrez votre email.";
        } elseif (empty($this->password)) {
            echo "Entrez votre password.";
        } else {
            // Проверка возраста
            $birthDate = new DateTime($this->birthdate);
            $today = new DateTime();
            $age = $today->diff($birthDate)->y;

            if ($age < 18) {
                echo "Vous devez avoir au moins 18 ans pour vous inscrire.";
                return;
            }

            $stmtUsername = $this->dbh->prepare("SELECT COUNT(*) FROM user WHERE username = :username");
            $stmtUsername->bindParam(':username', $this->username, PDO::PARAM_STR);
            $stmtUsername->execute();
            $usernameExists = $stmtUsername->fetchColumn();

            $stmtEmail = $this->dbh->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
            $stmtEmail->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmtEmail->execute();
            $emailExists = $stmtEmail->fetchColumn();

            if ($emailExists > 0) {
                echo "Un utilisateur avec cette adresse e-mail <br>'{$this->email}' existe déjà";
            } elseif ($usernameExists > 0) {
                echo "Un utilisateur avec cette username '{$this->username}' existe déjà";
            } else {
                $loginM = new LoginModels($this->firstname, $this->lastname, $this->username, $this->birthdate, $this->genre, $this->orientation, $this->country, $this->email, $this->password);
                $req = $loginM->loginReq();
                $this->dbh->query($req);
                header("Location: http://localhost:6996/Views/SignViews.php");
            }
        }
    }
}

}

