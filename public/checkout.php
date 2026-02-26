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
                                    <th>Remove</th>
                                    <th>Add</th>
                                    <th>Delete</th>
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

                    <button class="btn btn-primary w-100">
                        Proceed to Payment
                    </button>

                </div>
            </div>
        </div>

    </div>
</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
