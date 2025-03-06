<?php 
include ('../Models/SelecthobbyModels.php');

class SelecthobbyControllers
{
    public $entreReq;
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function dataValidation() {
        $selectedArr = array_keys($_POST);
        $username = $_SESSION['username'];
        $entreReq = new SelecthobbyModels($username, $selectedArr, $this->dbh);
        $entreReq->hobbyReq();
        header("Location: http://localhost:6996/Views/FindMeViews.php");
        ob_end_flush();
    }
}