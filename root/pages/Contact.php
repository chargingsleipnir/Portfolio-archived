<?php
/**
 * Created by PhpStorm.
 * User: Devin
 * Date: 2015-02-28
 * Time: 3:57 PM
 * Purpose: Provide contact information
 */

$title = "Contact OvD";

require 'globals.php';
require 'templates/templateData.php';
?>

<!DOCTYPE html>
<html>
<?php require 'templates/header.php'; ?>
<body>
    <?php require 'templates/titleBanner.php'; ?>
    <div class="content widthControl">
        <h3>Reach out anytime!</h3>
        <div class="margTop40"><a class="standoutLink" href="mailto:devinodin@gmail.com">Email</a></div>
        <div class="margTop40"><a class="standoutLink" id="resumeDownload" href="downloads/Resume_Prog.pdf" target="_blank">Resume</a></div>
        <div class="margTop40"><a class="standoutLink" href="https://www.linkedin.com/pub/odin-von-doom/b1/a58/33?domainCountryName=&csrfToken=ajax%3A0362827175781380255">Linkedin</a></div>
    </div>
</body>
<?php require 'templates/footer.php'; ?>
</html>