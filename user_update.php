<?php include "header.php"; ?>
 <?php 

  $userId = $_GET['id'];

  $query = "SELECT * FROM users where id = ".$userId."";
  $result = $conn->query($query);

  $row=$result->fetch_assoc();

 ?>
<div class="container">
 <div class="row">
  <div class="col-sm-6 col-xs-6">
    <h1>Update User Form</h1>
  </div>
  <div class="col-sm-6 col-xs-6 text-right">

<?php
  $userId = $_GET['id'];
  $query = "SELECT * FROM users where id = ".$userId."";
?>

    <a href="dashboard.php" >
      <button type="button" class="btn btn-success addNewBtn" style="margin-right: 5px;">Home</button>
    </a>

    <a href="viewuser.php?id=<?php echo $row["id"]; ?>">
      <button type="button" class="btn btn-success addNewBtn">View</button>
    </a>

  </div> 
 </div>


 <?php 

 if(isset($_POST['submit_form'])){

      // print_r($_POST);exit;

  $firstName = (!empty($_POST['fname'])) ? $_POST['fname'] : '';
  $lastName = (!empty($_POST['lname'])) ? $_POST['lname'] : '';
  $email = (!empty($_POST['email'])) ? $_POST['email'] : '';
  $Contact = (!empty($_POST['Contact'])) ? $_POST['Contact'] : '';
  $dateofbirth = (!empty($_POST['dateofbirth'])) ? $_POST['dateofbirth'] : '';
  $location_id = (!empty($_POST['location_id'])) ? $_POST['location_id'] : '';
  $active  = (!empty($_POST['active'])) ? $_POST['active'] : '';



    $update = "UPDATE users SET first_name='".$firstName."', last_name='".$lastName."', email='".$email."', contact_number='".$Contact."', dob='".$dateofbirth."', location_id='".$location_id."', active='".$active."' WHERE id ='".$userId."'";

    if(mysqli_query($conn, $update)){  
        $msg = "Data stored Successfully";

        header("Location:userlis.php");
    exit();

      }

 }

 ?>

 <!-- New user Form  -->
 <div class="formBody">
 <form action='#' method="POST"> 
 <div class="row">
  <div class="col-sm-3">
      <div class="form-group">
          <label for="Firstname">Firstname</label>
          <input type="text" class="form-control" id="Firstname" placeholder="Enter firstname" name="fname" value="<?php echo $row["first_name"];?>" required>
       </div>
    </div>
    <div class="col-sm-3">
       <div class="form-group">
          <label for="Lastname">Lastname</label>
          <input type="text" class="form-control" id="Lastname" placeholder="Enter lastname" name="lname" value="<?php echo $row["last_name"];?>" required>
        </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group">
          <label for="Contact">Contact</label>
          <input type="number" class="form-control" id="Contact" placeholder="Enter contact" name="Contact" value="<?php echo $row["contact_number"];?>" required>
      </div>
    </div>
    <div class="row">
    <div class="col-sm-3">
      <div class="form-group">
          <label for="Dob">Date of Birth:</label>
          <input type="date" class="form-control" id="Date" placeholder="Enter DoB" name="dateofbirth" value="<?php echo $row["dob"];?>" required>
      </div>
    </div>
  </div>
  <hr>
     <div class="col-sm-3">
      <?php 
        $query = "SELECT * FROM locations WHERE active = 1";
        $result = $conn->query($query);

      ?>
      <div class="form-group">
        <label for="city">Choose a Location:</label>
          <select name="location_id" id="location_id" class="form-control">
            <option value="">Select</option>

            <!-- dynamic -->
            <?php  while ($location = $result->fetch_assoc()) {

                $selected = ($row["location_id"] == $location['id']) ? 'selected' : '';
            
            ?>
              <option value="<?php echo ucfirst($location['id']);?>" <?php echo $selected;?>><?php echo ucfirst($location['name']);?></option>
            <?php } ?>

          </select>
      </div>
    </div>
    
<div class="col-sm-3">
    <div class="form-group">
        <label for="uploading">Upload image</label>
        <input type="file" class="form-control-file" name="fileToUpload" id="uploadimage">
    </div>
    
    <!-- Display the image name -->
    <div class="form-group">
        <label for="imageName">Image Name</label>
        <div id="imageName"><?php echo $row['img_file']; ?></div>
    </div>
</div>

    <div class="col-sm-3">
      <?php 

        $checked = ($row["active"] == 1) ? 'checked' : '';  
        $unchecked = ($row["active"] != 1) ? 'checked' : '';

      ?>

      <label for="Active">Active</label><br>
      <label class="radio-inline">
        <input type="radio" name="active" value='1' <?php echo $checked;?>>Yes
      </label>
      <label class="radio-inline">
        <input type="radio" value='0' name="active" <?php echo $unchecked;?>>No
      </label>
  </div>
</div>
<hr>

                   <!-- username -->
<div class="container">
<div class="row">
<div class="col-sm-4">
<label for="username">username</label>
<input type="email" class="form-control" value="<?php echo $row["email"];?>" id="email" placeholder="Enter email / username" name="email" required>
</div>

<!-- password -->

<div class="col-sm-4">
<div class="form-group">
<label for="password">password</label>

<input type="password" class="form-control" value="<?php echo $row["password"]?>" id="password" placeholder="Enter password" name="password" required>

</div>
</div>
</div>
</div>
</div>
<hr>
 <div class="row">
  <div class="col-sm-12">
     <button type="submit" class="btn btn-success" name="submit_form">Submit</button>
  </div>
 </div>

 </form>
</div>
</div>

<script>
$(document).ready(function(){
    // Add an event listener to the file input
    $("#uploadimage").change(function(){
        // Update the content of the div with the selected file name
        var fileName = $(this).val().split("\\").pop(); // Extract only the file name
        $("#imageName").text(fileName);
    });
});
</script>



   