<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Formulaire</title>
        <link rel="stylesheet" href="./style/formulaire.css">
    </head>
    <body>

<!------------------------------- Connecte à la bdd  --------------------------------------------->
<div class="php">
<?php 
try {
    $bdd=new PDO ('mysql:host=localhost;dbname=gestion_hotel;charset=UTF8', 'root','root');
}

catch(Exception $e) {
    die('Erreur :' .$e->getMessage());
}
?>
<!------------------------------------------------------------------------------------------------>

<!--------------------------------------- Ajout employé ---------------------------------------------->

<h2>Ajout d'un collaborateur</h1>

      <form action="" method="post"> 
        
        <div class="formulaire">
          <label for="nom">Nom</label> 
          <input id="nom" type="text" name="nom">
        
          <label for="prenom">Prénom</label> 
          <input id="prenom" type="text" name="prenom">
        </div>

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
