<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['cost'])  && isset($_POST['type'])) {
  $name = $_POST['name'];
  $cost = $_POST['cost'];
  $type = $_POST['type'];
  $sql = 'INSERT INTO product(name, cost, type) VALUES(:name, :cost, :type)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':cost' => $cost, ':type' => $type])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create Product / Service</h2>
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
          <input type="text" name="name" id="name" class="form-control">
        </div><br>
        <div class="form-group">
          <label for=cost"><b>Cost</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
          <input type="cost" name="cost" id="cost" class="form-control">
        </div><br>
          <div class="form-group">
          <label for=type"><b>Type</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
          <input type="type" name="type" id="type" class="form-control">
        </div><br><br>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
