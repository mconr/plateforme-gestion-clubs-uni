<?php
require '../connexion.php';
$id = $_POST['id'];
$sql=" DELETE FROM  demande_evenement WHERE id_demande_eve='$id'";
$query=mysqli_query($con,$sql);
 if (isset($query)){
    header("location:evenements.php");
 } else {
    echo 'Error Delte';
 }
?>