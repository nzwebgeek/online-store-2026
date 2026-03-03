

<!-- Page Content -->
    <div class="flex-grow-1 p-4">
        <!-- Success Message -->
        
        <?php get_message(); ?>

        <!-- Users Table -->
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="index.php?add_user" class="btn btn-primary">Add User</a>
                <div class="table-responsive">
                    <table class="table table-hover align-middle table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php display_users(); ?>      
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>


