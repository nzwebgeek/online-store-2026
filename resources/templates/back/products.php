<!-- Page Content -->
<div id="page-content-wrapper" class="flex-grow-1 p-3">
      <h1 class="mb-4">All Products</h1>
      <h2 class="bg-success"><?php get_message(); ?></h2>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
            </tr>
          </thead>
          <tbody>
           <?php get_products_in_admin(); ?>
          </tbody>
        </table>
      </div>

    </div>
    <!-- /#page-content-wrapper -->

  