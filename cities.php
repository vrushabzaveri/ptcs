<?php include "header.php"?>

<table class="table table-hover">
	<h1 style="text-align: center;">TABLE</h1>
  <thead>
    <tr>
      <th scope="col">sr</th>
      <th scope="col">name</th>
      <th scope="col">city</th>
      <th scope="col">action</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>vrushab</td>
      <td>mumbai</td>
      <td><a href="viewuser.php"><button type="button" class="btn btn-success btn-sm">Edit</button></a></td>

    </tr>
    <tr>
      <th scope="row">2</th>
      <td>moin sir</td>
      <td>mumbai</td>
      <td><a href="viewuser.php"><button type="button" class="btn btn-success btn-sm">Edit</button></a></td>
    </tr>

    <tr>
      <th scope="row">3</th>
      <td>shehzad sir</td>
      <td>pune</td>
      <td>
      <a href="user_update.php"><button type="button" class="btn btn-success btn-sm">Edit</button></a></td>

    </tr>
  </tbody>
</table>






<?php include "footer.php"?>