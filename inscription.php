<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sworm - Free CSS Template by ZyPOP</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<!--
sworm, a free CSS web template by ZyPOP (zypopwebtemplates.com/)

Download: http://zypopwebtemplates.com/

License: Creative Commons Attribution
//-->
</head>
<body>
    <?php 
        include("include/header.inc.php");
        include("include/cotedroit.inc.php");
    
    if (empty($_POST['inscrire']))
    {?>
    <div id="body">
		<div id="content">
                  
                     <form  method="post" action="inscription.php" >
                         <h4>Prénom</h4>
                        <input type="text" name="prenom" ></br></br>
                        <h4>Nom</h4>
                        <input type="text" name="nom" ></br></br>
                        <h4>Nom d'utilisateur</h4>
                        <input type="text" name="user"></br></br>
                        <h4>Type</h4>
                        <select name="type">
                            <option value="client">Client</option>
                            <option value="photographe">Photographe</option>
                        </select></br></br>
                        <h4>Adresse E-Mail</h4>
                        <input type="mail" name="mail"></br></br>
                        <h4>Mot de passe</h4>
                        <input type="password" name="mdp" size=20></br></br>
                        <h4>Confirmer le mot de passe</h4>
                        <input type="password" name="mdp2"></br></br>
                        <input type="submit" name="inscrire" value="Suivant">
                </div>
        
       
    	<div class="clear"></div>
    </div>
    <?php
    }
    else
    {
           //Vérification des champs
        $mailRegex = "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#";
    ?>
    <div id="body">
		<div id="content">
                  
                     <form  method="post" action="inscription.php" >
                         <h4>Prénom</h4>
                        <input type="text" name="prenom" value ="<?php echo $_POST['prenom']; ?>">
                        <?php
                        $erreur = false;
                        if ($_POST['prenom']==""){
                            echo "Veuillez indiquer votre prénom !</br>";
                            $erreur = true;
                        }
                        ?>
                        </br></br>
                        <h4>Nom</h4>
                        <input type="text" name="nom" value ="<?php echo $_POST['nom']; ?>">
                        <?php
                        if (($_POST['nom']=="")){
                            echo "Veuillez indiquer votre nom de famille !</br>";
                            $erreur = true;
                        }
                        ?>
                        </br></br>
                        <h4>Nom d'utilisateur</h4>
                        <input type="text" name="user" value ="<?php echo $_POST['user']; ?>">
                        <?php
                        if (($_POST['user'])=="" ){
                            echo "Veuillez indiquer un nom d'utilisateur valide !</br>";
                            $erreur = true;
                        }
                        ?>
                        </br></br>
                        <h4>Type</h4>
                        <select name="type">
                            <option value="client">Client</option>
                            <option value="photographe">Photographe</option>
                        </select></br></br>
                        <h4>Adresse E-Mail</h4>
                        <input type="mail" name="mail" value ="<?php echo $_POST['mail']; ?>">
                        <?php
                        if (($_POST['mail'])=="" OR !preg_match($mailRegex,$_POST['mail'])){
                            echo "Veuillez indiquer une adresse mail valide!</br>";
                            $erreur = true;
                        }
                        ?>
                        </br></br>
                        <h4>Mot de passe</h4>
                        <input type="password" name="mdp" size=20>
                        <?php
                        if (($_POST['mdp']=="" OR strlen ($_POST['mdp'])>20 OR strlen ($_POST['mdp'])<6)){
                            echo "Veuillez indiquer un mot de passe valide !</br>";
                            $erreur = true;
                        }
                        ?>
                        </br></br>
                        <h4>Confirmer le mot de passe </h4>
                        <input type="password" name="mdp2">
                        <?php
                        if ($_POST['mdp'] != $_POST['mdp2'])
                        {
                            echo "Les mots de passe ne correspondent pas";
                            $erreur = true;
                        }
                        ?>
                        </br></br>
                        <input type="submit" name="inscrire" value="Suivant">
                        <?php
        if ($erreur == false)
        {
               try
                {
                	// On se connecte à MySQL
                        $bdd = new PDO('mysql:host=localhost;dbname=photoforyoubureau;charset=utf8', 'adminfoto', 'azerty11');
                }
                catch(Exception $e)
                {
                	// En cas d'erreur, on affiche un message et on arrête tout
                        die('Erreur : '.$e->getMessage());
                }
                
                if($_POST['type'] == "photographe")
                {
                    $letype=2;
                }
                else
                {
                    $letype=1;
                }
                
                try
                {
                     $reponse = $bdd->exec('INSERT INTO users (pseudo, prénom, nom, typeUser, mail, Mdp) VALUES ("'.$_POST['user'].'","'.$_POST['prenom'].'","'.$_POST['nom'].'","'.$letype.'","'.$_POST['mail'].'","'.$_POST['mdp'].'")');
                     if($letype=2)
                     {
                          mkdir("C:/wamp/www/PhotoForYouBureau/lesphotos/pictures/".$_POST['user'], 0700);
                     }
                    
                } catch (Exception $ex) {
                    echo"une erreur est survenue.";
                }
               
                // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Votre inscription s est bien déroulée, vous pouvez maintenant vous connecter!\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=http://localhost/PhotoForYouBureau/connexion.php">';
            exit();
        }
                        ?>
                </div>
        
       
    	<div class="clear"></div>
    </div>
    <?php
        }

    ?> 


    
    <?php 
        include("include/footer.inc.php");
    ?>  

</div>
</body>
</html>