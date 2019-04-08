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
    echo $gblStylesheet;
    ?>
    <link rel="stylesheet" type="text/css" href="styleSheets/landing.css"/>
</head>
<body>
    <div id="logoBlock">
        <a href="<?=$pageLanding?>"><img width="128px" height="128px" src="<?=$images['logo']?>"></a>
        <br> Odin von Doom
    </div>
    <nav>
        <ul>
            <?php for($i = 0; $i < sizeof($pages); $i+=2 ) {?>
            <li>
                <?php if(isset($pages[$i])) {?> <a href="?pg=<?=$pages[$i]?>"><?=$pages[$i]?></a><?php }?>
                <?php if(isset($pages[$i+1])) {?> <a href="?pg=<?=$pages[$i+1]?>"><?=$pages[$i+1]?></a><?php }?>
            </li>
            <?php }?>
        </ul>
    </nav>
</body>
</html>