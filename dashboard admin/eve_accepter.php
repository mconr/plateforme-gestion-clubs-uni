<?php 
        require '../connexion.php';
        $id = $_POST['id'];
        $sql = " SELECT * FROM demande_evenement WHERE id_demande_eve='$id' ";
        $query = mysqli_query($con,$sql);
        $rows = mysqli_fetch_assoc($query);
        $nom = $rows['nom_eve'] ;
        $description=$rows['description_eve'];
        $date_eve=$rows['date_eve'];
        $lieu_eve=$rows['lieu_eve'];
        $photo_eve=$rows['photo_eve'];
        $id_club = $rows['id_club'];
        $requet = "INSERT INTO `evenement`( `title_evenement`, `description_evenement`, `date_evenement`, `lieu_evenement`, `logo_evenement`, `id_club`) VALUES ('$nom','$description','$date_eve','$lieu_eve','$photo_eve','$id_club')";
        $querys = mysqli_query($con,$requet);
        if(isset($querys)){
            $requets = "DELETE FROM demande_evenement WHERE id_demande_eve=$id";
            $q = mysqli_query($con,$requets);
            header("location:demande.php");
        } else{
            echo "<h1> ERROR D'ACCEPTATION </h1>";
            
        }
        



?>