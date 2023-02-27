<?php
require '../connexion.php';
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$motivation = $_POST['motivation'];
$filliere = $_POST['filliere'];
$club = $_POST['club'];
$date = date("Y/m/d");
$sql = "INSERT INTO filliere (nom_filliere) VALUES ('$filliere')";
$query = mysqli_query($con,$sql);
if(isset($query)){
    $id_filliere = mysqli_insert_id($con);
    $sql = "INSERT INTO `personne`(`nom`, `prenom`, `telephone`, `id_filliere`) VALUES ('$nom','$prenom','$telephone','$id_filliere')";
    $query = mysqli_query($con,$sql);
    if(isset($query)){
        $id_personne = mysqli_insert_id($con);
        $sql = "INSERT INTO `membre`(`email_membre`, `date_inscription`, `id_personne`) VALUES ('$email','$date','$id_personne')";
        $query = mysqli_query($con,$sql);
        if(isset($query)){
            $id_membre = mysqli_insert_id($con);
            $sql = "INSERT INTO `demande_inscription`(`id_membre`, `id_club`, `motivation`) VALUES ('$id_membre','$club','$motivation')";
            $query = mysqli_query($con,$sql);
            if(isset($query)){
                echo 'Demande Send avec Success';
            }
        }
    }
}

$requet = "INSERT INTO demande_inscription (prenom_ins, nom_ins, email_ins, telephone_ins, motivation_ins, filliere_ins) VALUES ('$prenom', '$nom', '$email', '$telephone', '$motivation', '$filliere') ";
$query = mysqli_query($con, $requet);
if(isset($query)) {
    header("location:index.php?success= Demande Send avec Success");
} else{
    header("location:index.php?error= Demande Send avec Error");
}
?>