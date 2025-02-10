<?php 
include ('../Config/Database.php');
class LoginModels 
{
    public $firstname;
    public $lastname;
    public $username;
    public $birthdate;
    public $genre;
    public $orientation;
    public $country;
    public $email;
    protected $password;
    public $userReq;
    public function __construct($firstname, $lastname, $username, $birthdate, $genre, $orientation, $country, $email, $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->birthdate = $birthdate;
        $this->genre = $genre;
        $this->orientation = $orientation;
        $this->country = $country;
        $this->email = $email;
        $this->password = $password;
    }

    public function loginReq()
    {
        $this->userReq = "INSERT INTO user (firstname, lastname, username, birthdate, id_genre, id_orientation, country, email, password) VALUES ('$this->firstname', '$this->lastname', '$this->username', '$this->birthdate', '$this->genre', '$this->orientation', '$this->country', '$this->email', '$this->password');";
        return $this->userReq;
    }
}
// $loginM = new LoginModels("Yabuku", "God", "Yato", "1000-08-10", "1", "1", "Japan", "yatochan@gmail.com", "090-XXXX");
// $loginM->loginReq();