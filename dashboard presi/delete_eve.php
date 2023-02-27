<?php
require '../connexion.php';
$id = $_POST['id_evenement'];
$sql ="DELETE FROM `evenement` WHERE id_evenement = '$id'";
$query = mysqli_query($con,$sql);
if(isset($query)){
    header("location:evenements.php");   
} else {
    echo 'Error Suppression';
}
?>