<?php
require 'product/db.php';
$sql = 'SELECT * FROM product WHERE type = "product" ';
$sql2 = 'SELECT * FROM product WHERE type = "service" ';
$statement = $connection->prepare($sql);
$statement2 = $connection->prepare($sql2);
$statement->execute();
$statement2->execute();
$product = $statement->fetchAll(PDO::FETCH_OBJ);
$service = $statement2->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Product List</h2>
    </div><br><br>
    <div class="card-body">
      <table class="table table-bordered">
        <tr align="left">
          <th width="8%">Name</th>
          <th width="5%">cost</th>
          <th width="5%">Type</th>
          <th width="5%">Action</th>
		  <th width="30%"></th>
        </tr>
        <?php foreach($product as $item): ?>
          <tr>
            <td><?= $item->name; ?></td>
            <td><?= $item->cost; ?></td>
            <td><?= $item->type; ?></td>
            <td>
              <a href="product/edit.php?id=<?= $item->id ?>" class="btn btn-info"><b>Edit</b></a>&nbsp&nbsp&nbsp&nbsp
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="product/delete.php?id=<?= $item->id ?>" class='btn btn-danger'><b>Delete</b></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
</br></br><hr align="left" color="white" width="600px" size="0.1px"></br><br>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Service List</h2>
    </div><br><br>
    <div class="card-body">
      <table class="table table-bordered">
        <tr align="left">
          <th width="8%">Name</th>
          <th width="5%">cost</th>
          <th width="5%">Type</th>
          <th width="5%">Action</th>
		  <th width="30%"></th>
        </tr>
        <?php foreach($service as $item): ?>
          <tr>
            <td><?= $item->name; ?></td>
            <td><?= $item->cost; ?></td>
            <td><?= $item->type; ?></td>
            <td>
              <a href="product/edit.php?id=<?= $item->id ?>" class="btn btn-info"><b>Edit</b></a>&nbsp&nbsp&nbsp&nbsp
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="product/delete.php?id=<?= $item->id ?>" class='btn btn-danger'><b>Delete</b></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
