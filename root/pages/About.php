<?php
/**
 * Created by PhpStorm.
 * User: Devin
 * Date: 2015-02-28
 * Time: 3:57 PM
 * Purpose: Small biography
 */

$title = "About OvD";
$pgStyleSheet = '<link rel="stylesheet" type="text/css" href="styleSheets/pgAbout.css">';

require 'globals.php';
require 'templates/templateData.php';
?>

<!DOCTYPE html>
<html>
<?php require 'templates/header.php'; ?>
<body>
    <?php require 'templates/titleBanner.php'; ?>
    <div class="content widthControl">
    	Putting awesome stuff out there. :)
    </div>
</body>
<?php require 'templates/footer.php'; ?>
</html>