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


    $user = new User();
    $user->update();
}
    $mysqli=new mysqli("localhost", "root", "root", "classes");
    $request = $mysqli->query("SELECT * FROM utilisateurs WHERE id = $_SESSION[userID]");
    $result=$request->fetch_all();
if (isset($_POST["delete"])) {
    $user = new User();
    $user->delete();
    echo $_SESSION['userID'];
} 
?>
 <form action="" method="post">

<label for="login">Login :</label>
<input type="text" name="login" value="<?php echo $result[0][1] ?>">

<label for="password">Mot de passe :</label>
<input type="password" name="pass" value="<?php echo $result[0][2] ?>">

<label for="email">Email :</label>
<input type="email" name="email" value="<?php echo $result[0][3] ?>">

<label for="firstname">Firstname :</label>
<input type="text" name="firstname" value="<?php echo $result[0][4] ?>">

<label for="lastname">Lastname :</label>
<input type="text" name="lastname" value="<?php echo $result[0][5] ?>">

<input type="submit" value="Envoyez" name="submit">
<input type="submit" value="Delete" name="delete">
</form>
