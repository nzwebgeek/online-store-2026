




    <!-- Page Content -->
    <div class="flex-grow-1 p-4">

     

        <!-- Success Message -->
        <?php if(!empty($message)): ?>
            <div class="alert alert-success">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Users Table -->
        <div class="card shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>2</td>
                                <td>
                                    <img class="admin-user-thumbnail" src="https://placehold.co/62x62" alt="">
                                </td>

                                <td>
                                    Rico
                                    <div class="action-links mt-1">
                                        <a href="#" class="text-danger">Delete</a>
                                        <a href="#" class="text-primary">Edit</a>
                                    </div>
                                </td>

                                <td>Edwin</td>
                                <td>Diaz</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>


