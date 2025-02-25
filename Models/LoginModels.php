<?php 
include ('../Config/Database.php');
class SignModels 
{
    public $username;
    protected $password;
    public $dbh;
    public $entreReq;
    public function __construct($username, $password, $dbh)
    {
        $this->username = $username;
        $this->password = $password;
        $this->dbh = $dbh;
    }
    public function signReq() {
        $this->entreReq = "SELECT COUNT(*) FROM user WHERE username LIKE '$this->username' AND password LIKE '$this->password';";
        $test = $this->dbh->query($this->entreReq);
        $test->execute();
        return $test->fetchColumn();
    }
}