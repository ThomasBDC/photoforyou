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
    ?>  

    <div id="body">
		<div id="content">
                </div>
        
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
                $req = "SELECT * from photoforyoubureau.photos, photoforyoubureau.users WHERE pseudoUser = pseudo AND mail = '".$_SESSION['mail']."'";
                $response = $bdd->query($req);

                // On affiche chaque entrée une à une
                while ($datat = $response->fetch())
                {
                    echo "</br><img src=".$datat['source']." alt='Smiley face' height='151' width='235' >"."</br>".$datat['titre']."</br> ".$datat['description']."</br>";
                }

                $response->closeCursor(); // Termine le traitement de la requête

            ?>
    	<div class="clear"></div>
    </div>

    <?php 
        include("include/footer.inc.php");
    ?>  

</div>
</body>
</html>
