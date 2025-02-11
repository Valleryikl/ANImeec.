<?php
include('../Controllers/FindMeControllers.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/pag/findme.css">
    <script src="../assets/js/FindMe.js"></script>
    <title>ANImeec.</title>
</head>

<body>
    <div class="profil">
        <div class="profil__container">
            <h3 class="profil__title">My profil</h3>
            <div class="profil__info">
                <?php
                $test = new FindMeControllers($dbh);
                $test->datasShow();
                ?>
            </div>
        </div>
        <button class="profil__btn"><img src="../assets/img/menu.svg" alt="icon menu"></button>
    </div>
    <div class="container">
        <header>
            <a class="logo" href="../index.html">ANImeec.</a>
        </header>
        <form class="login-form" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <select class="genre" name="genre">
                <option value="">Non</option>
                <option value="Man">Man</option>
                <option value="Woman">Woman</option>
                <option value="Autre">Autre</option>
            </select>
            <select name="orientation">
                <option value="">Non</option>
                <option value="Hetero">Hetero</option>
                <option value="Bi">Bi</option>
                <option value="Gay">Gay</option>
                <option value="Lezbian">Lezbian</option>
            </select>
            <input name="age" type="number" min="18" max="999" placeholder="18">
            <input name="country" type="text" placeholder="Country">
            <input type="submit" value="Send">
        </form>
        <div class="user-group">
            <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $test1 = new FindMeControllers($dbh);
                $test1->dataValidation();
            }
            ?>
        </div>
    </div>
</body>

</html>