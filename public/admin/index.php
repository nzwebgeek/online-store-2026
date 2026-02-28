<<?php require_once("../../resources/config.php");?>
<?php include(TEMPLATE_BACK .  "/admin_header.php"); ?>

    <!-- Top Navbar -->
<?php include(TEMPLATE_BACK .  "/admin_top_nav.php"); ?>

    <div class="d-flex">

        <!--Side Bar-->
<?php include(TEMPLATE_BACK .  "/admin_side_nav.php"); ?>
        <!-- Page Content -->
<?php 
    if ($_SERVER['REQUEST_URI'] == "/online-store/public/admin/" || $_SERVER['REQUEST_URI'] == "/online-store/public/admin/index.php") {
        include(TEMPLATE_BACK .  "/admin_content.php"); 
    }
    if (isset($_GET["orders"])) {
        include(TEMPLATE_BACK .  "/orders.php"); 

    }

?>

        <!-- /#page-content-wrapper -->
<?php include(TEMPLATE_BACK .  "/admin_footer.php"); ?>
