<?php 
include('../Models/SignModels.php');

class SignControllers
{
    public $username;
    protected $password;
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function dataValidation()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->username = $_POST['username'];
            $this->password = $_POST['password'];

            if(empty($this->username)) {
                echo "Entrez votre username.";
            } elseif(empty($this->password)) {
                echo "Entrez votre email.";
            } else {
                $signM = new SignModels($this->username, $this->password, $this->dbh);
                $result = $signM->signReq();                                                                                            
                if($result == 1) {
                    session_start();
                    $_SESSION['username'] = $this->username;
                    echo $_SESSION['username'];
                    header("Location: http://localhost:6996/Views/LadingViews.php");
                } else {
                    echo "Password or name is invalid";
                }
            }
        }
    }
}