<?php include "header.php"?>

  <div class="container">
    <div class="row">
      <div class="col-sm-3"></div>

      <div class="col-sm-6">
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
              $email = $_POST["email"];
              $password = $_POST["password"];
            }
              
          ?>
        <div class="row">
          <img src="assets\img\logo.jpg" class="img-responsive">
        </div>
      
        <div class="form-body">
        <h4 class="heading">Login Form</h4>  



        <!-- FORM BODY -->

        <form action='#' enctype="multipart/form-data" method="POST">
        <div class="form-group">
               <label for="email">Email address:</label>
               <input type="email" class="form-control" placeholder="Enter email / username" name="email" required>
        </div>
                <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                </div>

        <div class="row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-warning" style="width:100%">Login</button>
        </div> 


        <div class="col-sm-6"></div>
        <div class="col-sm-3">
            <a href="signup.php"><button type="button" class="btn btn-info" style="width:100%">Signup</button></a>     
        </div>
    </div>
</form>
      

        </div>
        </div>
      </div>
    
    </div>

<?php include "footer.php"?>