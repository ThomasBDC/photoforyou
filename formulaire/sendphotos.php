
<?php
session_start ();
$target_dir = "C:/wamp/www/PhotoForYouBureau/lesphotos/pictures/".$_SESSION['pseudo']."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
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
                try
                {
                     $req = "INSERT INTO `photoforyoubureau`.`photos` (`titre`, `description`, `source`, `pseudoUser`, `tailleX`, `tailleY`) VALUES ('".$_POST['titre']."', '".$_POST['description']."', '".$target_file."', '".$_SESSION['pseudo']."', '6550', '6500')";

                    $reponse = $bdd->exec($req);
                    // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Votre inscription s est bien déroulée, elle fait partie de votre répertoire\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=http://localhost/PhotoForYouBureau/mypictures.php">';
            exit();
                }
                catch (Exception $ex) {
                    echo"une erreur est survenue.";
                }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
     
}
?>
