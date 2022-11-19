<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign-up</title>
</head>
<body>

<?php 
    function Validate_Name() : void {
        if((empty($_POST['name'])) || (empty($_POST['surname']))|| (empty($_POST['email'])) || (empty($_POST['pass'])) || (empty($_POST['confirm']))){
            throw new RuntimeException("un campo è vuoto");
        }
        else{
            $_POST['name']=trim($_POST['name']);
            $_POST['surname']=trim($_POST['surname']);
            $_POST['email']=trim($_POST['email']);
            $_POST['pass']=trim($_POST['pass']);
            $_POST['confirm']=trim($_POST['confirm']);
            if((!preg_match("/^[a-zA-Z]*$/",$_POST['name']))){
                throw new RuntimeException('formato del nome non valido');
            }
            if(!preg_match("/^[a-zA-Z]*$/",$_POST['surname'])){
                throw new RuntimeException('formato del nome non valido');
            }

        }
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        Validate_Name();
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $confirm=$_POST['confirm'];
        $regex="[a-zA-Z0-9]";
        $check=true;
        $con = new mysqli('localhost','root','','prova');
        if($con->connect_errno){
            throw new RuntimeException('non funziona un cazzo dio porco' . $mysqli->connect_error);
        }
            if((!preg_match("/^[a-zA-Z0-9]*$/",$pass))  ){
                echo "cazzo fai?";
            }
            else{
                $pass=password_hash($pass,PASSWORD_DEFAULT);
                $con->query("INSERT INTO persone (name, surname, email, pass) VALUES ('$name','$surname','$email','$pass')");
                echo "registrazione completata";
            }
}
?>
</body>
</html>