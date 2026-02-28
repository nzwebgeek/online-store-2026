<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php include("cart.php"); ?>
<?php
// increases when plus button or add to cart is pressed
// if database product is over 0 then show product, if not dont show product
// Availability query
?>

<div class="container py-5">
    <h3 class="text=center bg-danger"><?php get_message(); ?></h3>
    <h2 class="mb-4 fw-bold">Checkout</h2>
<!--Paypal Form Here-->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
 <!-- <input type="hidden" name="cmd" value="_xclick">-->
  <input type="hidden" name="cmd" value="_cart"> 
  <input type="hidden" name="business" value="seller_@business.example.com">
  <input type="hidden" name="currency_code" value="NZD">
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="return" value="http://localhost/online-store/public/thank_you.php"><!--Extra Tip From ChatGpt, lets paypal know where to go-->
<!--PayPal-->

    <div class="row">
        
        <!-- Checkout Table -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php cart(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
</form>
        <!-- Cart Totals -->
        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Cart Totals</h5>
                </div>
                <div class="card-body">
                    
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Items</span><!--refresh quantity increase small bug-->
                            <strong><?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] ='0'; ?></strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Shipping & Handling</span>
                            <span class="text-success">Free Shipping</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Order Total</span>
                            <strong><?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] ='0'; ?></strong>
                        </li>
                    </ul>
                    <!--Check Out Button"-->
                   <?php echo show_paypal(); ?>
                    <!--Check Out Button-->
                </div>
            </div>
        </div>

    </div>
</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
