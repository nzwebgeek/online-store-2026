<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
 
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <?php get_message(); ?>
          <h4 class="mb-3">Contact Form</h4>
          <form method="post" id="contactForm" name="sendMessage">
          <?php send_message(); ?>  
          <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter your Name" required>
              <p class="help-block text-danger"></p>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your Email" required>
              <p class="help-block text-danger"></p>
            </div>
             <div class="mb-3">
              <label class="form-label">Subject</label>
              <input type="text" class="form-control" name="subject" placeholder="Enter Royal Subjects" required>
              <p class="help-block text-danger"></p>
            </div>
             <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" name="message" id="message" placeholder="place a message here"></textarea>
              <p class="help-block text-danger"></p>
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
