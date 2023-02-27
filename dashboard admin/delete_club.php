<?php
require '../connexion.php';
$id = $_POST['id'];
$sql="DELETE FROM evenement where id_club = '$id'";
$query = mysqli_query($con,$sql);
if(isset($query)){
   $sql = "DELETE FROM demande_evenement where id_club = '$id'";
   $query = mysqli_query($con,$sql);
   if(isset($query)){
      $sql = "DELETE FROM demande_inscription where id_club = '$id'";
      $query = mysqli_query($con,$sql);
      if(isset($query)){
         $sql = "SELECT * FROM appartient where id_club = '$id'";
         $query = mysqli_query($con,$sql);
         while ($rows = mysqli_fetch_assoc($query)){
            $id_membre = $rows['id_membre'];
            $req = "DELETE FROM appartient where id_membre = '$id_membre'";
            $q = mysqli_query($con,$req);
            if(isset($q)){
               $req = "SELECT * FROM membre where id_membre = '$id_membre'";
               $q = mysqli_query($con,$req);
               $row = mysqli_fetch_assoc($q);
               $id_personne = $row['id_personne'];
               $req = "DELETE FROM membre where id_membre = '$id_membre'";
               $q = mysqli_query($con,$req);
               if(isset($q)){
                  $req = "SELECT * FROM personne where id_personne = '$id_personne'";
                  $q = mysqli_query($con,$req);
                  $row = mysqli_fetch_assoc($q);
                  $id_filliere = $row['id_filliere'];
                  $req = "DELETE FROM personne where id_personne = '$id_personne'";
                  $q = mysqli_query($con,$req);
                  if(isset($q)){
                     $req = "DELETE FROM filliere where id_filliere = '$id_filliere'";
                     $q = mysqli_query($con,$req);
                  }
               }
            }
         }
         $sql = "SELECT * FROM club where id_club = '$id'";
         $query = mysqli_query($con,$sql);
         $rows = mysqli_fetch_assoc($query);
         $id_president = $rows['id_president'];
         $sql = "DELETE FROM club where id_club = '$id'";
         $query = mysqli_query($con,$sql);
         if(isset($query)){
            $sql = "SELECT * FROM president where id_president = '$id_president'";
            $query = mysqli_query($con,$sql);
            $rows = mysqli_fetch_assoc($query);
            $id_personne = $rows['id_personne'];
            $sql = "DELETE FROM president where id_president = '$id_president'";
            $query = mysqli_query($con,$sql);
            if(isset($query)){
               $sql = "SELECT * FROM personne where id_personne = '$id_personne'";
               $query = mysqli_query($con,$sql);
               $rows = mysqli_fetch_assoc($query);
               $id_filliere = $rows['id_filliere'];
               $sql = "DELETE FROM personne where id_personne = '$id_personne'";
               $query = mysqli_query($con,$sql);
               if(isset($query)){
                  $sql = "DELETE FROM filliere where id_filliere = '$id_filliere'";
                  $query = mysqli_query($con,$sql);
                  if(isset($query)){
                     header("location:membre.php");
                  }
               }
            }
         }
      }
   }
}

?>