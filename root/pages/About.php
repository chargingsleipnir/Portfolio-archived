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
        <a class="standoutLink floatR" id="resumeDownload" href="downloads/Resume_Prog.pdf" target="_blank">Resume</a>
        <h3>My career history in a nutshell:</h3>

        <p>Emergency Service worker => Game Developer.</p>

        Why? Two major reasons:<br>
        <ol>
            <li>My terrible eyes - Fumbling with glasses while responding to emergencies, not a good mix.</li>
            <li>Passion for gaming - I did well in my former career, but it wasn't my passion, not the way gaming is.
                 I know I had to be involved in the industry in some way, shape, or form, and here I am!!</li>
        </ol>

        <p>So, I'm on a new path now, building toward a strong career in game development, first by learning computer programming.
         I mostly focus on the programming, but do also take the time to develop my artistic skills as the need & opportunities arise.</p>

        <p>You can find more on my <a class="inlineLink" href="https://www.linkedin.com/pub/odin-von-doom/b1/a58/33?domainCountryName=&csrfToken=ajax%3A0362827175781380255">Linkedin</a> profile!</p>
    </div>
</body>
<?php require 'templates/footer.php'; ?>
</html>