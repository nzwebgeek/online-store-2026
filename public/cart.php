<?php require_once("../resources/config.php");?>

<?php
    // go inside products table and see if quanity is equal to session on front end
    // if not then it wont increment
if (isset($_GET['add'])) 
{
    $query = query("SELECT * FROM products WHERE product_id=" .escape_string($_GET['add'])."");
    confirm($query);

    while ($row =fetch_array($query)) 
    {
        // product increments, once it reaches max it stops

        if ($row["product_quantity"] != $_SESSION['product_' . $_GET['add']]) 
        {
            $_SESSION['product_' . $_GET['add']] += 1;
            redirect('checkout.php');
        }
        else
            {
                set_message("We only have ". $row['product_quantity']." Available of {$row['product_title']}");
                redirect("checkout.php");
            }

    }
}
//------------check if remove has been added to session---------------------------------
if(isset($_GET["remove"])){

    $_SESSION["product_" . $_GET["remove"]]--; // --
    // products below 1
    if ($_SESSION["product_" . $_GET['remove']] < 1){
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect('checkout.php')
    }
    else{
    redirect('checkout.php');
    }
}
// set to zero on delete
if(isset($_GET['delete'])){
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect('checkout.php'); // need to unset before redirecting
}
//----------------------------------------------------------------------------------------------------------
function cart(){
// Total amount
$total = 0;
$item_quantity = 0; // refresh bug fix by declare variable to 0
// key is name
foreach ($_SESSION as $name => $value) {
// if bigger than zero do not show
if ($value > 0 ) {
    # code...
// loop through key and value, 0 start and right is finish. Add on to end of product
 if(substr($name,0,8) == 'product_'){

 //$length = strlen($name -8); 
  $length = strlen($name) - 8;    
 $id = substr($name,8, $length);
// product_ 8 characters
$query = query("SELECT * FROM products WHERE product_id = " . escape_string($id) ."");
confirm($query);
// If equal to above product_ then show, if not then do not show output
while ($row = fetch_array($query)){
$sub = $row['product_price'] * $value; // sub total    
$item_quantity += $value; // create inside to eliminate refresh bug
$product = <<<DELIMETER

<tr>
    <td>{$row['product_title']}</td>
    <td>&#36;{$row['product_price']}</td>
    <td>
    {$value}
    </td>
    <td>&#36;{$sub}</td>
    <td>
        <a class="btn btn-warning" href="cart.php?remove={$row['product_id']}"><span class="bi bi-dash-circle"></span></a>     
    <td>
        <a class="btn btn-success" href="cart.php?add={$row['product_id']}"><span class="bi bi-plus"></span></a>
    </td>
    <td>
        <a class="btn btn-danger"  href="cart.php?delete={$row['product_id']}"><span class="bi bi-trash"></span></a>
    </td>
    <td>
    </td?
    </td>
</button>
</tr>
DELIMETER;
echo $product; 
    }
    $_SESSION['item_total'] = $total += $sub;
    $_SESSION['item_quantity'] = $item_quantity;

 }
}

}

}
//-----------above had bug, it doubles when output------------------------
?>
