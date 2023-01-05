<?php
require "User-pdo.php";
if (isset($_POST["submit"])) {
    if (empty($login)) echo "Login laissé vide!";
    elseif (empty($pass)) echo "Mot de passe laissé vide!";
    elseif ($pass != $repass) echo "Mots de passe non identiques!";
    else {

    $newuser = new User();
    $newuser->register();
}
}
?>
<nav>
        <div class="items">
            <ul>
            <li><a href="index.php">Accueil</a></li>
        <?php if(isset($_SESSION["user"])): ?>
            
            
            <li><a href="profil.php">Profil</a></li>
            <form method ="get">
            <div class="deco">
            <li><button type="submit" id ="decobutton" name="deco">Deconnexion</button></li>
            </div> 
            </form>
            
        <?php else: ?>
            
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
        <?php endif ?>
            </ul>
        </div>
    </nav>
    
    <form action="" method="post">

        <label for="login">Login :</label>
        <input type="text" name="login">

        <label for="password">Mot de passe :</label>
        <input type="password" name="pass">

        <label for="email">Email :</label>
        <input type="email" name="email">

        <label for="firstname">Firstname :</label>
        <input type="text" name="firstname">

        <label for="lastname">Lastname :</label>
        <input type="text" name="lastname">

        <input type="submit" value="Envoyez" name="submit">
    </form>