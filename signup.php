<?php include "header.php"; ?>

<form action="index.php" method="POST" enctype="multipart/form-data">
    <div class="col-sm-offset-3 col-sm-6">

    <div class="row">

        <div class="col-sm-6">
          <h1 class="text-left">Registration Form</h1>
        </div>

        <div class="col-sm-6 text-right">
          <a href="index.php"><button type="button" class="btn btn-info btn-md" float-right style="margin-top: 35px">Home </button></a>
        </div>

    </div>  
    <div class="formBody">
    <div class="form-group">
        <label for="Firstname">Firstname</label>
        <input type="firstname" class="form-control" id="Firstname" placeholder="Enter firstname" name="Name" required>
        <span id="Firstname"><?php echo (!empty($_GET['Name'])) ? $_GET['Name'] : ''; ?></span>
      </div>  

        
      <div class="form-group">
        <label for="Lastname">Lastname</label>
        <input type="lastname" class="form-control" id="Lastname" placeholder="Enter lastname" name="Lastname" required>
    <span id="Lastname"><?php echo (!empty($_GET['Lastname'])) ? $_GET['Lastname'] : ''; ?></span>
      </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" require>
    <span id="exampleInputEmail1"><?php echo (!empty($_GET['email'])) ? $_GET['email'] : ''; ?></span>
  </div>

    <div class="form-group">
    <label for="Contact">Contact</label>
        <input type="contact" class="form-control" id="Contact" placeholder="Enter contact" name="Contact" required>
        <span id="Contact"><?php echo (!empty($_GET['Contact'])) ? $_GET['Contact'] : ''; ?></span>
  </div>

    <div class="form-group">
    <label for="Password">Password</label>
        <input type="contact" class="form-control" id="Password" placeholder="Enter password" name="Password" required>
        <span id="Contact"><?php echo (!empty($_GET['Password'])) ? $_GET['Passwrd'] : ''; ?></span>
  </div>

    
 
  <button type="submit" class="btn btn-success">Submit</button>
 </div>
</form>

</div>
</div>
</body>

  

        

      



