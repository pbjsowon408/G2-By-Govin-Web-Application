<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM staff WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: ../staff.php");
}