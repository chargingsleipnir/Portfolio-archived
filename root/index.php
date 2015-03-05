<?php
/**
 * Created by Odin
 * Date: 2015-02-26
 * Time: 5:50 PM
 */

if(isset($_GET['pg'])) {
    $page = $_GET['pg'] . '.php';
    require_once 'pages/' . $page;
}
else {
    require_once 'pages/Landing.php';
}
?>