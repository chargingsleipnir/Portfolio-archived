<?php
/**
 * Created by PhpStorm.
 * User: Devin
 * Date: 2015-02-28
 * Time: 3:57 PM
 * Purpose: Show off work
 */

$title = "Games made by OvD";
$pgStyleSheet = '<link rel="stylesheet" type="text/css" href="styleSheets/pgGames.css">';

require 'globals.php';
require 'templates/templateData.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <?php
    echo $gblStylesheet;
    echo $templateStylesheet;
    if(isset($pgStyleSheet))
        echo $pgStyleSheet;
    require 'games/engineIncludes.php';
    require 'games/tornadoomIncludes.php';
    ?>
</head>
<body>
    <?php require 'templates/titleBanner.php'; ?>
    <div id="gameChangeLinks">
    </div>
    <div class="content widthControl">
        <div id="gamePlaySpace">
            <h3>Tornadoom</h3>
            Click to load game (will take several seconds)
            <canvas id="canvasWebGL" onmouseup="EL.PreLoad(Initialize)" width="800" height="800"></canvas>
        </div>
        <p>
            <strong>About the Engine:</strong><br>
            Tornadoom is built with Engine von Doom, a webGL engine of my own design and build.<br>
            Notable features include:
        </p>
        <ul>
            <li>JSON model imports (Python export script made for Blender)</li>
            <li>GUI system (built-in, not HTML overlay)</li>
            <li>Paritcles</li>
            <li>Various lighting options</li>
            <li>Flexible key & mouse input system</li>
            <li>Scene management</li>
            <li>Mostly Sphere-Swept Volumes for collisions</li>
            <li>Flexible physics options</li>
            <li>Comprehensive & flexible API for everything above</li>
        </ul>
        <p>
            <strong>About Tornadoom:</strong><br>
            Tornadoom is more-or-less meant to simply show off some of the features of Engine von Doom.
            It's a fun little cow-chuckin' romp that'll give you a good laugh if you're sense of humour is as twisted as mine!
        </p>

        <div id="gameDescContainer">

        </div>
    </div>

</body>
    <?php require 'templates/footer.php'; ?>
</html>