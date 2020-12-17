<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="shortcut icon" type="image/ico" href="img/favicon.gif" />
   <link rel="stylesheet" type="text/css" href="./style/personnel.css" />
   <title>Hotel & Resort</title>
 </head>
 <body>

 <div class="header">
    <h1 id="head-title">Hotel & Resort</h1>
    <ul id="boutton-margin">
        <li><a href="index.php">Chambres</a></li>
        <li><a href="personnel.php">Personnel</a></li>
        <li id="déconnexion"><a href="logout.php">Déconnexion</a></li>
    </ul>
</div>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_hotel;charset=utf8', 'root', 'root');   
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die('Erreur :'.$e->getMessage() );
}

session_start();

?>

<button class="button" id="button" type="submit" name="button"><a href="formulaire.php">Ajouter un collaborateur</a></button>

<h2>Gestion du personnel</h2>

<div class="main">
    <?php
    $getAll = $bdd->query('SELECT nom, prenom FROM employee');
        foreach ($getAll->fetchAll() as $data)
        {
        ?>
        <div class="case_employee">
            <?php
            echo $data['nom'] . $data['prenom'];
            ?>
        </div>
        <?php
        }
    ?>
</div>
      </body>
</html>
