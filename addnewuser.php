<?php include "header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-xs-6">
            <h1>Add New User Form</h1>
        </div>
        <div class="col-sm-6 col-xs-6">
            <a href="dashboard.php"><button type="button" class="btn btn-success pull-right addNewBtn">Home</button></a>
            <a href="userlis.php"><button type="button" class="btn btn-success pull-right addNewBtn">Back</button></a>
        </div>
    </div>

    <!-- New user Form  -->
    <?php
if (isset($_POST['submit_form'])) {
    $statusMsg = '';
    // print_r($_FILES); exit;
    $target_dir = "assets/Users/";

    $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    
    $contact_number = (!empty($_POST['contact_number'])) ? $_POST['contact_number'] : '';
    $dob = (!empty($_POST['dob'])) ? $_POST['dob'] : '';
    $location_id = (!empty($_POST['location_id'])) ? $_POST['location_id'] : '';
    $active = (!empty($_POST['active'])) ? $_POST['active'] : '';

    $email = (!empty($_POST['email'])) ? $_POST['email'] : '';
    $password = (!empty($_POST['password'])) ? $_POST['password'] : '';

    $salt = bin2hex(random_bytes(16));

    $hashed_password = password_hash($password . $salt, PASSWORD_DEFAULT);
    

    $fileName = basename($_FILES["fileToUpload"]["name"]); 
    $targetFilePath = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 

    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif');

    if(in_array($fileType, $allowTypes)){
        // Upload file to server 
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)){
           
            $insert = "INSERT INTO users (first_name, last_name, email, contact_number, dob,location_id,active,img_file,password) VALUES ('$first_name', '$last_name','$email','$contact_number','$dob', '$location_id','$active', '$fileName','$hashed_password')";

            if(mysqli_query($conn, $insert)){
                echo "<h1>data stored in a database successfully.</h1>";     
                $msg = "Data stored Successfully";
                $_SESSION['msg'] = $msg;
                header("Location:userlis.php");
            } else{
                header("Location:index.php");
            }
        } else{
            $statusMsg = "Sorry, there was an error uploading your file."; 
        }
    } else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
    } 

    echo $statusMsg; 
}
?>
    <div class="formBody">
        <form action='addnewuser.php' enctype="multipart/form-data" method="POST">	
            <div class="row">
                <!-- Form fields -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Firstname">Firstname</label>
                        <input type="text" class="form-control" id="Firstname" placeholder="Enter firstname" name="first_name" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Lastname">Lastname</label>
                        <input type="text" class="form-control" id="Lastname" placeholder="Enter lastname" name="last_name" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Contact">Contact</label>
                        <input type="number" class="form-control" id="Contact" placeholder="Enter contact" name="contact_number" required>
                    </div>
                </div>
                <div class="row">
                <!-- Form fields -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="Date" placeholder="Enter DoB" name="dob" required>
                    </div>
                </div>
                
                
            </div>
            <hr>
               <!--  <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" require>
                    </div>
                </div> -->
            

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
                            <?php  while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo ucfirst($row['id']); ?>"><?php echo ucfirst($row['name']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="uploading">Upload image</label>
                        <input type="file" class="form-control-file" name= "fileToUpload" id="uploadimage">
                        <span id="uploadimage"><?php echo (!empty($_GET['file'])) ? $_GET['file'] : ''; ?></span>
                    </div>	
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Active">Active</label>
                        <label class="radio-inline">
                            <input type="radio" name="active" value='1' checked>Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value='0' name="active">No
                        </label>
                    </div>	
                </div>
            </div>
            <hr>

            <!-- username -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="username">Email / Username</label>
                        <input type="email" class="form-control" id="username" placeholder="Enter email / username" name="email" required>
                    </div>
                
                    <!-- password -->
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                    </div>
                </div>
            </div>
        </div>

                    


            <hr>

            <div class="row">
                <!-- Form submission buttons -->
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success" name="submit_form">Submit</button>
                    <button type="reset" class="btn btn-warning" name="">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Database Query Section -->

