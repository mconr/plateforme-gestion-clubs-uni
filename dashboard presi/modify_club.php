<?php
require '../connexion.php';
$id_club = $_POST['id_club'];
$nom_club = $_POST['nom_club'];
$description_club = $_POST['description_club'];
$logo_club = $_POST['logo_club'];

if($logo_club == null){
    $sql = "UPDATE `club` SET `nom_club`='$nom_club',`description_club`='$description_club' WHERE id_club = '$id_club'";
    $query = mysqli_query($con,$sql);
    if(isset($query)){
        echo 'Done without logo';
        exit;
    }
}else {
    $sql = "UPDATE `club` SET `nom_club`='$nom_club',`description_club`='$description_club',`logo_club`='$logo_club' WHERE id_club = '$id_club'";
    $query = mysqli_query($con,$sql);
    if(isset($query)){
        echo 'Done with logo';
    }
}


?>