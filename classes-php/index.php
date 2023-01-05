<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

   

</body>

</html>