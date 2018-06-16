<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM product WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$item = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['cost']) && isset($_POST['type']) ) {
  $name = $_POST['name'];
  $cost = $_POST['cost'];
  $type = $_POST['type'];
  $sql = 'UPDATE product SET name=:name, cost=:cost, type=:type WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':cost' => $cost, ':type' => $type, ':id' => $id])) {
    header("Location: ../product.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update product</h2>
    </div><br><br>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name"><b>Name</b> &nbsp&nbsp&nbsp&nbsp</label>
          <input value="<?= $item->name; ?>" type="text" name="name" id="name" class="form-control">
        </div><br>
        <div class="form-group">
          <label for="cost"><b>Cost</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
          <input type="cost" value="<?= $item->cost; ?>" name="cost" id="cost" class="form-control">
        </div><br>
          <div class="form-group">
          <label for="type"><b>Type</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
          <input type="type" value="<?= $item->type; ?>" name="type" id="type" class="form-control">
        </div><br><br>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
