<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<!--Header goes here-->
<!-- Hero Section -->
<section class="hero text-center">
<!--Hero here-->
<?php include(TEMPLATE_FRONT . DS . "hero.php"); ?>
</section>

<!-- Categories -->
<!--Side Nav-->
<?php include(TEMPLATE_FRONT . DS . "side-nav.php"); ?>
<!-- Featured Products -->
<section class="bg-light py-5">
  <div class="container">
    <h2 class="text-center mb-4">Featured Products</h2>
    <div class="row g-4">
      <!-- Product 1 -->
      <?php get_products_with_pagination(3) ?>
    </div>
  </div>
</section>

<!-- Promo Section -->
<section class="py-5 text-center bg-warning">
  <div class="container">
    <h2 class="fw-bold">Limited Time Offer!</h2>
    <p class="mb-3">Get 20% off on all items this weekend only.</p>
    <a href="#" class="btn btn-dark btn-lg">Grab the Deal</a>
  </div>
</section>

<!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>