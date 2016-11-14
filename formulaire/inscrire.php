<?php

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
                } catch (Exception $ex) {
                    echo"une erreur est survenue.";
                }
               

                echo"ok";


?>
