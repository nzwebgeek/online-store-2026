<?php
// helper functions
function set_message( $message ) {
    if (!empty($message)) {
        $_SESSION["message"] = $message;
    }
    else{
        $message = "";
    }
}

function get_message(){

    if(isset($_SESSION["message"])){

        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
}

function redirect($location) {
    header("Location: $location ");
}

function query($sql){
    global $conn; // to bring from config into function
    return mysqli_query($conn, $sql);
}

//  confirmation that query works
function confirm($result){
    global $conn;
    if(!$result){
        die("QUERY FAILED " . mysqli_error($conn));
    }
}
// escape connection string for security
function escape_string($str){
    global $conn;
    return mysqli_real_escape_string($conn, $str);
}
// returns data from database
function fetch_array($result){
    return mysqli_fetch_array($result);
}

/*******************FRONT END FUNCTIONS************************/

// get products
function get_products(){
    // Get
  $query =  query("SELECT * FROM products");
  confirm($query);
  // Fetch from table row
  while ($row=fetch_array($query)) {
  // Herodox
$product_output = <<<DELIMETER
<div class="col-md-3">
    <div class="card h-100">
        <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" class="card-img-top"></a>
        <div class="card-body text-center">
        <h6 class="card-title btn " onclick="window.location.href='item.php?id={$row['product_id']}'">{$row['product_title']}</h6>
        <p class="text-warning fw-bold">&#36;{$row['product_price']}</p>
        <button class="btn btn-dark btn-sm" onclick="window.location.href='cart.php?add={$row['product_id']}'">Add to Cart</button>
        </div>
    </div>
</div>
DELIMETER;
echo $product_output;
  }
}

function get_categories(){
   
    // create query 
    $query = query("SELECT * FROM categories");
    // send in query & fetch
    confirm($query);
   
// read query
while ($row = fetch_array($query)) {
$categories_output = <<<DELIMETER
<a href='category.php?id={$row['cat_id']}' class='btn btn-outline-dark btn-sm'>{$row['cat_title']}</a>
DELIMETER;
echo $categories_output;
    }
           
}

function get_products_in_cat_page(){

    $query =  query("SELECT * FROM products WHERE product_category_id =" .escape_string($_GET['id']) ."");
    confirm($query);

     while ($row=fetch_array($query)) {
  // Herodox
$category_product_output = <<<DELIMETER
 <!-- Product 1 -->
<div class="col-md-4">
    <div class="card h-100">
        <img src="{$row['product_image']} class="card-img-top" alt="{$row['product_title']}">
        <div class="card-body text-center">
            <h5 class="card-title">{$row['product_title']}</h5>
            <p class="card-text">{$row['product_description']}</p>
            <a href="item.php?id={$row['product_id']}" class="btn btn-outline-primary">View Details</a>
        </div>
    </div>
</div>
DELIMETER;
echo $category_product_output;
  }

}


function get_products_in_shop_page(){

    $query =  query("SELECT * FROM products");
    confirm($query);

     while ($row=fetch_array($query)) {
  // Herodox
$category_product_output = <<<DELIMETER
 <!-- Product 1 -->
<div class="col-md-4">
    <div class="card h-100">
        <img src="{$row['product_image']} class="card-img-top" alt="{$row['product_title']}">
        <div class="card-body text-center">
            <h5 class="card-title">{$row['product_title']}</h5>
            <p class="card-text">{$row['product_description']}</p>
            <a href="item.php?id={$row['product_id']}" class="btn btn-outline-primary">View Details</a>
        </div>
    </div>
</div>
DELIMETER;
echo $category_product_output;
  }

}

function login_user(){
    if (isset($_POST['submit'])) {

        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
        confirm($query);

        // returns count of row
        if (mysqli_num_rows($query) ==0) {
            set_message("Your password or username and incorrect!");
            redirect("index.php");
        }
        else{
            set_message("Welcome to Admin {$username}");
            redirect("admin");
        }
    }
}

function send_message(){

    if (isset($_POST['submit'])) {
        $to = "mikenzwebgeek@gmail.com";
        $from_name  = escape_string($_POST['name']);
        $subject    = escape_string($_POST['subject']);
        $email      = escape_string($_POST['email']);
        $message    = escape_string($_POST['message']);

        $headers = "From: {$from_name} {$email}";

        $result = mail($to, $subject, $message, $headers);

        if (!$result) {
            set_message("Your message could not be sent!");
            redirect("contact.php");
        }
        else{
            set_message("Message Sent!");
        }
     }
}
 /**************BACK END FUNCTIONS*********************/