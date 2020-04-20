<?php
require_once "DB.php";
class User{
    
    function validate($email,$password){
        $email = $email;
        $password = $password;
        if($email = "" && ($password = "" || $password < 6)){
            echo "Email and Password field must not be empty";
        }else{
           $user= new User;
           $user->autheticate($email, $password);
        }
    }
   function autheticate($email, $password){
        $email = $email;
        $password = $password;
        $query = "SELECT * FROM user WHERE email ='{$email}' AND password = '{$password}'";
        $sql= mysqli_query(runDB(),$query);
        if(!$sql){
            die("query not performed".mysqli_error($connection));
        }
    } 
}

$great = new User();
$great->validate("eloka","pass");