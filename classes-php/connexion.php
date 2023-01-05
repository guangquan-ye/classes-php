<?php
require "User-pdo.php" ;
if(session_id() == ''){
    session_start();
}
if(isset($_GET["deco"])){
    session_destroy();
    header('Location: '. "connexion.php"); 
}
if (isset($_POST["submit"])) {
    $user= new User();
    $user->connect();
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
        <?= isset($_POST['submit']) ? $user->msg : null ?>
        <label for="login">Login :</label>
        <input type="text" name="login">

        <label for="password">Mot de passe :</label>
        <input type="password" name="pass">

        <input type="submit" value="Envoyez" name="submit">
    </form>
