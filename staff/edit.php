<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM staff WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['dob'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $dob = $_POST['dob'];
  $sql = 'UPDATE staff SET name=:name, email=:email, contact=:contact, dob=:dob WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':contact' => $contact,':dob' => $dob, ':id' => $id])) {
    header("Location: ../staff.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Staff</h2>
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
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div><br>
        <div class="form-group">
          <label for="email"><b>Email</b> &nbsp&nbsp&nbsp&nbsp</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div><br>
          <div class="form-group">
          <label for="contact"><b>Contact</b> &nbsp</label>
          <input type="contact" value="<?= $person->contact; ?>" name="contact" id="contact" class="form-control">
        </div><br>
          <div class="form-group">
          <label for="dob"><b>DoB</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
          <input type="dob" value="<?= $person->dob; ?>" name="dob" id="dob" class="form-control">
        </div><br><br>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
