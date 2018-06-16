<?php
session_start();
$connect = mysqli_connect("localhost","root","","g2db");


    foreach ($_SESSION["shopping_cart"] as $key => $value){
        $item_name = $_SESSION['item_name'];
        $item_cost = $_SESSION['item_cost'];
        $item_amount = $_SESSION['item_amount'];
        $sql = 'INSERT INTO doc (name,cost,amount) VALUES (:name, :cost, :amount)';
        $statement = $connect->prepare($sql);
        if ($statement->execute([':name' => $name, ':cost' => $cost, ':amount' => $amount])) {
    $message = 'payment saved';
        }
    }
?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">

    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
    </div>
      
      <?php require 'footer.php' ; ?>