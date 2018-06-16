<?php

//delete.php

if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=localhost;dbname=g2db', 'root', '');
 $query = "
 DELETE from apmt WHERE apmt_id=:apmt_id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':apmt_id' => $_POST['id']
  )
 );
}

?>
