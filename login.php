<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="./style/login.css">
    </head>

    <body>
        <form method="post">
            
            <div class="email">
                <h3>Email</h3>
                <input for="email" id="email" type="email" name="email">
            </div>
                

            <div class="password">
                <h3>Mot de passe</h3>
                <input for="password" id="password" type="password" name="password">
            </div>
                

            <button class="button" id="button" type="submit" name="button">Connecter</button>

            <div class="php">
                <!------------------------------- Connecte à la bdd  --------------------------------------------->
                <?php 
                try {
                    $bdd=new PDO ('mysql:host=localhost;dbname=gestion_hotel;charset=UTF8', 'root','root');
                }

                catch(Exception $e) {
                    die('Erreur :' .$e->getMessage());
                }
                ?>
                <!------------------------------------------------------------------------------------------------>

                <!------------------------------------------ Tentative de connexion  -------------------------------------------------------------------------->
                <?php
                if ($_POST) {
                    $request = $bdd ->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
                    $request->execute(array(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password'])));
                    $user = $request->fetch(PDO::FETCH_ASSOC);//Compare

                        //Connecte car similaire à la bdd
                        if(!empty($user)){ 
                            session_start();
                            $_SESSION['id_user'] = $user['id_user'];
                            $_SESSION['email'] = $user['email'];
                            header('location:index.php?error=none');
                        } 
                            
                    else {
                        echo "Email ou Mot de passe incorrect !";
                    }
                }
                ?>
                <!--------------------------------------------------------------------------------------------------------------------------------------------->
            </div>

        </form>
    </body>

</html>