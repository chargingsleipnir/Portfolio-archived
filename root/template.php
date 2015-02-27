<?php
/**
 * Created by Odin
 * Date: 2015-02-26
 * Time: 10:59 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="styleSheets/styles.css" />
</head>
<body>
    <div class="wrapper">
        <div class="banner">
            <button class="homeLogo"><img src="images/logo.png"></button>
        </div>

        <div class="navbarHorizontal">
            <ul class="list">
                <li><a href="#">Home</a></li>
                <li><a href="#">Page2</a></li>
                <li><a href="#">Page3</a></li>
                <li><a href="#">Page4</a></li>
            </ul>
        </div>

        <div class="content">
            <?php echo $content; ?>
            <button>Play Tornadoom</button>
        </div>

        <div class="sidebar">

        </div>
    </div>
</body>
<footer>
    <p>Odin von Doom</p>
</footer>
</html>