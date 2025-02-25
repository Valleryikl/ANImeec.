<?php 
require_once __DIR__ . '/../Config/Database.php';
class SignModels 
{
    private $dbh;
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function signReq($firstname, $lastname, $username, $birthdate, $genre, $orientation, $country, $email, $password)
    {
        $userReq = "INSERT INTO user (firstname, lastname, username, birthdate, id_genre, id_orientation, country, email, password) VALUES (:firstname, :lastname, :username, :birthdate, :genre, :orientation, :country, :email, :password);";
        
        $userPrepare = $this->dbh->prepare($userReq);

        
        $userPrepare->bindParam(':firstname', $firstname);
        $userPrepare->bindParam(':lastname', $lastname);
        $userPrepare->bindParam(':username', $username);
        $userPrepare->bindParam(':birthdate', $birthdate);
        $userPrepare->bindParam(':genre', $genre);
        $userPrepare->bindParam(':orientation', $orientation);
        $userPrepare->bindParam(':country', $country);
        $userPrepare->bindParam(':email', $email);
        $userPrepare->bindParam(':password', $password);
        
        $result = $userPrepare->execute();
        return $result;
    }
    
    public function usernameReq($username) 
    {
        $usernamePrepare = $this->dbh->prepare("SELECT COUNT(*) FROM user WHERE username = :username");
        
        $usernamePrepare->bindParam(':username', $username);
        
        $usernameCount = $usernamePrepare->execute();
        
        return $usernameCount;
    }
    
    public function emailReq($email) 
    {
        $emailPrepare = $this->dbh->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
        
        $emailPrepare->bindParam(':email', $email);
        
        $emailCount = $emailPrepare->execute();

        return $emailCount;
    }
}