<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
 
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card">
        <div class="card-body">

          <h4 class="mb-3">Login Form</h4>
          <h5 class="bg-warning"><?php get_message(); ?></h5>
          <form method="post">
            <?php login_user(); ?>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Enter your Username" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
              Submit
            </button>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
