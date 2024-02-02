<?php include "header.php"?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
          <h1>Location Listings</h1>
        </div> 

        <div class="col-sm-6 ">
         <a href="addnewlocation.php"><button type="button" class="btn btn-success pull-right addNewBtn">Add New Location</button></a>
          <a href="dashboard.php"><button type="button" class="btn btn-success pull-right addNewBtn">Home</button></a>
        </div>
    </div>


    <!-- User Table -->
    
    <div class="row">
      <div class="col-sm-12">
      <?php
            $sqlQuery = "SELECT * FROM locations";
            $result = $conn->query($sqlQuery);
            if ($result->num_rows > 0) {
      ?> 
      <table class="table table-bordered" style="border-color:black;">
        <thead>
          <tr>
              <th>Sr</th>
              <th scope="col">name</th>
              <th scope="col">active</th>
              <th scope="col">action</th>
              
          </tr>
        </thead>
        <tbody>
         <?php 
         $id = 0;
         while($row = $result->fetch_assoc()) {
          $id++;

          $name = $row["name"];

         ?> 
         <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $name; ?></td>
              <td><?php echo ($row['active'] == 1) ? 'Yes' : 'No'; ?></td>
              
            <td>

          <!-- View -->
                <a href="viewloc.php?id=<?php echo $row["id"]; ?>"><input type="button" value="View" class="btn btn-success btn-sm"></a> 

            <!-- Update -->
                <a href="editloc.php?id=<?php echo $row["id"]; ?>"><input type="button" value="Edit" class="btn btn-info btn-sm"></a>

              <!-- Delete -->
                <a href="location.php?id=<?php echo $row["id"]; ?>"><input type="button" value="Delete" class="btn btn-danger btn-sm"></a>



                </td> 
          </tr>

        <?php } ?>
        </tbody>
      </table>
      <?php }
      else{ echo 'no data'; }?>
      </div>
    </div>
  </div>  
  
 <?php include "footer.php"?>

