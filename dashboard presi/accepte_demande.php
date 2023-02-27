<?php 
        require '../connexion.php';
        $id = $_POST['id'];
        if(isset($id)){
            $sql = "SELECT * FROM demande_inscription WHERE id_demande='$id'";
            $query = mysqli_query($con,$sql);
            $rows = mysqli_fetch_assoc($query);
            $id_membre = $rows['id_membre'];
            $id_club = $rows['id_club'];

            // $sql = "SELECT * FROM membre where id_membre= '$id_membre'";
            // $query = mysqli_query($con,$sql);
            // $rows = mysqli_fetch_assoc($query);
            // $id_personne = $rows['id_personne'];
            // $sql = "SELECT * FROM personne where id_personne= '$id_personne'";
            // $query = mysqli_query($con,$sql);
            // $rows = mysqli_fetch_assoc($query);
            // $id_filliere = $rows['id_filliere'];

            $sql = "INSERT INTO `appartient`(`id_club`, `id_membre`) VALUES ('$id_club','$id_membre')";
            $querys = mysqli_query($con,$sql);
            if(isset($query)){
                $sql = "DELETE FROM `demande_inscription` WHERE id_demande=$id";
                $query = mysqli_query($con,$sql);
                header("location:demande.php");
            } else{
                echo "<h1> ERROR D'ACCEPTATION </h1>";
    
            }
        }
        
        
?>