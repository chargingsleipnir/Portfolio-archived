<?php
/**
 * Created by PhpStorm.
 * User: Devin
 * Date: 2015-02-28
 * Time: 3:57 PM
 * Purpose: Show off work
 */

$pgStyleSheet = '<link rel="stylesheet" type="text/css" href="styleSheets/pgGames.css">';

require 'globals.php';
require 'templates/templateData.php';

/* Tornadoom must be the last page to load, to the content loop will stop short and not create the content panels that come after. */
$games = ['Metroid', 'FFBattle', 'FrostByte', 'FlippinOut', 'Tornadoom', 'DoomLagoon'];
$gameTabNames = ['Metroid Hunted', 'FF Battle', 'Frost Byte', 'Flippin\' Out', 'Tornadoom', 'Doom Lagoon'];
$gameIcons = ['Metroid', 'Umaro', 'Robot', 'Flipper', 'Cow', 'Dragon'];

$game = "DoomLagoon";
if(isset($_GET['gm'])) {
    $game = $_GET['gm'];
}

$index = array_search($game, $games, true);
$title = "Games by Odin: " . $gameTabNames[$index];

$xml = simplexml_load_file('externalFiles/EngineComponents.xml');
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php
            echo $gblIcon;
            echo $fontAwesome;
            echo $gblStylesheet;
            echo $templateStylesheet;
            if(isset($pgStyleSheet))
                echo $pgStyleSheet;
        ?>
        <script type="text/javascript" src="javaScripts/tabSwitch.js"></script>
        <script type="text/javascript" src="javaScripts/elementAnimation.js"></script>
        <script type="text/javascript" src="javaScripts/pgGames.js"></script>
        <script type="text/javascript" src="javaScripts/imageMultiLoader.js"></script>
    </head>
    <!-- Only need to run the Chat copy functionality if on the DoomLagoon page. -->
    <body <?php if($game == "DoomLagoon") { ?> onload="CopyChat.Init();"<?php } ?>>
        <?php require 'templates/titleBanner.php'; ?>

        <div id="GamePageColumns" class="flexRowTopAlignSpaced">
            <ul class="flexColLeftAlign noStyle flex100">
                <?php for($i = count($games) - 1; $i > -1; $i--) { ?>
                    <li class="margTop10 margLeft25">
                        <a href="?pg=Games&gm=<?= $games[$i] ?>" class="innerNav flexRowVertAlign <?= $games[$i] == $game ? "current" : "" ?>">
                            <span class="gameIcon"><img src="images/icons/<?= $gameIcons[$i] ?>.png" /></span>
                            <span class="margLeft15"><?= $gameTabNames[$i] ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="content widthControl flex10Auto">
                <?php require 'pages/Games/' . $game . '.php'; ?>
            </div>
            <div class="flex100"></div>
        </div>


        <!-- // TODO: Return to this when ruffle supports action script 3 -->
        <!-- <script>
            window.RufflePlayer = window.RufflePlayer || {};
            window.addEventListener("load", (event) => {
                const ruffle = window.RufflePlayer.newest();
                const player = ruffle.createPlayer();
                const container = document.getElementById("SwfPlayerContainer");
                container.appendChild(player);
                player.load("externalFiles/ExternalPreloader.swf");
                //player.load("Assignment 2.swf");
            });
        </script>
        <script type="text/javascript" src="includes/ruffle/ruffle.js"></script> -->
    </body>
    <?php require 'templates/footer.php'; ?>
</html>