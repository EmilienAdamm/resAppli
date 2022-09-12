<?php
require('db.php');
session_start();
$result=mysqli_query($connexion,"SELECT count(*) FROM agenda");
$num_rows = mysqli_num_rows($result)+1;
echo "res$num_rows";
if(isset($_POST['submit'])){
    $type= $_POST['Type_reservation'];
    $NBparticipant= $_POST['NBparticipant'];
    $dateDebut= $_POST['dateDebut'];
    $dateFin= $_POST['dateFin'];
    $motif= $_POST['motif'];
    $email= $_SESSION['email'];
    $formateur = $_POST['formateur'];

    $query = "INSERT INTO `agenda` (`RESId`, `RESParticipant`, `RESTypeReservation`, `RESDateDebut`, `RESDateFin`, `RESMotif`, `RESFormateur`, `USEREmail`) VALUES (NULL,'$NBparticipant','$type','$dateDebut','$dateFin','$motif','$formateur','$email')";

    $run = mysqli_query($connexion,$query) or die(mysqli_error($connexion));
    if($run){
        echo "Form submitted successfully";
    }
    echo "submited";
}
header('Location: ./index.php');

?>