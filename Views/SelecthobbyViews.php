<?php include('../Controllers/SignControllers.php');
    include('../Controllers/SelecthobbyControllers.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/pag/selecthobby.css">
    <title>Hobby</title>
</head>

<body>
    <div class="container">
        <header>
            <a class="logo" href="../index.html">ANImeec.</a>
        </header>
        <p class="userhello">
            <?php
            ob_start();
            session_start();
            $user = $_SESSION['username'];
            echo "Hello $user!<br>Choose what you like.";
            ?>
        </p>
        <form class="select-interets" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="select-interets__option">
                <input type="checkbox" id="Anime" name="Anime" value="Anime">
                <label for="Anime">Anime</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Movie" name="Movie" value="Movie">
                <label for="Movie">Movie</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Sport" name="Sport" value="Sport">
                <label for="Sport">Sport</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Family" name="Family" value="Family">
                <label for="Family">Family</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Literature" name="Literature" value="Literature">
                <label for="Literature">Literature</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Manga" name="Manga" value="Manga">
                <label for="Manga">Manga</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Tech" name="Tech" value="Tech">
                <label for="Tech">Tech</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Food" name="Food" value="Food">
                <label for="Food">Food</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Travel" name="Travel" value="Travel">
                <label for="Travel">Travel</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Music" name="Music" value="Music">
                <label for="Music">Music</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Art" name="Art" value="Art">
                <label for="Art">Art</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Fashion" name="Fashion" value="Fashion">
                <label for="Fashion">Fashion</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Gaming" name="Gaming" value="Gaming">
                <label for="Gaming">Gaming</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Fitness" name="Fitness" value="Fitness">
                <label for="Fitness">Fitness</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Photography" name="Photography" value="Photography">
                <label for="Photography">Photography</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Cooking" name="Cooking" value="Cooking">
                <label for="Cooking">Cooking</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="History" name="History" value="History">
                <label for="History">History</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Politics" name="Politics" value="Politics">
                <label for="Politics">Politics</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Science" name="Science" value="Science">
                <label for="Science">Science</label>
            </div>
            <div class="select-interets__option">
                <input type="checkbox" id="Nature" name="Nature" value="Nature">
                <label for="Nature">Nature</label>
            </div>
            <input class="submit" type="submit" value="Send">
        </form>
        <p><?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // $selected = array_keys($_POST);
                // // $selected_count = count($selected);
                // echo "Выбранные: " . implode(", ", $selected);
                $select = new SelecthobbyControllers($dbh);
                $select ->dataValidation();
            }
            ?></p>
    </div>
</body>

</html>