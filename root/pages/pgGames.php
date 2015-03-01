<?php
/**
 * Created by PhpStorm.
 * User: Devin
 * Date: 2015-02-28
 * Time: 3:57 PM
 * Purpose: Show off work
 */

$title = "Games made by OvD";
$pgStyleSheet = '<link rel="stylesheet" type="text/css" href="../styleSheets/pgGames.css">';

require '../globals.php';
require '../templates/templateData.php';
?>

<!DOCTYPE html>
<html>
<?php require '../templates/header.php'; ?>
<body>
<?php
require '../templates/titleBanner.php';
require '../templates/navigation.php';
?>
<div class="content">
    <h3>Tornadoom (Coming Soon!!)</h3>
    Click to load game
    <canvas id="canvasWebGL" onmousedown="CanvasMouseDown()" onmouseup="CanvasMouseUp()" width="800" height="800"></canvas>
    <script>
        var canvas = document.getElementById("canvasWebGL");
        function CanvasMouseDown() {
            canvas.style.backgroundColor = "wheat";
        }
        function CanvasMouseUp() {
            canvas.style.backgroundColor = "white";
        }
    </script>
</div>

</body>
<?php require '../templates/footer.php'; ?>
</html>