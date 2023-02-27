<?php
require '../connexion.php';
$id = $_POST['id'];
$sql=" DELETE FROM demande_club WHERE id_demande_club='$id'";
$query=mysqli_query($con,$sql);
if (isset($query)){
    header("location:demande.php");
} else {
   echo 'Error Delete';
}
?>