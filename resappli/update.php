<?php
include 'db.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $query="DELETE FROM agenda WHERE RESId=$id";
    $result=mysqli_query($connexion,$query);
    if ($result){
        header('location: user.php');
    }else{
        die(mysqli_error($connexion));
    }
}

?>