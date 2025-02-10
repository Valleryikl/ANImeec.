<?php
include ('../Config/Database.php');

class FindMeModels
{
    public $username;
    public $dbh;
    public $profilReq;
    public $user;
    public $interets;
    // SELECT user.username, interests.name FROM user INNER JOIN user_interests ON user.id = user_interests.id_user INNER JOIN interests ON user_interests.id_interest = interests.id WHERE username LIKE "vallery";
    public $genre;
    // SELECT user.username, genre.name FROM user INNER JOIN genre ON user.id_genre = genre.id;
    public $orientation;
    // SELECT user.username, orientation.name FROM user INNER JOIN orientation ON user.id_orientation = orientation.id;
    public function __construct($username, $dbh)
    {
        $this->username = $username;
        $this->dbh = $dbh;
    }

    public function profil() 
    {
        $this->profilReq = "SELECT * FROM user WHERE username LIKE '". $this->username ."';";
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }

    public function profilGenre() 
    {
        $this->profilReq = "SELECT genre.name FROM user INNER JOIN genre ON user.id_genre = genre.id WHERE username LIKE '" . $this->username . "';";
        $this->genre = $this->dbh->query($this->profilReq);
        return $this->genre->fetch();
    }

    public function profilOrientation() 
    {
        $this->profilReq = "SELECT orientation.name FROM user INNER JOIN orientation ON user.id_orientation = orientation.id WHERE username LIKE '" . $this->username . "';";
        $this->orientation = $this->dbh->query($this->profilReq);
        return $this->orientation->fetch();
    }

    public function profilInterets() 
    {
        $this->profilReq = "SELECT user.username, interests.name FROM user INNER JOIN user_interests ON user.id = user_interests.id_user INNER JOIN interests ON user_interests.id_interest = interests.id WHERE username LIKE '" . $this->username . "';";
        $this->interets = $this->dbh->query($this->profilReq);
        return $this->interets->fetchAll();
    }

    public function user()
    {
        $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id";
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }

    public function userGenre($genre) {
        $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id WHERE genre.name LIKE '" . $genre . "'";
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }

    public function userOrientation($orientation) {
        $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id WHERE orientation.name LIKE '" . $orientation . "'";
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }

    public function userCountry($country) {
        $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id WHERE user.country LIKE '" . $country . "'";
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }

    public function userYears($years) {

        if($years >= 18 && $years <= 25) {
            $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id WHERE (YEAR(CURDATE()) - YEAR(birthdate)) BETWEEN 18 AND 25";
            $this->user = $this->dbh->query($this->profilReq);
            return $this->user->fetchAll();
        }elseif($years >= 25 && $years <= 35) {
            $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id WHERE (YEAR(CURDATE()) - YEAR(birthdate)) BETWEEN 25 AND 35";
            $this->user = $this->dbh->query($this->profilReq);
            return $this->user->fetchAll();
        }elseif($years >= 35 && $years <= 45) {
            $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id WHERE (YEAR(CURDATE()) - YEAR(birthdate)) BETWEEN 35 AND 45";
            $this->user = $this->dbh->query($this->profilReq);
            return $this->user->fetchAll();
        }elseif($years > 45) {
            $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id WHERE (YEAR(CURDATE()) - YEAR(birthdate)) > 45";
            $this->user = $this->dbh->query($this->profilReq);
            return $this->user->fetchAll();
        }

    }
}