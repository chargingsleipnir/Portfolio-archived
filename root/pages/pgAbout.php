<?php
/**
 * Created by PhpStorm.
 * User: Devin
 * Date: 2015-02-28
 * Time: 3:57 PM
 * Purpose: Small biography
 */

$title = "About OvD";
$content = "Now I've almost got it...";

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
    <?php echo $content; ?>
</div>

</body>
<?php require '../templates/footer.php'; ?>
</html>