<?php
require_once __DIR__ . '/../Controllers/LoginControllers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Login</title>
</head>

<body>
    <div class="container container-form">
        <header>
            <a class="logo" href="../index.html">ANImeec.</a>
            <div class="link-group">
                <a href="./SignViews.php">Sign up</a>
            </div>
        </header>
        <main class="main-form">
            <form class="form" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2 class="form-title">Login</h2>
                <input class="username" name="user" type="text" placeholder="Username/E-mail">
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