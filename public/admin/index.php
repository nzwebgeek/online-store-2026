<<?php require_once("../../resources/config.php");?>
<?php include(TEMPLATE_BACK .  "/admin_header.php"); ?>

    <!-- Top Navbar -->
<?php include(TEMPLATE_BACK .  "/admin_top_nav.php"); ?>
<?php 
    if(!isset($_SESSION['username'])){
        redirect('../../public');
    } 
?>
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
     if (isset($_GET["products"])) {
        include(TEMPLATE_BACK .  "/products.php"); 

    }
     if (isset($_GET["categories"])) {
        include(TEMPLATE_BACK .  "/categories.php"); 

    }
    if (isset($_GET["add_product"])) {
        include(TEMPLATE_BACK .  "/add_product.php"); 

    }
     if (isset($_GET["users"])) {
        include(TEMPLATE_BACK .  "/users.php"); 

    }
    

?>

        <!-- /#page-content-wrapper -->
<?php include(TEMPLATE_BACK .  "/admin_footer.php"); ?>
