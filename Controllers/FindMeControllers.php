<?php
include('../Models/FindMeModels.php');
class FindMeControllers
{
    public $username;
    public $dbh;

    public function __construct($dbh)
    {
        session_start();
        $this->dbh = $dbh;
        $this->username = $_SESSION['username'];
    }

    public function datasShow()
    {
        // $findM = new FindMeModels($this->username, $this->dbh);
        // $profil = $findM->profil();
        // $interets = $findM->profilInterets();
        // foreach ($profil as $value) {
        //     echo "<p><b>name:</b> " . $value['lastname'] . " " . $value['firstname'] . "</p>";
        //     echo "<p><b>username:</b> " . $this->username . "</p>";
        //     echo "<p><b>country:</b> " . $value['country'] . "</p>";
        //     echo "<p><b>email:</b> " . $value['email'] . "</p>";
        //     echo "<p><b>password:</b> " . $value['password'] . "</p>";
        //     echo "<p><b>birthdate:</b> " . $value['birthdate'] . "</p>";
        //     echo "<b>interets:</b> ";
        // }
        // foreach ($interets as $value) {
        //     echo "<span>-" . $value['name'] . "</span> ";
        // }
    }
    public function dataValidation()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['genre'])) {
                $model = new FindMeModels($this->username, $this->dbh);
                $user = $model->userGenre($_POST['genre']);
                foreach ($user as $value) {
                    echo "<figure class='user-item'><img class='user-foto' src='". $value['img_url'] ."' alt='user foto'><figcaption class='user-infp'></figcaption>" . $value['lastname'] . " " . $value['firstname'] . "</figure>";
                }
            } elseif (!empty($_POST['orientation'])) {
                $model = new FindMeModels($this->username, $this->dbh);
                $user = $model->userOrientation($_POST['orientation']);
                foreach ($user as $value) {
                    echo "<figure class='user-item'><img class='user-foto' src='". $value['img_url'] ."' alt='user foto'><figcaption class='user-infp'></figcaption>" . $value['lastname'] . " " . $value['firstname'] . "</figure>";
                }
            } elseif (!empty($_POST['age'])) {
                $model = new FindMeModels($this->username, $this->dbh);
                $user = $model->userYears($_POST['age']);
                foreach ($user as $value) {
                    echo "<figure class='user-item'><img class='user-foto' src='". $value['img_url'] ."' alt='user foto'><figcaption class='user-infp'></figcaption>" . $value['lastname'] . " " . $value['firstname'] . "</figure>";
                }
            } elseif (!empty($_POST['country'])) {
                $model = new FindMeModels($this->username, $this->dbh);
                $user = $model->userCountry($_POST['country']);
                foreach ($user as $value) {
                    echo "<figure class='user-item'><img class='user-foto' src='". $value['img_url'] ."' alt='user foto'><figcaption class='user-infp'></figcaption>" . $value['lastname'] . " " . $value['firstname'] . "</figure>";
                }
            }
        }
    }
}
