<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<!-- Jumbotron / Hero Section -->
<div class="bg-light p-5 mb-4 rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Shopping Page - 2026</h1>
    </div>
</div>
<!-- Latest Features Section -->
<div class="container mb-5">
    <div class="row g-4">
       <?php get_products_in_shop_page() ?>
    </div>
</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
