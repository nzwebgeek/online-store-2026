<?php require_once("../../resources/config.php"); ?>
<?php add_user(); ?>
<?php get_message(); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New User</h4>
                </div>
                <div class="card-body">

                    <form method="post"  enctype="multipart/form-data">
                        
                        <!-- Photo Upload -->
                    
                        <div class="text-center mb-4">
                            <img id="photoPreview" src="https://via.placeholder.com/150"
                                 class="rounded-circle img-thumbnail mb-2"
                                 width="150" height="150" alt="User Photo">
                            
                            <div>
                                <label class="btn btn-outline-primary btn-sm">
                                    Upload Photo
                                    <input type="file" class="d-none" name="file" id="photoInput" accept="image/*">
                                </label>
                            </div>
                        </div>
                   
                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"class="form-control" placeholder="Enter email" required>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>

                        <!-- Role -->
                         <!--
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select">
                                <option selected disabled>Select role</option>
                                <option>Admin</option>
                                <option>User</option>
                                <option>Manager</option>
                            </select>
                        </div>
                        -->
                        <!-- Submit -->
                        <div class="d-grid form-group">
                            <button type="submit" name="add_user" class="btn btn-primary">
                                Save User
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
