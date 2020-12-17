<!-------- Redirige sur le login si non connecté -------->
<?php
session_start();
if(!isset($_SESSION['id_user'])) {
    header('location:login.php?error=none');
}
?>
<!------------------------------------------------------->

<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Formulaire</title>
        <link href="./style/formulaire.css" rel="stylesheet" type="text/css">
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

        <h2>Ajout d'un collaborateur</h2>

        <form method="post"> 
            
            <div class="box">

                <div class="box1">
                <h3>Nom</h3><input id="nom" type="text" name="nom">
                </div> 

                <div class="box2">
                <h3>Prénom</h3><input id="prenom" type="text" name="prenom">
                </div> 

            </div> 

            <button class="button" id="button" type="submit" name="button">Enregistrer</button>

        </form>

    </body>

</html>

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
