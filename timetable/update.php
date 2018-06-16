<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=g2db', 'root', '');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE apmt 
 SET title=:title, start_event=:start_event, end_event=:end_event 
 WHERE apmt_id=:apmt_id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':apmt_id'   => $_POST['id']
  )
 );
}

?>
