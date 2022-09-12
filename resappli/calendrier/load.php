<?php

$connect = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');

$data = array();

$query = "SELECT * FROM agenda";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["RESId"],
  'title'   => $row["RESMotif"],
  'start'   => $row["RESDateDebut"],
  'end'   => $row["RESDateFin"]
 );
}

echo json_encode($data);
?>
