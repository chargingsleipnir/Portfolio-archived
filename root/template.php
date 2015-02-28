<?php
/**
 * Created by Odin
 * Date: 2015-02-26
 * Time: 10:59 PM
 * Purpose: A template for most common pages, so they can by dynamically generated
 */

session_start();
?>

<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<body>
    <?php include 'titleBanner.php'; ?>
    <?php include 'navigation.php'; ?>

    <div class="content">
        <?php echo $content; ?>
        <button>Play Tornadoom</button>
    </div>

</body>
<?php include 'footer.php'; ?>
</html>

<?php
session_write_close();
?>