<?php 
        require '../connexion.php';
        $id_demande = $_POST['ids'];
        $sql = "DELETE FROM `demande_inscription` WHERE id_demande='$id_demande'";
        $query = mysqli_query($con,$sql);
        if(isset($query)){
            header("location:demande.php");
        } else{
            echo "<h4> ERROR SUPPRESSION </h4>";
        }
?>