<?php
session_start();
require '../connexion.php';
$erreur = "";
@$pass = $_POST['password'];
@$mail = $_POST['email'];
$sql= "SELECT * FROM administrateur" ;
$query = mysqli_query($con,$sql);
while($rows = mysqli_fetch_assoc($query)){
    $hashed = $rows['pass_admin'];
    $email = $rows['email_admin'];
    if(isset($_POST["submit"])){
        if($email == $mail){
            if(password_verify($pass,$hashed)){
                $_SESSION["connect"] = "oui";
                header("location:../dashboard admin/index.php");
            } else{
                header("location:../login admin/index.php?error=Incorrect email ou password");
                exit;
            }
        } else{
                header("location:../login admin/index.php?error=Incorrect email ou password");
                exit;
            }
    }
}
?>