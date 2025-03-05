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

    public function userIdReq($user) 
    {
        $userIdReq = "SELECT id FROM user WHERE username = :user OR email = :user;";

        $userIdPrepare = $this->dbh->prepare($userIdReq);

        $userIdPrepare->bindParam(':user', $user);

        $userIdPrepare->execute();
        $result = $userIdPrepare->fetchColumn();

        return $result;
    }

    public function countInterestReq($id_user) 
    {
        $countInterestReq = "SELECT COUNT(id_user) FROM user_interests WHERE id_user = :id_user";

        $countInterestPrepare = $this->dbh->prepare($countInterestReq);

        $countInterestPrepare->bindParam(':id_user', $id_user);

        $countInterestPrepare->execute();
        $result = $countInterestPrepare->fetchColumn();

        return $result;
    }
}