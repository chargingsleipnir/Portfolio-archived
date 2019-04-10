<?php
/**
 * Created by Odin
 * Date: 2015-02-28
 * Time: 12:30 PM
 * Purpose: This is a special home page with a very simple layout and navigation buttons
 */

$title = "OvD";

require 'globals.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <?php 
    echo $gblIcon;
    echo $fontAwesome;
    echo $gblStylesheet;
    ?>
    <link rel="stylesheet" type="text/css" href="styleSheets/landing.css"/>
</head>
<body>
    <nav>
        <ul class="noStyle">
            <li>
                <a href="?pg=About">
                    <i class="far fa-2x fa-user"></i>&nbsp;&nbsp;About
                </a>
            </li>
            <li>
                <a href="?pg=Games">
                    <i class="fas fa-2x fa-gamepad"></i>&nbsp;&nbsp;Games
                </a>
            </li>
            <li>
                <a href="?pg=Web">
                    <i class="fas fa-2x fa-globe-americas"></i>&nbsp;&nbsp;Web&nbsp;apps
                </a>
            </li>
            <li>
                <a href="?pg=Anims">
                    <i class="fas fa-2x fa-film"></i>&nbsp;&nbsp;Animations
                </a>
            </li>
            <li>
                <a href="?pg=Contact">
                    <i class="far fa-2x fa-envelope"></i>&nbsp;&nbsp;Contact
                </a>
            </li>
        </ul>
    </nav>
</body>
</html>