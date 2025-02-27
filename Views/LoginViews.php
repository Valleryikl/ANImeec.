<?php
require_once __DIR__ . '/../Controllers/LoginControllers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/animation.css">
    <link rel="stylesheet" href="../assets/css/pag/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <header>
            <a class="logo" href="../index.html">ANImeec.</a>
            <div class="link-group">
                <a href="./LoginViews.php">Login</a>
            </div>
        </header>
        <main>
            <form class="login-form" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2 class="form-title">Sign up</h2>
                <input class="username" name="user" type="text" placeholder="Username/E-mail">
                <input name="password" type="password">
                <input class="submit" type="submit" value="Send">
                <img class="heart" src="../assets/img/heart.png" alt="heart">
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