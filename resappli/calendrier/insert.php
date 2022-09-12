
<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');

if(isset($_POST["title"]))
{
 $query = 
//  "
//  INSERT INTO events 
//  (title, start_event, end_event) 
//  VALUES (:title, :start_event, :end_event)
//  "
 " 
 INSERT INTO `agenda`
 (`RESId`, `RESParticipant`, `RESTypeReservation`, `RESDateDebut`, `RESDateFin`, `RESMotif`, `USEREmail`) 
 VALUES (NULL, '5', 'Reunion', :start_event, :end_event, :title, 'admin@mail.com')";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>