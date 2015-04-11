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
                <canvas id="gameCanvas" width="800" height="800"></canvas>
                <script>
                    var textureNamesFilepaths = [
                        ['title', 'games/tornadoom/assets/images/title.png'],
                        ['endWin', 'games/tornadoom/assets/images/barn6Sized.png'],
                        ['endLose', 'games/tornadoom/assets/images/ufo5Sized.png'],
                        ['skyTexXPos', 'games/tornadoom/assets/images/skyTexXPosInv.png'],
                        ['skyTexXNeg', 'games/tornadoom/assets/images/skyTexXNegInv.png'],
                        ['skyTexYPos', 'games/tornadoom/assets/images/skyTexYPos.png'],
                        ['skyTexYNeg', 'games/tornadoom/assets/images/skyTexYNeg.png'],
                        ['skyTexZPos', 'games/tornadoom/assets/images/skyTexZPosInv.png'],
                        ['skyTexZNeg', 'games/tornadoom/assets/images/skyTexZNegInv.png'],
                        ['funnelTex', 'games/tornadoom/assets/images/tornadoFunnel.jpg'],
                        ['dustPtcl', 'games/tornadoom/assets/images/smokeParticle2.png'],
                        ['starPtcl', 'games/tornadoom/assets/images/star.png'],
                        ['cowTex', 'games/tornadoom/assets/images/cowTexture.jpg'],
                        //['chickenTex', 'games/tornadoom/assets/images/chickenTexture.png'],
                        ['hayBaleTex', 'games/tornadoom/assets/images/hayBaleTex.png'],
                        ['fenceTex', 'games/tornadoom/assets/images/wood.png'],
                        ['wagonTex', 'games/tornadoom/assets/images/woodVaried.png'],
                        ['barnTex', 'games/tornadoom/assets/images/redBarnTex.png'],
                        ['groundTex', 'games/tornadoom/assets/images/ground6Dark10.png'],
                        //['brownShrubTex', 'games/tornadoom/assets/images/brownShrubTex.jpg'],
                        ['cowIcon', 'games/tornadoom/assets/images/iconCow2.png'],
                        ['baleIcon', 'games/tornadoom/assets/images/iconHayBale.png'],
                        ['abductIcon', 'games/tornadoom/assets/images/iconAbduction2.png'],
                        ['rescueIcon', 'games/tornadoom/assets/images/iconRescue2.png'],
                        ['crosshair', 'games/tornadoom/assets/images/crosshair.png'],
                        ['switchUnlit', 'games/tornadoom/assets/images/buttonUnlit64.png'],
                        ['switchLit', 'games/tornadoom/assets/images/buttonLit64.png'],
                        ['cowBorderClick', 'games/tornadoom/assets/images/cowBorderClick.png']
                    ];
                    var modelNamesFilepaths = [
                        ['playerTornado', 'games/tornadoom/assets/models/min_GameObjects_Funnel01.json'],
                        ['cow', 'games/tornadoom/assets/models/min_GameObjects_Cow.json'],
                        //['chicken', 'games/tornadoom/assets/models/GameObjects_Chicken.json'],
                        //['sheep', 'games/tornadoom/assets/models/GameObjects_Sheep.json'],
                        ['hayBale', 'games/tornadoom/assets/models/min_GameObjects_HayBale.json'],
                        ['ufoSaucer', 'games/tornadoom/assets/models/min_GameObjects_UFOSaucer.json'],
                        ['ufoCore', 'games/tornadoom/assets/models/min_GameObjects_UFOCore.json'],
                        ['probe', 'games/tornadoom/assets/models/min_GameObjects_Probe.json'],
                        //['crosshair', 'games/tornadoom/assets/models/GameObjects_CrossHair.json'],
                        ['wagon', 'games/tornadoom/assets/models/min_LevelCommon_Wagon.json'],
                        ['barn', 'games/tornadoom/assets/models/min_LevelCommon_Barn.json'],
                        ['lvl01Fence', 'games/tornadoom/assets/models/min_Environment_fenceLvl1.json'],
                        ['lvl02Fence', 'games/tornadoom/assets/models/min_Environment_fenceLvl2.json'],
                        //['lvl03Fence', 'games/tornadoom/assets/models/Environment_fenceLvl3.json'],
                        ['chickenPen', 'games/tornadoom/assets/models/min_Environment_PenSmall.json'],
                        ['horizon', 'games/tornadoom/assets/models/min_Environment_Horizon.json'],
                        //['brownShrub', 'games/tornadoom/assets/models/Environment_Shrub.json']
                    ];
                    var audioNamesFilepaths = [
                        ['tick', "games/tornadoom/assets/sounds/Tick.ogg"],
                        ['cowMoo', "games/tornadoom/assets/sounds/cowMoo.ogg"],
                        ['cowCry', "games/tornadoom/assets/sounds/cowCry.ogg"],
                        ['cattleMoo', "games/tornadoom/assets/sounds/cattleMoo.ogg"],
                        ['probeExplosion', "games/tornadoom/assets/sounds/probeExplosion.ogg"],
                        ['thud', "games/tornadoom/assets/sounds/thud.ogg"],
                        ['wind', "games/tornadoom/assets/sounds/wind.ogg"],
                        ['windSoft', "games/tornadoom/assets/sounds/windSoft.ogg"],
                        ['abduction', "games/tornadoom/assets/sounds/alienAbduction2.ogg"],
                        ['fail', "games/tornadoom/assets/sounds/fail.ogg"],
                        ['bgMusic', "games/tornadoom/assets/sounds/cowboyTheme.ogg"]
                    ];

                    // Optional settings
                    DebugMngr.active = true;
                    ViewMngr.SetLightProperties(true, LightModels.phong);

                    GameMngr.Begin("gameCanvas", BuildGame, textureNamesFilepaths, modelNamesFilepaths, audioNamesFilepaths);
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