<?php include "header.php"; ?>


<div class="container">
 <div class="row">
  <div class="col-sm-6 col-xs-6">
    <h1>Add New Location Form</h1>
  </div>
  <div class="col-sm-6 col-xs-6">
  	<a href="dashboard.php"><button type="button" class="btn btn-success pull-right addNewBtn">Home</button></a>
  	<a href="location.php"><button type="button" class="btn btn-success pull-right addNewBtn">Back</button></a>

  </div> 
 </div>



 <!-- New location Form  -->
 <div class="formBody">
 <form action='addnewlocation.php' method="POST">	
 <div class="row">
 	<div class="col-sm-3">
  		<div class="form-group">
	        <label for="name">name</label>
	        <input type="text" class="form-control" id="name" placeholder="Enter firstname" name="fname" required>
	     </div>
  	</div>
  	
  	<div class="col-sm-4">
  		<label for="Active">active</label><br>
  		<label class="radio-inline">
	      <input type="radio" name="active" value='1' checked>Yes
	    </label>
	    <label class="radio-inline">
	      <input type="radio" value='0' name="active">No
	    </label>
	</div>
</div>
<hr>


 <div class="row">
 	<div class="col-sm-12">
 		 <button type="submit" class="btn btn-success" name="submit_form">Submit</button>
 		 <button type="reset" class="btn btn-warning" name="">Reset</button>
 	</div>
 </div>

 </form>
</div>
</div>


<!-- add data into database -->
<?php 

 if(isset($_POST['submit_form'])){

 		$name = (!empty($_POST['fname'])) ? $_POST['fname'] : '';
 		$active  = (!empty($_POST['active'])) ? $_POST['active'] : '';
 		// echo $active;

 		$insert = "INSERT INTO locations (name, active) VALUES ('$name','$active')";
 		if(mysqli_query($conn, $insert)){  
		    $msg = "Data stored Successfully";
		    header("Location:location.php");
		  }
 }
?>                                                                               
