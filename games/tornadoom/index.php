<!doctype html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tornadoom</title>

    <?php include '../engineIncludes.php'; ?>

    <!---------- Game scripts ---------->
    <script type="text/javascript" src="scripts/objects/player.js"></script>
    <script type="text/javascript" src="scripts/objects/ufo.js"></script>
    <script type="text/javascript" src="scripts/objects/probe.js"></script>
    <script type="text/javascript" src="scripts/objects/barn.js"></script>
    <script type="text/javascript" src="scripts/objects/ammoObject.js"></script>
    <script type="text/javascript" src="scripts/objects/tree.js"></script>
    <script type="text/javascript" src="scripts/behaviours/ObjectControllers.js"></script>
    <script type="text/javascript" src="scripts/game.js"></script>
    <script type="text/javascript" src="scripts/messageSystems/hud.js"></script>
    <script type="text/javascript" src="scripts/messageSystems/inGameMenu.js"></script>
    <script type="text/javascript" src="scripts/messageSystems/inGameMessaging.js"></script>
    <script type="text/javascript" src="scripts/messageSystems/interSceneMessaging.js"></script>
    <script type="text/javascript" src="scripts/sceneTitle.js"></script>
    <script type="text/javascript" src="scripts/sceneLvl01.js"></script>
    <script type="text/javascript" src="scripts/sceneLvl02.js"></script>
    <script type="text/javascript" src="scripts/sceneEndBoth.js"></script>

    <style>
      #TornadoomCanvas {
        background-image: url('assets/images/TornadoomLogo.jpg');
        background-size: cover;
        background-repeat: no-repeat;
      }
      #TornadoomCanvas:-webkit-full-screen {
        /*
        position: fixed;
        width: 100%;
        top: 0;
        height: 100%;
        */
      }
      #TornadoomCanvas:-ms-fullscreen {
        /* To go to centre, as webkit naturally does */
        /*
        width: auto;
        height: auto;
        margin: auto;
        */
      }
    </style>

  </head>
  <body>
    <canvas id="TornadoomCanvas" width="800" height="800"></canvas>
    <script>
        var textureNamesFilepaths = [
            ['title', 'assets/images/TornadoomLogo.jpg'],
            ['endWin', 'assets/images/barn6Sized.png'],
            ['endLose', 'assets/images/ufo5Sized.png'],
            ['skyTexXPos', 'assets/images/skyTexXPosInv.png'],
            ['skyTexXNeg', 'assets/images/skyTexXNegInv.png'],
            ['skyTexYPos', 'assets/images/skyTexYPos.png'],
            ['skyTexYNeg', 'assets/images/skyTexYNeg.png'],
            ['skyTexZPos', 'assets/images/skyTexZPosInv.png'],
            ['skyTexZNeg', 'assets/images/skyTexZNegInv.png'],
            ['funnelTex', 'assets/images/tornadoFunnel.jpg'],
            ['dustPtcl', 'assets/images/smokeParticle2.png'],
            ['starPtcl', 'assets/images/star.png'],
            ['cowTex', 'assets/images/cowTexture.jpg'],
            ['chickenTex', 'assets/images/chickenTexture.png'],
            ['hayBaleTex', 'assets/images/hayBaleTex.png'],
            ['fenceTex', 'assets/images/wood.png'],
            ['wagonTex', 'assets/images/woodVaried.png'],
            ['barnTex', 'assets/images/redBarnTex.png'],
            ['groundTex', 'assets/images/ground6Dark30.jpg'],
            ['cowIcon', 'assets/images/iconCow2.png'],
            ['baleIcon', 'assets/images/iconHayBale.png'],
            ['abductIcon', 'assets/images/iconAbduction2.png'],
            ['rescueIcon', 'assets/images/iconRescue2.png'],
            ['crosshair', 'assets/images/crosshair.png'],
            ['switchUnlit', 'assets/images/buttonUnlit64.png'],
            ['switchLit', 'assets/images/buttonLit64.png'],
            ['cowBorderClick', 'assets/images/cowBorderClick.png'],
            ['barkTex', 'assets/images/bark.jpg'],
            ['foliageTexDark', 'assets/images/ground4.png'],
            ['foliageTexBright', 'assets/images/foliageTexBright.jpg']
        ];
        var modelNamesFilepaths = [
            ['playerTornado', 'assets/models/min_GameObjects_Funnel01.json'],
            ['cow', 'assets/models/min_GameObjects_Cow.json'],
            ['chicken', 'assets/models/min_GameObjects_Chicken.json'],
            ['sheep', 'assets/models/min_GameObjects_Sheep.json'],
            ['hayBale', 'assets/models/min_GameObjects_HayBale.json'],
            ['ufoSaucer', 'assets/models/min_GameObjects_UFOSaucer.json'],
            ['ufoCore', 'assets/models/min_GameObjects_UFOCore.json'],
            ['probe', 'assets/models/min_GameObjects_Probe.json'],
            ['wagon', 'assets/models/min_LevelCommon_Wagon.json'],
            ['barn', 'assets/models/min_LevelCommon_Barn.json'],
            ['lvl01Fence', 'assets/models/min_Environment_fenceLvl1.json'],
            ['lvl02Fence', 'assets/models/min_Environment_fenceLvl2.json'],
            ['pen', 'assets/models/min_Environment_PenSmall.json'],
            ['horizon', 'assets/models/min_Environment_Horizon.json'],
            ['treeTrunk', 'assets/models/min_Environment_TreeTruck.json'],
            ['treeBranches', 'assets/models/min_Environment_TreeBranches.json'],
            ['treeBranches2', 'assets/models/min_Environment_TreeBranches2.json']
        ];
        var audioNamesFilepaths = [
            ['tick', "assets/sounds/Tick.ogg"],
            ['cowMoo', "assets/sounds/cowMoo.ogg"],
            ['cowCry', "assets/sounds/cowCry.ogg"],
            ['cattleMoo', "assets/sounds/cattleMoo.ogg"],
            ['probeExplosion', "assets/sounds/probeExplosion.ogg"],
            ['thud', "assets/sounds/thud.ogg"],
            ['wind', "assets/sounds/wind.ogg"],
            ['windSoft', "assets/sounds/windSoft.ogg"],
            ['abduction', "assets/sounds/alienAbduction2.ogg"],
            ['fail', "assets/sounds/fail.ogg"],
            ['bgMusic', "assets/sounds/cowboyTheme.ogg"]
        ];

        // Optional settings
        DebugMngr.active = true;
        ViewMngr.SetLightProperties(true, LightModels.phong);

        GameMngr.Begin("TornadoomCanvas", BuildGame, textureNamesFilepaths, modelNamesFilepaths, audioNamesFilepaths);
    </script>
  </body>
</html>
