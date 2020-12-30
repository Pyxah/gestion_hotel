<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="shortcut icon" type="image/ico" href="img/favicon.gif" />
   <link rel="stylesheet" type="text/css" href="./style/index.css" />
   <title>Hotel & Resort</title>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"
			integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			crossorigin="anonymous"></script>
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
?>

<!------------------------------- Redirige sur le login si non connecté  ------------------------->
<?php

session_start();
if(!isset($_SESSION['id_user'])) {
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
            <div class="chambre active" style="z-index :20">
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

            <div class="dropdown dropdown2">
                <form action="" method="post">
                <label for="statut"></label>
                <select id="statut" class="input100" type="select" name="statut" placeholder="Choose your Role" required>
                    <option value="1">Libre</option>
                    <option value="2">Occupé</option>
                    <option value="3">A nettoyer</option>
                </select>
                
                <label for="employee"></label>
                <select id="employee" class="input00" type="select" name="employee" placeholder="Choose your Role" required style="display: none;">
                    <?php
                    $getAllEmployee = $bdd->query('SELECT nom, prenom, chambre, id_employee from employee where chambre is null');
                    foreach ($getAllEmployee->fetchAll() as $data) {
                    echo '<option value="'.$data['id_employee'].'">'.$data['nom'].' '.$data['prenom'].'</option>'; }

                    if ($_POST) {
                    $updateChambre = $bdd->prepare('UPDATE chambre SET statut = ?, employee = ? WHERE chambre.id_chambre = ?');
                    $updateChambre->execute(array($_POST['statut'], $_POST['employee']));
                    }
                    ?>
                </select>
                <button class="button" id="button" type="submit" name="button">Enregistrer</button>
                </form>
            </div>
        </div>
        <?php
        }
    ?>
</div>


<script>
    $(document).ready(function() {

        $('.dropdown').hide()
        let display = false

        $('#employe').hide()
        $('#status').change(function() {
            if ($(this).val() == 3) {
                $('#employe').show()
            } else {
                $('#employe').hide()
            }
        })

        $('.chambre').click(function() {
            
            if (display == false) {
                display = true
                $(this).parent().find('.dropdown').show()
                $('.chambre').css('pointer-events', 'none')
                $(this).css('pointer-events', 'auto')
                $(this).css('z-index', '10')
            } else {
                display = false
                $(this).parent().find('.dropdown').hide()
                $(this).find('.dropdown').hide()
                $('.chambre').css('pointer-events', 'auto')
                $(this).css('z-index', '0')
            }
        })
    })
</script>

<!--<script src="script.js"></script>
<script src="jquery.js"></script>-->

 </body>
</html>
