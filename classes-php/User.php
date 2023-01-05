<?php

class User
{
    private $id;
    public $login;
    public $pass;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;
    private $check;
    public $msg;
    
    public function __construct()
    {
        $this->bdd = new mysqli("localhost", "root", "root", "classes");
    }
    public function register(){

        $this->login=$_POST["login"];
        $this->pass=$_POST["pass"];
        $this->email=$_POST["email"];
        $this->firstname=$_POST["firstname"];
        $this->lastname=$_POST["lastname"];
        var_dump($this->login, $this->pass, $this->email, $this->firstname, $this->lastname);
        $query = "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('$this->login', '$this->pass', '$this->email', '$this->firstname', '$this->lastname')";
        $ins = $this->bdd->query($query);
        var_dump($ins);
    }
    public function connect(){
        $this->login=$_POST["login"];
        $this->pass=$_POST["pass"];
        $this->check=0;
        $this->msg="";
        
        $request = $this->bdd->query("SELECT * FROM utilisateurs");
        $result=$request->fetch_all();
        
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
        $update = "UPDATE utilisateurs SET login='$this->login', password='$this->pass', email='$this->email', firstname='$this->firstname', lastname='$this->lastname' WHERE id=$this->id";
        $request = $this->bdd->query($update);
    }
    public function delete(){
        $this->id=$_SESSION['userID'];
        $del = "DELETE FROM utilisateurs WHERE id=$this->id";
        $this->bdd->query($del);
    }
    
}
?>