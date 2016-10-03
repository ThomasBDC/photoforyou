<!-- menu latéral -->
<div class="sidebar">
            <ul>
                
                <?php
                if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
                    echo'<li>
                    <h3>Navigate</h3>
                    <ul class="blocklist">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="examples.html">Examples</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Solutions</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </li>';
                }
                else{
                    echo'<li>
                        <h3>Se Connecter</h3>
                    <form  method="post" action="formulaire/connexion.php">
                        Adresse E-Mail</br>
                        <input type="text" name="mail" ></br>
                        Mot de passe</br>
                        <input type="password" name="mdp"></br>
                        <input type="submit" value="Valider" >
                    </form>
                 
                </li>';
                }
                ?>
               
                
                
            </ul> 
        </div>