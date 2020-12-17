<head>
	<link href="./Personnel.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="logo.png" />
</head>

<div class="header">
    <h1 id="head-title">Hotel & Resort</h1>
    <ul id="buttonheader-margin">
        <li><a href="#chambres">Chambres</a></li>
        <li><a href="#personnel">Personnel</a></li>
        <li id="déconnexion"><a href="#déconnexion">Déconnexion</a></li>
    </ul>
</div>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp_hotels;charset=utf8', 'root', '');   
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die('Erreur :'.$e->getMessage() );
}
?>

        <button class="button" id="button" type="submit" name="button"><a href="./formulaire.php">Ajouter un collaborateur</button>

<h2>Gestion du personnel</h2>

<div class="main">
    <?php
    $getAll = $bdd->query('SELECT employee.nom, employee.prenom FROM employee INNER JOIN chambre on chambre.employee');
        foreach ($getAll->fetchAll() as $data)
        {
        ?>
        <div class="case_personnel">
            

        </div>
        <?php
        }
    ?>
</div>

