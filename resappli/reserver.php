<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: formation_page1.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link href="styles/reserStyle.css" rel="stylesheet">
        <title>Réservation</title>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="application/javascript" src="./reserver.js"></script>
    </head>

    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container">
        <div id="header">

            <div>
                <a href="./user.php"><img src="./images/logoPrixy-removebg-preview.png" class="rounded mx-auto d-block"></a>
            </div>

            <div id="title">
                <h2>Réservation</h2>
            </div>

        </div>
        <br> <br>
        <div id="body">
            <form method="POST" action="./insert.php" class="w-50"> 
                <fieldset>
                    
                    <div class="input-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nom de réservation</span>
                        </div>
                        <input class="form-control" type="text" name="motif" required></input>
                    </div>


                    <div class="input-group mb-5">
                        <label class="input-group-text" for="inputGroupSelect01">Type de réservation</label><br>
                        <select name="Type_reservation" class="form-select" id="inputGroupSelect01">
                            <option value="Reunion">Réunion</option>
                            <option value="Formation">Formation</option>
                        </select>
                    </div> 
                    <div class="input-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nombre de participant</span>
                        </div>
                        <input class="form-control" type="number" min="0" max="30" id="nmbMembres" name="NBparticipant" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Début de la résérvation</span>
                        </div>
                        <input type="datetime-local" id="nmbMembres" name="dateDebut" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Fin de la résérvation</span>
                        </div>
                        <input type="datetime-local" id="nmbMembres" name="dateFin" class="form-control" required>
                    </div>

                    <div class="input-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nom du formateur</span>
                        </div>
                        <select name="formateur" class="form-select" id="inputGroupSelect01">
                        <option selected="selected"></option>
                            <?php
                            require('db.php');
                            $query="SELECT USERRSocial FROM users WHERE USERFormateur = 1";
                            $result=mysqli_query($connexion,$query);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $Formateur=$row['USERRSocial'];
                                    echo "<option value='".$Formateur."'>".$Formateur."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                </fieldset>
                
                <input class="btn btn-primary" type="submit" name="submit">

            </form>
        </div>
    </div>
    </body>
</html>