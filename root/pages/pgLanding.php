<?php
/**
 * Created by Odin
 * Date: 2015-02-28
 * Time: 12:30 PM
 * Purpose: This is a special home page with a very simple layout and navigation buttons
 */

$title = "OvD";

require '../globals.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <?php echo $gblStylesheet; ?>
    <link rel="stylesheet" type="text/css" href="../styleSheets/landing.css"/>
</head>
<body>
    <?php require '../templates/titleBanner.php'; ?>
    <nav>
        <ul>
            <li>
                <?php
                echo $navLinks['about'];
                echo $navLinks['games'];
                ?>
            </li>
            <li>
                <?php echo $navLinks['contact']; ?>
                <a href="#">Other</a>
            </li>
            <li>
                <a href="#">Other</a>
                <a href="#">Other</a>
            </li>
        </ul>
    </nav>
</body>
</html>