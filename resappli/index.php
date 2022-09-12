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
<html>
    <head>
        <meta charset="utf-8">
        <title>Reservation</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <img src="./images/logoPrixy-removebg-preview.png">
        <table>
            <tr>
                <th>Type de réservation</th>
                <th>Participant</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
                <th>Motif</th>
            </tr>
            <tr>
                <?php
                require('db.php');
                $email=$_SESSION['email'];
                $sql = "SELECT * FROM agenda WHERE USEREmail='$email'";

                if($result = mysqli_query($connexion, $sql)){
                    if(mysqli_num_rows($result) >= 0){
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td>" . $row['RESTypeReservation'] . "</td>";
                                echo "<td>" . $row['RESParticipant'] . "</td>";
                                echo "<td>" . $row['RESDateDebut'] . "</td>";
                                echo "<td>" . $row['RESDateFin'] . "</td>";
                                echo "<td>" . $row['RESMotif'] . "</td>";
                            echo "</tr>";
                        }
                        
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo "No records matching your query were found.";
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                mysqli_close($connexion);

                ?>
                <!-- <td colspan="5">&nbsp;<td> -->
            </tr>
        </table>
        <a class="up" href="./reserver.php">Ajouter une réservation</a>
        <button>retirer une reservation</button>
        <div class="header">
            <h2>Home Page</h2>
        </div>
        <div class="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
                </h3>
            </div>
            <?php endif ?>

            <!-- logged in user information -->
            <?php  if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p>your email is <strong><?php echo $_SESSION['email']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
            <p>de type <strong><?php echo intval($_SESSION['privilege']);?></strong></P>
            <?php endif ?>
        </div>
    </body>
</html> 