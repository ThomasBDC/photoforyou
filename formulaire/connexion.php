<?php

// on teste si nos variables sont définies
if (isset($_POST['mail']) && isset($_POST['mdp'])) {

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


// Si tout va bien, on peut continuer


// On récupère tout le contenu de la table jeux_video

$reponse = $bdd->query('SELECT mail,Mdp,typeUser,pseudo FROM users');


// On affiche chaque entrée une à une
$trouve = false;
while ($donnees = $reponse->fetch() AND !$trouve)

{

if ($donnees['mail'] == $_POST['mail'] && $donnees['Mdp'] == $_POST['mdp']) {
		// dans ce cas, tout est ok, on peut démarrer notre session

		// on la démarre :)
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['mail'] = $_POST['mail'];
		$_SESSION['mdp'] = $_POST['mdp'];
                $_SESSION['type'] = $donnees['typeUser'];
                $_SESSION['pseudo'] = $donnees['pseudo'];
                $trouve = true;
		// on redirige notre visiteur vers une page de notre section membre
                // 
		header ('location: http://localhost/PhotoForYouBureau/index.php');
	}
}
$reponse->closeCursor(); // Termine le traitement de la requête
if (!$trouve) {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Votre nom d utilisateur ou votre mot de passe n est pas bon !\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=http://localhost/PhotoForYouBureau/index.php">';
	}





	
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>