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
            <th scope="col">Customer</th>
            <th scope="col">Date</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ORD-1001</td>
            <td>John Doe</td>
            <td>2026-02-28</td>
            <td>$120.00</td>
            <td><span class="badge bg-success">Completed</span></td>
            <td>
              <button class="btn btn-sm btn-primary">View</button>
              <button class="btn btn-sm btn-danger">Cancel</button>
            </td>
          </tr>
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>