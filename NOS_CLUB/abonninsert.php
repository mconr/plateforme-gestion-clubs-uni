<?php 

$mail = $_POST['email'];

require 'connexion.php';

$req = "INSERT INTO `mailabonne`(`email`) VALUES ('$mail')";
$query = mysqli_query($con,$req); 

if( isset ( $query )){
  echo" <h1> insertion avec succes</h1>";
}


else{
  echo" <h1> Erreur d'insertion </h1>";
}
?>