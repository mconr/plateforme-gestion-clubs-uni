<?php 
require '../connexion.php';
$id = $_POST['id'];
if(isset($id)){
    $date=$_POST['date_eve'];
    $lieu=$_POST['lieu_eve'];
    $sql="UPDATE `demande_evenement` SET `date_eve`='$date',`lieu_eve`='$lieu'";
    $query=mysqli_query($con,$sql);
    if(isset($query)){
        header("location:evenements.php");
    } else {
        echo 'Error Modification';
    }
}
?>
    