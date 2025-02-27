<?php 
require_once __DIR__ . '/../Config/Database.php';
class LoginModels 
{
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }
    public function loginReq($user, $password)
    {
        $userReq = "SELECT COUNT(*) FROM user WHERE username = :user OR email = :user AND password = :password;";

        $userPrepare = $this->dbh->prepare($userReq);

        $userPrepare->bindParam(':user', $user);
        $userPrepare->bindParam(':password', $password);

        $userPrepare->execute();
        $result = $userPrepare->fetchColumn();

        return $result;
    }
}