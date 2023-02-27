<?php 
    require '../connexion.php';
    $nom = $_POST['nom_mod'];
    $prenom = $_POST['prenom_mod'];
    $email= $_POST['email_mod'];
    $telephone = $_POST['telephone_mod'];
    $filliere = $_POST['filliere_mod'];
    $date_inscription = $_POST['date_inscription'];

    $id_filliere = $_POST['id_filliere'];
    $id_membre = $_POST['id_membre'];
    $id_personne = $_POST['id_personne'];

    $sql1 = "UPDATE membre SET email_membre='$email',date_inscription='$date_inscription' WHERE id_membre='$id_membre'";
    $sql2 = "UPDATE personne SET nom='$nom',prenom='$prenom',telephone='$telephone' WHERE id_personne='$id_personne'";
    $sql3 = "UPDATE filliere SET nom_filliere='$filliere'WHERE id_filliere='$id_filliere'";
    $query1 = mysqli_query($con,$sql1);
    $query2 = mysqli_query($con,$sql2);
    $query3 = mysqli_query($con,$sql3);
    if(isset($query1)){
        if(isset($query2)){
            if(isset($query3)){
                header("location:membre.php");
            }
        }
    } else {
        echo "update Error";
    } 
?>