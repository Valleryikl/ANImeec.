<?php 
include ('../Models/SelecthobbyModels.php');

class SelecthobbyControllers
{
    public $username;
    public $selectedArr;
    public $entreReq;
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function dataValidation() {
        $this->selectedArr = array_keys($_POST);
        $this->username = $_SESSION['username'];
        $entreReq = new SelecthobbyModels($this->username, $this->selectedArr, $this->dbh);
        $entreReq->hobbyReq();
        header("Location: http://localhost:6996/Views/FindMeViews.php");
        ob_end_flush();
    }
}