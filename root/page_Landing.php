<?php
/**
 * Created by Odin
 * Date: 2015-02-28
 * Time: 12:30 PM
 * Purpose: This is a special home page with a very simple layout and navigation buttons
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['styleSheets']['global']; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['styleSheets']['landing']; ?>"/>
</head>
<body>
    <?php include 'titleBanner.php'; ?>
    <nav>
        <ul>
            <li>
                <a href="page_About.php">About</a>
                <a href="page_Games.php">Games</a>
            </li>
            <li>
                <a href="page_Contact.php">Contact</a>
                <a href="#">Other</a>
            </li>
            <li>
                <a href="#">Other</a>
                <a href="#">Other</a>
            </li>
        </ul>
    </nav>
</body>
</html>