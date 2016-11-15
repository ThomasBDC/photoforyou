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
        if (isset($_SESSION['mail']) AND $_SESSION['type']==2)
        {
    ?>

    <div id="body">
		<div id="content">
                    
                  <form action="formulaire/sendphotos.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="titre" value="titre"></br>
                        <input type="textArea" name="description" value="description"></br>
                        Select image to upload:</br>
                        <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
                        <input type="submit" value="Upload Image" name="submit">
                    </form>

                </div>
       
    	<div class="clear"></div>
    </div>
    <?php
        }
        else
        {
            echo "Vous n'avez pas accès à cette page !";
        }
    ?>  
    <?php 
        include("include/footer.inc.php");
    ?>  

</div>
</body>
</html>