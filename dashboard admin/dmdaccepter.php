<?php 
require '../connexion.php';
$id = $_POST['id'];
$sql = " SELECT * FROM demande_club WHERE id_demande_club ='$id'";
$query = mysqli_query($con,$sql);
$rows = mysqli_fetch_assoc($query);
//------------------------------
$filliere = $rows['filliere'];
//------------------------------
$prenom = $rows['prenom'];
$nom = $rows['nom'];
$telephone = $rows['telephone'];
$email = $rows['email'];
//---------------------------------
$password = $rows['password'];
//---------------------------------
$club_nom = $rows['nom_club'];
$motivation = $rows['motivation'];
$description = $rows['description'];
$logo = $rows['logo'];
//---------------------------------
$sql_insert_filliere="INSERT INTO filliere (nom_filliere) VALUES ('$filliere')";
$query_insert_filliere= mysqli_query($con,$sql_insert_filliere);
if(isset($query_insert_filliere)){
    $id_fillieres = mysqli_insert_id($con);
    $sql_insert_personne="INSERT INTO `personne`(`nom`, `prenom`, `telephone`, `id_filliere`) VALUES ('$nom','$prenom','$telephone','$id_fillieres')";
    $query_insert_personne=mysqli_query($con,$sql_insert_personne);
    if(isset($query_insert_personne)){
        $id_personne = mysqli_insert_id($con);
        $sql_insert_president = "INSERT INTO `president`(`email_president`, `pass_president`, `id_personne`) VALUES ('$email','$password','$id_personne')";
        $query_insert_president = mysqli_query($con,$sql_insert_president);
        if(isset($query_insert_president)){
            $id_president = mysqli_insert_id($con);
            $sql_insert_club = "INSERT INTO `club`(`nom_club`, `description_club`, `logo_club`, `id_president`) VALUES ('$club_nom','$description','$logo','$id_president')";
            $query_insert_club = mysqli_query($con,$sql_insert_club);
            if(isset($query_insert_club)){
                $sql_delete_demande = " DELETE FROM demande_club WHERE id_demande_club='$id'";
                $query_delete_demande = mysqli_query($con,$sql_delete_demande);
                header("location:membre.php");

            } else {
                echo 'error insertion club';
            }

        } else {
            echo 'error insertion president';
        }
    } else {
        echo 'error insertion personne';
    }
} else {
    echo 'error insertion filliere';
}

        


?>