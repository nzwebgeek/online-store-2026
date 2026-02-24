<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Shop by Category</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card category-card">
          <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" class="card-img-top">
          <div class="card-body text-center">
            <h5 class="card-title">Watches</h5>
                  <?php 
                  // create query
                    $query = "SELECT * FROM categories";
                    // send in query & fetch
                    $send_query = mysqli_query($conn, $query);

                    if(!$send_query){
                      die("Query Failed" . mysqli_error($conn));
                    }
                // read query
                while ($row = mysqli_fetch_assoc($send_query)) {
                           echo  "<a href='#' class='btn btn-outline-dark btn-sm'>{$row['cat_title']}</a>";
                }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>