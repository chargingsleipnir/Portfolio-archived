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

/* Tornadoom must be the last page to load, to the content loop will stop short and not create the content panels that come after. */
$games = ['Metroid', 'FFBattle', 'FrostByte', 'FlippinTables', 'Tornadoom'];
$gameTabNames = ['Metroid Hunted', 'FF Battle', 'Frost Byte', 'Flippin\' Tables', 'Tornadoom'];

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
<body>
    <?php require 'templates/titleBanner.php'; ?>
    <ul class="tabs noStyle">
        <!-- The id names in the TabSwitch function call are the only things that are more-or-less hard coded -->
        <?php for($i = 0; $i < count($games); $i++) { ?>
            <li><a href="javascript:TabSwitch(<?= $i ?>, <?= count($games) ?>, 'gameTab', 'game')" id="gameTab<?= $i ?>"><?= $gameTabNames[$i] ?></a></li>
        <?php } ?>
    </ul>
    <div class="content widthControl">
        <?php for($i = 0; $i < count($games); $i++) { ?>
        <div id="game<?= $i ?>">
            <?php require 'pages/gameTabbedContent/' . $games[$i] . '.php'; ?>
        </div>
        <?php } ?>
    </div>
    <script>
        // Must activate Tornadoom element/tab and hide the rest. Tornadoom has to come first to show because it has to fully load
        // its images in order to get the correct div heights for the sliding panels
        TabSwitch(<?= array_search('Tornadoom', $games); ?>, <?= count($games) ?>, 'gameTab', 'game');
    </script>
</body>
    <?php require 'templates/footer.php'; ?>
</html>