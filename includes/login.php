<?php include "db.php"; ?>
<?php 
session_start();

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $password = mysqli_real_escape_string($connection, $pwd);
    $query = "SELECT * FROM users WHERE email ='$email' AND password = '$password'";
    $sql = mysqli_query($connection, $query);
    if(mysqli_num_rows($sql) == 0){
        header("Location: ../index.php");
    }else{
        while($row = mysqli_fetch_array($sql)){
            $_SESSION["id"]= $row["id"];
            $_SESSION["email"]= $row["email"];
            $_SESSION["role"]= $row["role"];
            $_SESSION["fname"]= $row["first_name"];
            $_SESSION["lname"]= $row["last_name"];
        }
        header("Location: ../admin");
    }
}