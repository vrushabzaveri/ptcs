<?php include "header.php"?>

<div class="container-fluid">

    <div class="row">

        <div class="col-sm-6">
            <b><h1>User Listings</h1></b>
            
        </div> 

        <div class="col-sm-6 ">
            <a href="addnewuser.php"><button type="button" class="btn btn-success pull-right addNewBtn">Add New User</button></a>
            <a href="dashboard.php"><button type="button" class="btn btn-success pull-right addNewBtn">Home</button></a>
        </div>
    </div>

    <!-- User Table -->
    
    <div class="row">
        <div class="col-sm-12">

            <?php
                  $sqlQuery = "SELECT * FROM users";
                  $result = $conn->query($sqlQuery);
                  if ($result->num_rows > 0) {
            ?> 

            <table class="table table-bordered" style="border-color:black;">
                <thead>
                    <tr>
                        <th>SR</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Location</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sr = 0;
                    while ($row = $result->fetch_assoc()) {
                        $sr++;

                        $imageFile = "assets/Users/".$row['img_file'];
                        //print_r($imageFile);die;    
                        $name = $row["first_name"] . ' ' . $row["last_name"] ;
                        

                    ?> 
                    <tr>
                        <td><?php echo $sr; ?></td>
                        <td><img src="<?php echo $imageFile ?>"  class="imageicon"></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $row["email"];?></td>
                        <td><?php echo $row["contact_number"]; ?></td>
                        <td><?php echo $row["dob"]; ?></td> 


                        
                        <td>
                          <?php 

                            $locationId = $row["location_id"];
                            
                            $querylocation = "SELECT * FROM  locations WHERE id = ".$locationId."";

                            
                            // print_r($querylocation);

                            $result1 = $conn->query($querylocation);
                            $location = $result1->fetch_assoc();

                            // print_r($location);

                            echo (!empty($location['name'])) ? $location['name'] : '---';

                        ; ?>
                        </td>

                        <td><?php echo $row["active"]; ?></td>
                        
                        <td>
                            <!-- View -->
                            <a href="viewuser.php?id=<?php echo $row["id"]; ?>"><input type="button" value="View" class="btn btn-success btn-sm"></a> 
                            <!-- Update -->
                            <a href="user_update.php?id=<?php echo $row["id"]; ?>"><input type="button" value="Edit" class="btn btn-info btn-sm"></a>
                        </td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { echo 'Empty Table!'; }?>
        </div>
    </div>
</div>  
<?php
  mysqli_close($conn);
  
  include "footer.php"

 ?>
