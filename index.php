<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="shortcut icon" type="image/ico" href="img/favicon.gif" />
   <link rel="stylesheet" type="text/css" href="./style/index.css" />
   <title> titre </title>
 </head>
 <body>

 <div class="header">
    <h1 id="head-title">Hotel & Resort</h1>
    <ul id="boutton-margin">
        <li><a href="#chambres">Chambres</a></li>
        <li><a href="#personnel">Personnel</a></li>
        <li id="déconnexion"><a href="#déconnexion">Déconnexion</a></li>
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
?>



<!------------------------------- Redirige sur le login si non connecté  ------------------------->
<?php
session_start();
if(!isset($_SESSION["id_user"])) {
header('location:login.php?error=none');
}
?>
<!------------------------------------------------------------------------------------------------>


<h2>Gestions des chambres</h2>

<div class="main">
    <?php
    $getAll = $bdd->query('SELECT chambre.numero, chambre.etage, statut.statut FROM chambre INNER JOIN statut on chambre.statut = statut.id_statut');
        foreach ($getAll->fetchAll() as $data)
        {
        ?>
        <div class="case_chambre">
            <?php
            echo '<p>Chambre '. $data['numero'] .'</br>Etage '.$data['etage'].'</br></br></p>';
            if ($data['statut'] == 'libre') {
                echo '<p class="libre">Libre</p>';
            }

            elseif ($data['statut'] == 'occupe') {
                echo '<p class="occupe">Occupé</p>';
            }

            else {
                echo '<p class="nettoyage">A nettoyer</p>';
            }
            
            ?>
        </div>
        <?php
        }
    ?>
</div>

 </body>
</html>