<?php
/**
 * Created by Odin
 * Date: 2015-02-28
 * Time: 12:43 PM
 */
?>

<nav>
    <ul>
        <?php foreach ($pages as $pageId): ?>
        <li>
            <a <?=(($_GET['pg'] == $pageId) ? 'class="current"' : '')?>
                href="?pg=<?=$pageId?>"><?=$pageId?></a>
        </li>
        <?php endforeach;?>
    </ul>
</nav>