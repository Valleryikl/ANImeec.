<?php 
require_once __DIR__ . '/../Controllers/SignControllers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="container container-form">
        <header>
            <a class="logo" href="../index.html">ANImeec.</a>
            <div class="link-group">
                <a href="./LoginViews.php">Login</a>
            </div>
        </header>
        <main class="main-form">
            <form class="form" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2 class="form-title">Sign up</h2>
                <input class="firstname" name="firstname" type="text" placeholder="Firstname">
                <input class="lastname" name="lastname" type="text" placeholder="Lastname">
                <input class="username" name="username" type="text" placeholder="Username">
                <input class="birthdate" name="birthdate" type="date">
                <div class="select-group">
                <select class="genre" name="genre">
                    <option value="">Non</option>
                    <option value="1">Man</option>
                    <option value="2">Woman</option>
                    <option value="3">Autre</option>
                </select>
                <select name="orientation">
                    <option value="">Non</option>
                    <option value="1">Hetero</option>
                    <option value="2">Bi</option>
                    <option value="3">Gay</option>
                    <option value="4">Lezbian</option>
                </select>
                </div>
                <input name="country" type="text" placeholder="Country">
                <input name="email" type="email" placeholder="example@gmail.com">
                <input name="password" type="password">
                <input class="submit" type="submit" value="Send">
                <p><?php
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $loginC = new SignControllers($dbh);
                    $loginC->dataValidation();
                }
                ?></p>
            </form>
        </main>
    </div>
</body>

</html>