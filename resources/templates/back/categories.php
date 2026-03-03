<?php add_category(); ?>
    <!-- Page Content -->
    <div class="container-fluid p-4">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow-sm mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Product Categories</span>
            </div>
        </nav>

        <div class="row g-4">
            
            <!-- Add Category Form -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="bg-success"><?php get_message();?></h4><br>
                        <h5 class="card-title mb-3">Add Category</h5>
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="cat_title" class="form-control" placeholder="Enter category title" required>
                            </div>
                            <button type="submit" name="add_category" class="btn btn-primary w-100">
                                Add Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Categories Table -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Existing Categories</h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php show_categories_in_admin(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


