<?php
echo "coycoy";
    try
                {
                	// On se connecte à MySQL
                        $bdd = new PDO('mysql:host=localhost;dbname=photoforyoubureau;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                	// En cas d'erreur, on affiche un message et on arrête tout
                        die('Erreur : '.$e->getMessage());
                }
                $titre = "tatabdc";
                    $req = "CALL addAndSelectpictures('".$titre."','".$titre."','".$titre."','".$titre."')";
                 $reponse = $bdd->query($req);

                // On affiche chaque entrée une à une
                while ($data = $reponse->fetch())
                {
                    echo $data['idphotos']." ".$data['titre']." ".$data['description']."</br>";
                }

                $reponse->closeCursor(); // Termine le traitement de la requête

?>
