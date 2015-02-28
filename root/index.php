<?php
/**
 * Created by Odin
 * Date: 2015-02-26
 * Time: 5:50 PM
 */

// Define all cross-page variable
session_start();

include 'resourcePaths.php';

session_write_close();

$title = "OvD";
include 'page_Landing.php';
?>