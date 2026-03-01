<?php require_once("config.php");?>

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
            redirect('../public/checkout.php');
        }
        else
            {
                set_message("We only have ". $row['product_quantity']." Available of {$row['product_title']}");
                redirect("../public/checkout.php");
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
    redirect('../public/checkout.php');
    }
    else{
    redirect('../public/checkout.php');
    }
  
}


//----------------------------------------------------------
// set to zero on delete
if(isset($_GET['delete'])){
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect('../public/checkout.php'); // need to unset before redirecting
}
//----------------------------------------------------------------------------------------------------------
function cart(){
// Total amount http://localhost/online-store/public/checkout.php?amt=400&cc=NZD&tx=34535345&st=Completed
$total = 0;
$item_quantity = 0; // refresh bug fix by declare variable to 0
$item_name = 1;
$item_number = 1;
$amount = 1;
$quantity = 1;
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

$product_image=display_image($row['product_image']);
$product = <<<DELIMETER

<tr>
    <td>{$row['product_title']}<br>
    <img src='../resources/{$product_image}'>
    </td>
    <td>&#36;{$row['product_price']}</td>
    <td>
    {$value}
    </td>
    <td>&#36;{$sub}</td>
    <td>
        <a class="btn btn-warning" href="../resources/cart.php?remove={$row['product_id']}"><span class="bi bi-dash-circle"></span></a>     
    <td>
        <a class="btn btn-success" href="../resources/cart.php?add={$row['product_id']}"><span class="bi bi-plus"></span>
    </td>
    <td>
    <a class="btn btn-danger" href="../resources/cart.php?delete={$row['product_id']}"><span class="bi bi-trash"></span><td>
    </td?
    </td>
</button>
</tr>
<input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
<input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
<input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
<input type="hidden" name="quantity_{$quantity}" value="{$value}">


DELIMETER;
echo $product; 
$item_name++;
$item_number++;
$amount++;
$quantity++;

    }
    $_SESSION['item_total'] = $total += $sub;
    $_SESSION['item_quantity'] = $item_quantity;

 }
}

}

}
// Button would not disappear, so added a check of item is greater than zero
function show_paypal(){
if (isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >=1) {
$paypayBtn = <<<DELIMETER
<button class="btn btn-primary w-100">
Proceed to Payment
</button>
DELIMETER;
return $paypayBtn;        
}
else{
    return ''; // no products
}

}

function process_transaction(){


if (isset($_GET['tx'])) {
    
    $amount      = escape_string($_GET['amt']);
    $currency    = escape_string($_GET['cc']);
    $transaction = escape_string($_GET['tx']);
    $status      = escape_string($_GET['st']);

//----------------------------Prevents Duplicate when browser refreshes
    $transaction = escape_string($_GET['tx']);

    // 🔥 Check if transaction already exists
    $check = query("SELECT * FROM orders WHERE order_transaction = '{$transaction}'");
    confirm($check);

    if (mysqli_num_rows($check) > 0) {
        return; // STOP — already processed
    }
//-----------------------------------------------------
    $total = 0;
    $item_quantity = 0;

    foreach ($_SESSION as $name => $value) {

        if ($value > 0 && substr($name,0,8) == 'product_') {

            $length = strlen($name) - 8;    
            $id = substr($name,8, $length);

                $send_order = query("INSERT INTO orders 
                (order_amount, order_transaction, order_currency, order_status) 
                VALUES ('{$amount}', '{$transaction}', '{$currency}', '{$status}')");
                $last_id = last_id();
                confirm($send_order);

            $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id));
            confirm($query);

            while ($row = fetch_array($query)){
                $product_price = $row["product_price"];
                $product_title = $row["product_title"];
                $sub = $row["product_price"] * $value;
                $item_quantity +=$value;

               $insert_report = query("INSERT INTO reports 
                (product_id, order_id, product_title, product_price, product_quantity) 
                VALUES('{$id}','{$last_id}','{$product_title}','{$product_price}','{$value}')");
                  
                confirm($insert_report);
            }
        }
        
      //  echo $item_quantity;
    }

} else {
    redirect('index.php');
}

}
//-----------above had bug, it doubles when output------------------------
?>
