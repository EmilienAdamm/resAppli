<?php include('server.php') ?>
<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="styles/formation.css" media="screen" type="text/css" />
    </head>

<!-- Mixins-->
<!-- Pen Title-->
<br>
<div id="ima">
    <img src="images/favicon.ico" id="img">
</div>
<br><br>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Connexion</h1>

    <form method="post" action="formation_page1.php">
    <?php include('errors.php'); ?>
      <div class="input-container">
        <input type="#{type}" id="#{label}" name="username" required="required"/>
        <label for="#{label}">Nom d'utilisateur</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="#{label}" name="password" required="required"/>
        <label for="#{label}">Mot de passe</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" class="btn" name="login_user"><span>Valider</span></button>
      </div>
      <div class="footer"><a href="#">Mot de passe oublié ?</a></div>
    </form>

  </div>

<!--page d'inscription-->

  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Inscription
      <div class="close"></div>
    </h1>

    <form method="post" action="formation_page1.php">
    <?php include('errors.php'); ?>

      <div class="input-container">
        <input type="email" name="email" value="<?php echo $email; ?>" required="required"/>
        <label for="#{label}">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="password_1" required="required"/>
        <label for="#{label}">Mot de passe</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="password_2" required="required"/>
        <label for="#{label}">Confirmation du mot de passe</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="username" value="<?php echo $username; ?>" required="required"/>
        <label for="#{label}">Raison social</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="adresse" required="required"/>
        <label for="#{label}">Adresse</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="codePostal" required="required"/>
        <label for="#{label}">Code Postal</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="ville" required="required"/>
        <label for="#{label}">Ville</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="pays" required="required"/>
        <label for="#{label}">Pays</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="telFix" required="required"/>
        <label for="#{label}">Telephone fix</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="telMobile" required="required"/>
        <label for="#{label}">Telephone mobile</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" class="btn" name="reg_user"><span>Confirmer</span></button>
      </div>
    </form>

  </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="jform.js" defer>
</script>

</html>