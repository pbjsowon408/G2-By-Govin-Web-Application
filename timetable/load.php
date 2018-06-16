<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=g2db', 'root', '');

$data = array();

$query = "SELECT * FROM apmt ORDER BY apmt_id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["apmt_id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>
