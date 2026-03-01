<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


<div class="container my-5">


<?php include(TEMPLATE_FRONT . DS ."side-nav.php");?>

  <div class="card shadow-lg border-0">
    <div class="row g-0 align-items-center">
      
      <!-- Product Image -->
      <div class="col-md-5">
        <?php  $query = query(" SELECT * FROM products WHERE product_id = ". escape_string($_GET['id'])."");
          confirm($query);

          while ($row = fetch_array($query)) : ?>
        <img src="../resources/<?php echo display_image($row['product_image']);?>"
             class="img-fluid rounded-start w-100 h-100 object-fit-cover"
             alt="Product Image">
             <?php endwhile; ?>
      </div>

      <!-- Product Info -->
      <div class="col-md-7">
        <?php  
          $query = query(" SELECT * FROM products WHERE product_id = ". escape_string($_GET['id'])."");
          confirm($query);

          while ($row = fetch_array($query)) :
          
        ?>
        <div class="card-body p-4">
          
          <h2 class="card-title mb-3"><?php echo $row['product_title']; ?></h2>
          
          <p class="card-text text-muted mb-4">
           <?php echo $row['product_description']; ?>
           
          </p>

          <h4 class="text-primary fw-bold mb-4"><?php echo "&#36;". $row["product_price"]; ?></h4>

          <button class="btn btn-dark btn-md" onclick="window.location.href='../resources/cart.php?add=<?php echo $row['product_id'];?>'">
            🛒 Add to Cart
          </button>
        <?php endwhile; ?><!--end-->
        </div>
      </div>

    </div>
  </div>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>