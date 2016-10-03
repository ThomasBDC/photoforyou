<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
// On récupère nos variables de session
if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
	echo 'Votre login est '.$_SESSION['mail'].' et votre mot de passe est '.$_SESSION['mdp'].'.';
	echo '<br />';
        
        if($_SESSION['type'] == 1)
        {
            $rep = 'SELECT * FROM MENU where type is null and user is null or type ="connect" or user=1 order by idMenu';
        }
        else if($_SESSION['type'] == 2)
        {
            $rep = 'SELECT * FROM MENU where type is null and user is null or type ="connect" or user=2 order by idMenu';
        }
        
}
else {
	echo 'Les variables ne sont pas déclarées.';
        
        $rep = 'SELECT * FROM MENU where type is null or type ="disconnect"';
}
?>

<div id="container">
	<div id="header">
    	<h1><a href="http://localhost/photoforyoubureau/">PhotoForYou</a></h1>
        <h2>Des photos de pros pour les pros</h2>
        <div class="clear"></div>
    </div>

<div id="nav">
    	<ul> 
   
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

                $reponse = $bdd->query($rep);

                // On affiche chaque entrée une à une
                while ($data = $reponse->fetch())
                {
                    if ($_SERVER['PHP_SELF'] == '/PhotoForYouBureau/'.$data['Lien'])
                    {
                        echo '<li class="start selected"><a href="' .$data['Lien'].'">'. $data['NomMenu'] . '</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="' .$data['Lien'].'">'. $data['NomMenu'] . '</a></li>';
                    }
                    
                }

                $reponse->closeCursor(); // Termine le traitement de la requête

            ?>
        </ul>
</div> 

    