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
            <div id="canvasContainer">
                <img id="tornadoomTitlePreloaded" src="<?=$images['tornadoomPreload']?>" width="800" height="800">
                <canvas id="canvas2D" width="800" height="800"></canvas>
                <canvas id="canvasWebGL" onmouseup="RunLoadScreen()" width="800" height="800"></canvas>
                <script>
                    var ctx2D = document.getElementById('canvas2D').getContext("2d");
                    function ShowTornadoomTitle() {
                        ctx2D.font = "40px Arial";
                        ctx2D.fillStyle = "#FFFFFF";
                        ctx2D.fillText("Click to load", 500, 650);
                    }
                    function StartGame() {
                        ctx2D.fillRect(0, 0, 800, 800);
                        BuildGame();
                    }
                    function NextLoading() {
                        // Game Initialization in entryPoint.js
                        Initialize(StartGame);
                    }
                    // Show loading animation components
                    function RunLoadScreen() {
                        document.getElementById('canvasWebGL').removeAttribute("onmouseup");
                        ctx2D.clearRect(0, 0, 800, 800);
                        ctx2D.fillText("Loading...", 500, 650);

                        EL.PreLoad(NextLoading);
                    }

                    ShowTornadoomTitle();
                </script>
            </div>
        </div>
        <p>
            <strong>About the Engine:</strong><br>
            Tornadoom is built with Engine von Doom, a webGL engine of my own design and build.<br>
            Notable features include:
        </p>
        <ul>
            <li>JSON model imports (Python export script made for Blender)</li>
            <li>GUI system (built-in, not HTML overlay)</li>
            <li>Particles</li>
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