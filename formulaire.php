<!DOCTYPE html>
<html>
<head>
	<link href="./formulaire.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="logo.png" />
</head>
 <body>

 <div class="header">
    <h1 id="head-title">Hotel & Resort</h1>
    <ul id="buttonheader-margin">
        <li><a href="index.php">Chambres</a></li>
        <li><a href="personnel.php">Personnel</a></li>
        <li id="déconnexion"><a href="logout.php">Déconnexion</a></li>
    </ul>
</div>        
        
<!------------------------------- Connecte à la bdd  --------------------------------------------->
<div class="php">
<?php 
try {
    $bdd=new PDO ('mysql:host=localhost;dbname=gestion_hotel;charset=UTF8', 'root','');
}

catch(Exception $e) {
    die('Erreur :' .$e->getMessage());
}
?>
<!------------------------------------------------------------------------------------------------>

<!--------------------------------------- Ajout employé ---------------------------------------------->

<h2>Ajout d'un collaborateur</h2>

      <form method="post"> 
        
        <div class="Nom">
          <h3>Nom</h3><input id="nom" type="text" name="nom"><h3>Prénom</h3><input id="prenom" type="text" name="prenom"></div> 

        <button class="button" id="button" type="submit" name="button">Enregistrer</button>
      </form>

</body>
</html>
<!---------------------------------------------------------------------------------------------------->

<!-------------------------------------- Création de compte  ----------------------------------------------->
<?php
    //Fonction de création de compte
    if ($_POST) { 
            $request = $bdd->prepare('INSERT INTO employee (nom, prenom) VALUES (?, ?)');
            $request->execute(array($_POST['nom'], $_POST['prenom']));
            header('location:personnel.php?error=none');
    }
?>
</div>
<!----------------------------------------------------------------------------------------------------------->
