<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<?php
    // go inside products table and see if quanity is equal to session on front end
    // if not then it wont increment
if (isset($_GET['add'])) 
{
    $query = query("SELECT * FROM products WHERE product_id=" .escape_string($_GET['add'])."");
    confirm($query);

    while ($row =fetch_array($query)) 
    {

        if ($row["product_quantity"] != $_SESSION['product_' . $_GET['add']]) 
        {

            $_SESSION['product_'] = $_GET['add']+=1; // then increment
            redirect('checkout.php');
    
        }
        else
        {
            set_message('We only have '.$row['product_quantity'].' available');
            redirect('checkout.php');
        }

    }
}

?>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
