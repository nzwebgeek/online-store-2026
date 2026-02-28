<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<?php
    if (isset($_GET['tx'])) {
        
        $amount      = escape_string($_GET['amt']);
        $currency    = escape_string($_GET['cc']);
        $transaction = escape_string($_GET['tx']);
        $status      = escape_string($_GET['st']);

       $stmt = $conn->prepare("INSERT INTO orders 
        (order_amount, order_transaction, order_status, order_currency) 
        VALUES (?, ?, ?, ?)");

        $stmt->bind_param("ssss", $amount, $transaction, $status, $currency);
        $stmt->execute();

        confirm($stmt);

        session_destroy();
    }
    else{
        redirect('index.php');
    }
?>

<div class="container">
    <h1 class="text-center">Thank You</h1>
</div>


<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
