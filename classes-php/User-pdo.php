<?php
class User
{
    private $id;
    public $login;
    public $pass;
    public $email;
    public $firstname;
    public $lastname;
    public $pdo;
    public $msg;
    private $check=0;
    
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=classes", "root", "root"); 
    }  
    public function register(){
        $this->login=$_POST["login"];
        $this->pass=$_POST["pass"];
        $this->email=$_POST["email"];
        $this->firstname=$_POST["firstname"];
        $this->lastname=$_POST["lastname"];

        $sel = $this->pdo->prepare("SELECT login FROM utilisateurs WHERE login=? limit 1");
        $sel->execute(array($this->login));
        $tab = $sel->fetchAll();
        if (count($tab) > 0){
            echo "Login existe déjà!";
        }
        else {
            $ins = $this->pdo->prepare("INSERT INTO utilisateurs(login, password, email, firstname, lastname) VALUES(?,?,?,?,?)");
            if ($ins->execute(array($this->login, $this->pass, $this->email, $this->firstname, $this->lastname))){

                echo "Compte créé !";
            
            }
        }   
    }
    public function connect(){
        $this->login=$_POST["login"];
        $this->pass=$_POST["pass"];
        $this->check=0;
        $this->msg="";
        
        $sel = $this->pdo->prepare("SELECT * FROM utilisateurs");
        $sel->execute();
        $result = $sel->fetchAll();
        
        for ($i=0 ; isset($result[$i]) ; $i++){
            if ($result[$i][1]==$_POST["login"] && $result[$i][2] == $_POST["pass"]){ 
            $this->check = 1;
            $_SESSION['userID'] = $result[$i][0]; 
            $_SESSION['user'] = $result[$i][1];
             $this->msg="ok";
            break;
            } 
        } 
        if($this->check == 0){
            $this->msg = "Information incorrect";
        }
    }
    public function update(){
        $this->login=$_POST["login"];
        $this->pass=$_POST["pass"];
        $this->email=$_POST["email"];
        $this->firstname=$_POST["firstname"];
        $this->lastname=$_POST["lastname"];
        $this->id=$_SESSION['userID'];
        $update = $this->pdo->prepare ("UPDATE utilisateurs SET login='$this->login', password='$this->pass', email='$this->email', firstname='$this->firstname', lastname='$this->lastname' WHERE id=$this->id");
        $update->execute();
    }
    public function delete(){
        $this->id=$_SESSION['userID'];
        $del = $this->pdo->prepare ("DELETE FROM utilisateurs WHERE id=$this->id");
        $del->execute();
    }

}
?>