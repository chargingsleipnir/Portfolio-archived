<?php
/**
 * Created by Odin
 * Date: 2015-02-28
 * Time: 12:43 PM
 */
?>

<nav>
    <ul class="noStyle">
        <!-- <li>
            <a href="?pg=About" <?=(($_GET['pg'] == "About") ? 'class="current"' : '')?>>
                <i class="far fa-2x fa-user"></i>
                <div>About</div>
            </a>
        </li> -->
        <li>
            <a href="?pg=Games&gm=DoomLagoon" <?=(($_GET['pg'] == "Games") ? 'class="current"' : '')?>>
                <i class="fas fa-2x fa-gamepad"></i>
                <div>Games</div>
            </a>
        </li>
        <li>
            <a href="?pg=Web" <?=(($_GET['pg'] == "Web") ? 'class="current"' : '')?>>
                <i class="fas fa-2x fa-globe-americas"></i>
                <div>Web&nbsp;apps</div>
            </a>
        </li>
        <li>
            <a href="?pg=Anims" <?=(($_GET['pg'] == "Anims") ? 'class="current"' : '')?>>
                <i class="fas fa-2x fa-film"></i>
                <div>Animations</div>
            </a>
        </li>
        <li>
            <a href="?pg=Contact" <?=(($_GET['pg'] == "Contact") ? 'class="current"' : '')?>>
                <i class="far fa-2x fa-envelope"></i>
                <div>Contact</div>
            </a>
        </li>
    </ul>
</nav>