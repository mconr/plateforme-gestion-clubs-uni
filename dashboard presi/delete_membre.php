<?php 
    require '../connexion.php';
    $id_membre = $_POST['id_membre'];
    $id_filliere = $_POST['id_filliere'];
    $id_personne = $_POST['id_personne'];
    echo $id_filliere;
    echo $id_membre;
    echo $id_personne;
    $sql1="DELETE FROM appartient where id_membre='$id_membre' ";
    $sql2="DELETE FROM membre where id_membre='$id_membre' ";
    $sql3="DELETE FROM personne where id_personne='$id_personne'";
    $sql4="DELETE FROM filliere where id_filliere='$id_filliere'";
    $query1 = mysqli_query($con,$sql1);
    $query2 = mysqli_query($con,$sql2);
    $query3 = mysqli_query($con,$sql3);
    $query4 = mysqli_query($con,$sql4);
    if(isset($query1)){
        if(isset($query2)){
            if(isset($query3)){
                if(isset($query4)){
                    header("location:membre.php");
                }
            }else {
                echo "<h1> ERROR DE SUPRESSION </h1>";
            }
        }else {
            echo "<h1> ERROR DE SUPRESSION </h1>";
        }
        
    } else {
        echo "<h1> ERROR DE SUPRESSION </h1>";
    }
?>