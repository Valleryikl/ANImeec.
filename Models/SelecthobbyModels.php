<?php
include('../Config/Database.php');
class SelecthobbyModels
{
    public $username;
    public $selectedArr;
    public $entreReq;
    public $VReq;
    public $dbh;
    public function __construct($username, $selectedArr, $dbh)
    {
        $this->username = $username;
        $this->selectedArr = $selectedArr;
        $this->dbh = $dbh;
    }
    public function hobbyReq()
    {
        for ($i = 0; $i < count($this->selectedArr); $i++) {
            $this->entreReq = "INSERT INTO user_interests (id_user, id_interest) SELECT user.id, interests.id FROM user, interests WHERE user.username = '$this->username' AND interests.name = '" . $this->selectedArr[$i] . "';";
            $this->dbh->query($this->entreReq);
        }
    }
    public function validReq() 
    {
        $this->VReq = "SELECT id";
    }
}
