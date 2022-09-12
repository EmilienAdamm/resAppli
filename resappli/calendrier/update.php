<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE agenda 
 SET RESMotif=:title, RESDateDebut=:start_event, RESDateFin=:end_event 
 WHERE RESId=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}
 
?>