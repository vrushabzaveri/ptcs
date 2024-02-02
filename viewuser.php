<?php
include("header.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = $userId";
    $result = $conn->query($query);
}



if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $imagePath = "assets/Users/".$user['img_file'];
}
?>


<body>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <h1>View User Form</h1>
                    </div>
                    <div class="col-sm-6 col-xs-6 text-right">

                        <a href="user_update.php?id=<?php echo $user["id"]; ?>">
                          <button type="button" class="btn btn-success btn-md" float-right style="margin-top: 15px">Edit</button>
                        </a>
                            

                          <a href="dashboard.php"><button type="button" class="btn btn-success btn-md" float-right style="margin-top: 15px">Home</button>
                        </a>
                    </div>

                    <div class="col-sm-12">
                        <table class="table table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <th class="success">First name</th>
                                    <td><?php echo $user['first_name']; ?></td>
                                </tr>
                                <tr>
                                    <th class="success">Last name</th>
                                    <td><?php echo $user['last_name']; ?></td>
                                </tr>

                                <tr>
                                    <th class="success">Email</th>
                                    <td><?php echo $user['email']; ?></td>
                                </tr>

                                <tr>
                                    <th class="success">Contact</th>
                                    <td><?php echo $user['contact_number']; ?></td>
                                </tr>

                                <tr>
                                    <th class="success">Date of Birth</th>
                                    <td><?php echo $user['dob']; ?></td>
                                </tr>

                                <tr>
                                    <th class="success">City</th>
                                    <td>
                                                    <?php 
                                                        $locationId = $user["location_id"];
                                                        $querylocation = "SELECT * FROM locations WHERE id = $locationId";
                                                        $result1 = $conn->query($querylocation);

                                                       
                                                            $location = $result1->fetch_assoc();
                                                           echo (!empty($location['name'])) ? $location['name'] : '---';
                                                       
                                                    ?>                                                        
                                </td>
                                </tr>

                                <tr>
                                    <th class="success">Active</th>
                                    <td><?php echo ($user['active'] == 1) ? 'Yes' : 'No'; ?></td>
                                </tr>

                                <tr>
                                    <th class="success">Username</th>
                                    <td><?php echo $user['username'] ?></td>
                                </tr>
                                
                                <tr>
                                    <th class="success">Password</th>
                                    <td><?php echo $user['password'] ?></td>
                                </tr>


                                <tr>
                                    <th class="success">Image</th>
                                    <td><img src="<?php echo $imagePath; ?>" class="imagefile"></td>

                    
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </body>
