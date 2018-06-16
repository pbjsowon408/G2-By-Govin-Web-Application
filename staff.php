<?php
require 'staff/db.php';
$sql = 'SELECT * FROM staff';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Staff List</h2>
    </div>
	<br><br>
    <div class="card-body">
      <table class="table table-bordered">
        <tr align="left" >

          <th width="6%">Name</th>
          <th width="8%">Email</th>
          <th width="4%">Contact</th>
          <th width="5%">DOB</th>
          <th width="5%">Action</th>
		  <th width="35%"></th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->name; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->contact; ?></td>
            <td><?= $person->dob; ?></td>
            <td>
              <a href="staff/edit.php?id=<?= $person->id ?>" class="btn btn-info"><b>Edit</b></a>&nbsp&nbsp&nbsp&nbsp
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="staff/delete.php?id=<?= $person->id ?>" class='btn btn-danger'><b>Delete</b></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
