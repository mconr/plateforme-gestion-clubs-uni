<?php
    require '../connexion.php';
    $id = $_POST['id_evenement'];
    $titre = $_POST['titre_eve'];
    $dates = $_POST['date_eve'];
    $lieu = $_POST['lieu_eve'];
    $description = $_POST['description_eve'];
    $photo = $_POST['photo_eve'];
    if($photo == null){
        $re = "UPDATE `evenement` SET `title_evenement`='$titre',`description_evenement`='$description',`date_evenement`='$dates',`lieu_evenement`='$lieu' WHERE  `id_evenement` = '$id'";
        $qu=mysqli_query($con,$re);
        if(isset($qu)){
            header("location:evenements.php");
            exit;
        } else {
            echo'ERROR UPDATE';
        }
    } else {
        $re = "UPDATE `evenement` SET `title_evenement`='$titre',`description_evenement`='$description',`date_evenement`='$dates',`lieu_evenement`='$lieu',`logo_evenement`='$photo' WHERE  `id_evenement` = '$id'";
        $qu=mysqli_query($con,$re);
        if(isset($qu)){
            header("location:evenements.php");
            exit;
        } else {
            echo'ERROR UPDATE';
        }
    }
    
?>