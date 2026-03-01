<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
  <!-- Page Header -->
  <div class="d-flex justify-content-between align-items-center py-3 mb-3 border-bottom">
    <h1 class="h2">Orders</h1>
  </div>
  <div class="d-flex justify-content-between align-items-center py-3 mb-3 border-bottom">
  <h5 class="text-success position-relative"><?php  get_message(); ?></h5>
  </div>


  <!-- Orders Table -->
  <div class="card mb-4">
    <div class="card-header">
      Recent Orders
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th scope="col">#Order ID</th>
            <th scope="col">Amount</th>
            <th scope="col">Transaction</th>
            <th scope="col">Currency</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php display_orders(); ?>
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>