<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: formation_page1.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
header("location: formation_page1.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>accueil</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container">
    <a href="./user.php"><img src="./images/logoPrixy-removebg-preview.png" class="rounded mx-auto d-block"></a>
    <button class="btn btn-outline-danger"><a href="index.php?logout='1'" class="text-danger">logout</a></button>
    <button class="btn btn-outline-success float-right"><a href="reserver.php" class="text-success">reserver</a></button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre de participant</th>
                <th scope="col">Type de reservation</th>
                <th scope="col">Début</th>
                <th scope="col">Fin</th>
                <th scope="col">Motif</th>
                <th scope="col">Opération</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        require('db.php');
        $query="";
        if ($_SESSION['privilege']<=2){
            $query="SELECT * FROM agenda ORDER BY RESDateDebut DESC";
        }else{
            $email=$_SESSION['email'];
            $query = "SELECT * FROM agenda WHERE USEREmail='$email' ORDER BY RESDateDebut DESC";
        }
        $result=mysqli_query($connexion,$query);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['RESId'];
                $participant=$row['RESParticipant'];
                $typeReservation=$row['RESTypeReservation'];
                $debut=$row['RESDateDebut'];
                $fin=$row['RESDateFin'];
                $motif=$row['RESMotif'];
                echo '<tr>
                <td>'.$participant.'</td>
                <td>'.$typeReservation.'</td>
                <td>'.$debut.'</td>
                <td>'.$fin.'</td>
                <td>'.$motif.'</td>
                <td>
                    <button class="btn btn-warning"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                </td>
                </tr>';
            }
        }
        ?>

        </tbody>
        </table>
    </div>

  </body>
</html>
