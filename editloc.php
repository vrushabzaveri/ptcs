<?php include "header.php"; ?>
 <?php 

  $locationid = $_GET['id'];
  $query = "SELECT * FROM locations where id = ".$locationid."";
  $result = $conn->query($query);
  $row=$result->fetch_assoc();

?>
<div class="container">
 <div class="row">
  <div class="col-sm-6 col-xs-6">
    <h1>Update User Form</h1>
  </div>
  <div class="col-sm-6 col-xs-6 text-right">



    <a href="dashboard.php">
      <button type="button" class="btn btn-success addNewBtn" style="margin-right: 5px;">Home</button>
    </a>

    <a href="viewuser.php?id=<?php echo $row["id"]; ?>">
      <button type="button" class="btn btn-success addNewBtn">View</button>
    </a>

  </div> 
 </div>




 <!-- New user Form  -->
 <div class="formBody">
 <form action='' method="POST"> 
 <div class="row">
  <div class="col-sm-3">
      <div class="form-group">
          <label for="name">name</label>
          <input type="text" class="form-control" id="name" placeholder="Enter firstname" name="fname" value="<?php echo $row["name"];?>" required>
       </div>
    </div>
    <div class="col-sm-4">
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
      <div class="row">
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-12">
     <a href="viewloc.php"><button type="submit" class="btn btn-success" name="submit_form">Submit</button></a>
  </div>
 </div>

 </form>
</div>
</div>

 <?php 

 if(isset($_POST['submit_form'])){

      
  $name = (!empty($_POST['fname'])) ? $_POST['fname'] : '';
  $active  = (!empty($_POST['active'])) ? $_POST['active'] : '';

  $update = "UPDATE locations SET name='".$name."', active='".$active."' WHERE id ='".$locationid."'";

    if(mysqli_query($conn, $update)){  
        $msg = "Data stored Successfully";

        header("Location:location.php");
    exit();

      }
 }
 ?>




   