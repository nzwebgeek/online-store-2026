<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      overflow-x: hidden;
    }
    .sidebar {
      min-height: 100vh;
      background: #212529;
    }
    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
      padding: 10px 15px;
      display: block;
    }
    .sidebar a:hover {
      background: #343a40;
      color: #fff;
    }
    .card-icon {
      font-size: 2rem;
      opacity: 0.7;
    }
  </style>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="../index.php">Admin Dashboard</a>
  <div class="ms-auto text-white">
    <i class="bi bi-person-circle"></i> Admin
  </div>
</nav>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <nav class="col-md-2 d-none d-md-block sidebar py-4">
      <a href="#"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
      <a href="#"><i class="bi bi-people me-2"></i> Users</a>
      <a href="#"><i class="bi bi-box-seam me-2"></i> Products</a>
      <a href="#"><i class="bi bi-graph-up me-2"></i> Reports</a>
      <a href="#"><i class="bi bi-gear me-2"></i> Settings</a>
    </nav>

    <!-- Main Content -->
    <main class="col-md-10 ms-sm-auto px-md-4 py-4">

      <h2 class="mb-4">Dashboard Overview</h2>

      <!-- KPI Cards -->
      <div class="row g-4 mb-4">
        <div class="col-md-3">
          <div class="card text-white bg-primary">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h6>Total Users</h6>
                <h3>1,245</h3>
              </div>
              <i class="bi bi-people card-icon"></i>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-white bg-success">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h6>Sales</h6>
                <h3>$34,000</h3>
              </div>
              <i class="bi bi-currency-dollar card-icon"></i>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-white bg-warning">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h6>Orders</h6>
                <h3>320</h3>
              </div>
              <i class="bi bi-bag card-icon"></i>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-white bg-danger">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h6>Pending Issues</h6>
                <h3>8</h3>
              </div>
              <i class="bi bi-exclamation-circle card-icon"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Chart -->
      <div class="card mb-4">
        <div class="card-header">
          Monthly Revenue
        </div>
        <div class="card-body">
          <canvas id="revenueChart"></canvas>
        </div>
      </div>

      <!-- Table -->
      <div class="card">
        <div class="card-header">
          Recent Users
        </div>
        <div class="card-body table-responsive">
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td><span class="badge bg-success">Active</span></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td><span class="badge bg-warning">Pending</span></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Robert Brown</td>
                <td>robert@example.com</td>
                <td><span class="badge bg-danger">Blocked</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('revenueChart');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [{
        label: 'Revenue',
        data: [12000, 19000, 15000, 22000, 18000, 25000],
        borderColor: '#0d6efd',
        backgroundColor: 'rgba(13,110,253,0.1)',
        fill: true,
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: true
        }
      }
    }
  });
</script>

</body>
</html>