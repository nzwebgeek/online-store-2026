<?php
// helper functions
function rediret($location) {
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
function fetch_arry($result){
    return mysqli_fetch_array($result);
}

// get products
function get_products(){
    // Get
  $query =  query("SELECT * FROM products");
  confirm($query);
  // Fetch from table row
  while ($row=fetch_arry($query)) {
  // Herodox
$product_output = <<<DELIMETER
<div class="col-md-3">
    <div class="card h-100">
        <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" class="card-img-top"></a>
        <div class="card-body text-center">
        <h6 class="card-title">{$row['product_title']}</h6>
        <p class="text-warning fw-bold">&#36;{$row['product_price']}</p>
        <button class="btn btn-dark btn-sm" onclick="window.location.href='item.php?id={$row['product_id']}'">Add to Cart</button>
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
while ($row = mysqli_fetch_assoc($query)) {
            echo  "<a href='#' class='btn btn-outline-dark btn-sm'>{$row['cat_title']}</a>";
}
           
}
