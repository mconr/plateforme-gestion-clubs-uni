<?php
session_start();
require '../connexion.php';
$erreur = "";
$pass = $_POST['password'];
$mail = $_POST['email'];
$sql="SELECT * FROM president";
$query = mysqli_query($con,$sql);
while($rows = mysqli_fetch_assoc($query)){
    $id_president= $rows['id_president'];
    $hashed = $rows['pass_president'];
    $email = $rows['email_president'];
    if(isset($_POST["submit"])){
        if($email == $mail){    
            if(password_verify($pass,$hashed)){ 
                $sql_id_club="SELECT * FROM club where id_president= '$id_president'";
                $query_id_club=mysqli_query($con,$sql_id_club);
                $rows_id_club = mysqli_fetch_assoc($query_id_club);
                $id_club = $rows_id_club['id_club'];
                $_SESSION["id"] = $id_club;
                $_SESSION["autorise"] = "oui";
                header("location:../dashboard presi/index.php");
            }
        }
    }
}

?>