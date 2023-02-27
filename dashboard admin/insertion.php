<?php 

$nom = $_POST['nom'] ;
$prenom=$_POST['prenom'];
$club=$_POST['club'];
$description=$_POST['textarea'];
$phone=$_POST['Phone'];
$filière=$_POST['filliere'];
$logo=$_POST['logo'];
require 'connection.php';
$requette=" INSERT INTO  `personne`(Nom , Prénom , N_telephone, club, filliere, motivation, logo) VALUES ('$nom','$prenom','$phone','$club','$filière','$description','$logo')";

$query = mysqli_query ( $con , $requette );

if( isset ( $query )){
  echo" <h1> insertion avec succes</h1>";
}


else{
  echo" <h1> Erreur d'insertion </h1>";
}
?>