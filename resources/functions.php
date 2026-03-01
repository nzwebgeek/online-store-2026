<?php
// helper functions
$uploads = "uploads"; // upload directory
function last_id(){
    global $conn;
    return mysqli_insert_id($conn);
}


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
    return mysqli_real_escape_string($conn, (string)$str);
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
    $product_image = display_image($row["product_image"]);
  // Herodox
$product_output = <<<DELIMETER
<div class="col-md-3">
<div class="card h-100">
<a href="item.php?id={$row['product_id']}"><img src="../resources/{$product_image}" class="card-img-top"></a>
<div class="card-body text-center">
<h6 class="card-title btn " onclick="window.location.href='item.php?id={$row['product_id']}'">{$row['product_title']}</h6>
<p class="text-warning fw-bold">&#36;{$row['product_price']}</p>
<button class="btn btn-dark btn-sm" onclick="window.location.href='../resources/cart.php?add={$row['product_id']}'">Add to Cart</button>
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
    $product_image = display_image($row["product_image"]);
  // Herodox
$category_product_output = <<<DELIMETER
 <!-- Product 1 -->
<div class="col-md-4">
<div class="card h-100">
<img src="../resources/{$product_image}" class="card-img-top" alt="{$row['product_title']}">
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
$product_image = display_image($row["product_image"]);
  // Herodox
$category_product_output = <<<DELIMETER
 <!-- Product 1 -->
<div class="col-md-4">
<div class="card h-100">
<img src="../resources/{$product_image}" class="card-img-top" alt="{$row['product_title']}">
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
            $_SESSION["username"] = $username;
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
function display_orders(){
$query = query("SELECT * FROM orders");
confirm($query);    

while ($row = fetch_array($query)) {
$orders = <<<DELIMETER
 <tr>
    <td>{$row['order_id']}</td>
    <td>{$row['order_amount']}</td>
    <td>{$row['order_transaction']}</td>
    <td>{$row['order_currency']}</td>
    <td>{$row['order_status']}</td>

    <td><span class="badge bg-success">Completed</span></td>
    <td>
        <button class="btn btn-sm btn-danger" onclick="window.location.href='../../resources/templates/back/delete_order.php?id={$row['order_id']}'">Delete</button>
        <button class="btn btn-sm btn-primary" onclick="window.location.href='https://www.example.com'">Cancel</button>
    </td>
</tr>
DELIMETER;
echo $orders;
}
}

/**************Admin Products**********************************/
function display_image($picture){
    global $uploads;
    return $uploads . DS . $picture;
}
function get_products_in_admin(){
    // Get
  $query =  query("SELECT * FROM products");
  confirm($query);
  // Fetch from table row
  while ($row=fetch_array($query)) {
$category = show_product_category_title($row["product_category_id"]);
$product_image=display_image($row['product_image']);  
// Herodox
$product_output = <<<DELIMETER
 <tr>
    <td>{$row['product_id']}</td>
    <td>
    {$row['product_title']}<br>
    <a href="index.php?edit_product&id={$row['product_id']}"><img src="../../resources/{$product_image}" width="320px" height="150px" alt="" class="img-thumbnail mt-2"></a>
    </td>
    <td>{$category}</td>
    <td>&#36;{$row['product_price']}</td>
    <td>{$row['product_quantity']}</td>
    <td><button class="btn btn-sm btn-danger" onclick="window.location.href='../../resources/templates/back/delete_product.php?id={$row['product_id']}'">Delete</button></td>
</tr>
DELIMETER;
echo $product_output;
  }
}


function show_product_category_title($product_category_id){
    $category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}'");
    confirm($category_query);
    while ($category_row = fetch_array($category_query)) {
        return $category_row["cat_title"];
    }
}

/******************Add Products In Admin**********************/

function add_product(){

    if (isset($_POST['publish'])) {

        // Safe handling with fallback values
        $product_title       = escape_string($_POST['product_title'] ?? '');
        $product_category_id = (int) ($_POST['product_category_id'] ?? 0);
        $product_price       = (float) ($_POST['product_price'] ?? 0);
        $product_quantity    = (int) ($_POST['product_quantity'] ?? 0);
        $product_description = escape_string($_POST['product_description'] ?? '');
        $short_desc          = escape_string($_POST['short_desc'] ?? '');

        // Image handling safely
        $product_image       = $_FILES['file']['name'] ?? '';
        $image_temp_location = $_FILES['file']['tmp_name'] ?? '';

        if(!empty($product_image)){
            move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);
        }

        // Validate required fields
        if($product_title == '' || $product_category_id == 0){
            set_message("Title and Category are required.");
            redirect("index.php?add_product");
            return;
        }

        $query = query("INSERT INTO products
            (product_title, product_category_id, product_price, product_quantity, product_description, short_desc, product_image)
            VALUES
            ('{$product_title}', {$product_category_id}, {$product_price}, {$product_quantity}, '{$product_description}', '{$short_desc}', '{$product_image}')
        ");

        confirm($query);

        $last_id = last_id();

        set_message("Product {$last_id} successfully added");

        redirect("index.php?products");
    }
}

function show_categories_add_product_page(){
$query = query("SELECT * FROM categories");
confirm($query);

while($row = fetch_array($query)){
    echo "<option value='{$row['cat_id']}'>{$row['cat_title']}</option>";
}
}
/************Updating Products****************/
function update_product(){

    if (isset($_POST['update'])) {

        // Safe handling with fallback values
        $product_title       = escape_string($_POST['product_title'] ?? '');
        $product_category_id = (int) ($_POST['product_category_id'] ?? 0);
        $product_price       = (float) ($_POST['product_price'] ?? 0);
        $product_quantity    = (int) ($_POST['product_quantity'] ?? 0);
        $product_description = escape_string($_POST['product_description'] ?? '');
        $short_desc          = escape_string($_POST['short_desc'] ?? '');

        // Image handling safely
        $product_image       = $_FILES['file']['name'] ?? '';
        $image_temp_location = $_FILES['file']['tmp_name'] ?? '';

        if(!empty($product_image)){
            move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);
        }

        // Validate required fields
        if($product_title == '' || $product_category_id == 0){
            set_message("Title and Category are required.");
            redirect("index.php?add_product");
            return;
        }
        // Update
        $query = "UPDATE products SET ";
        $query .= "product_title        = '{$product_title }'       ,";
        $query .= "product_category_id  = '{$product_category_id }' ,";
        $query .= "product_price        = '{$product_price }'       ,";
        $query .= "product_quantity     = '{$product_quantity }'    ,";
        $query .= "product_description  = '{$product_description }' ,";
        $query .= "short_desc           = '{$short_desc }'           ";        
        $query .= "WHERE product_id" . escape_string($_GET['id']);

        confirm($query);

        $last_id = last_id();

        set_message("Product added");

        redirect("index.php?products");
    }
}
