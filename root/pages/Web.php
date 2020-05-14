<?php
/**
 * User: Odin
 * Date: 2019-04-10
 * Time: 10:27 AM
 * Purpose: Show off more work
 */

$title = "Web apps & sites made by OvD";

require 'globals.php';
require 'templates/templateData.php';
?>

<!DOCTYPE html>
<html>
<?php require 'templates/header.php'; ?>
<body>
    <?php require 'templates/titleBanner.php'; ?>
    <div class="content widthControl">
        <div>
            <h3><a href="https://debatabase.herokuapp.com/" class="inlineLink" target="_blank">Debatabase</a></h3>
            <p>This is a personal project I built in order to learn Node.js and mongoDB.</p>
            <p>It’s a social, debate-facilitation tool, offering:</p>
                <ul>
                    <li>Various access levels based on registration status and permissions set</li>
                    <li>Smooth transitions/animations</li>
                    <li>Social tools – follow, unfollow, block, bookmark, messaging (IM &amp; mail), etc.</li>
                    <li>Wide range of search tools:
                        <ul>
                            <li>Search users to connect with</li>
                            <li>Search debates by text or tags</li>
                            <li>The most popular debates are readily listed</li>
                        </ul>
                    </li>
                    <li>First-principle based rating system; ratings of lower-level arguments override parent argument ratings</li>
                    <li>Favourability display (results of rating averages from the bottom, up)</li>
                    <li>Multiple overview options:
                        <ul>
                            <li>Node-based map</li>
                            <li>Linear argument listing</li>
                        </ul>
                    </li>
                    <li>Download debates as .pdf files</li>
                </ul>
            <p>Explore logged-in features with guest account:</p>
            <ul>
                <li>Username: guest</li>
                <li>Password: 1234</li>
            </ul>
        </div>
        <div class="margTop40">
            <h3><a href="https://ovd-messenger.herokuapp.com/" class="inlineLink" target="_blank">Messenger</a></h3>
            <p>Another personal project I built to prototype some ideas I had about gamifying a chat application, and learning React.js, Bootstrap css, and mobile responsive design along the way.</p>
            <p>It’s <i>very</i> basic chat application, in which all active users are immediately displayed to chat with, and one-on-one conversations can take place with those who mutually "like" each other.</p>
            <p>In-chat gamification is coming!</p>
        </div>
    </div>
</body>
<?php require 'templates/footer.php'; ?>
</html>