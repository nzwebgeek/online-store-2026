<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
          <h3 class="mb-4 text-center">Edit User</h3>

          <form method="post" enctype="multipart/form-data">
            <div class="row g-3">

              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="firstName" value="John" required>
                  <label for="firstName">First Name</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="lastName" value="Doe" required>
                  <label for="lastName">Last Name</label>
                </div>
              </div>

              <div class="col-12">
                <div class="form-floating">
                  <input type="email" class="form-control" id="email" value="john@example.com" required>
                  <label for="email">Email address</label>
                </div>
              </div>

              <div class="col-12">
                <select class="form-select py-3" required>
                  <option>Admin</option>
                  <option selected>User</option>
                  <option>Manager</option>
                </select>
              </div>

              <div class="col-12">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="activeStatus" checked>
                  <label class="form-check-label" for="activeStatus">Active User</label>
                </div>
              </div>

              <div class="col-12 d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-outline-secondary rounded-3">
                  Cancel
                </button>

                <button type="submit" class="btn btn-success rounded-3">
                  Update User
                </button>
              </div>

            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
