<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<?php
    if (isset($_GET['add'])) {
        // echos incrementing id as a test case
        $_SESSION['product_' . $_GET['add']] +=1;
        redirect("index.php");
    }
?>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
