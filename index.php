<?php
/**
 * Created by Odin
 * Date: 2015-02-26
 * Time: 5:50 PM
 */

if(isset($_GET['pg'])) {
    require_once 'pages/' . $_GET['pg'] . '.php';
}
else {
    require_once 'pages/Landing.php';
}
?>