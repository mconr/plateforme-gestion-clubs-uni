<?php 
require '../connexion.php';
session_start();
if($_SESSION["autorise"] != "oui"){
  header("location:../login president/index.php");
  exit();
} 


$sql = "SELECT * FROM club";
$query = mysqli_query($con,$sql);
while ($rows = mysqli_fetch_assoc($query)) {
  if($_SESSION["id"] == $rows['id_club']){
    $id_club = $rows['id_club'];
    break;
  } 
}

$i=0;
  $sql = "SELECT * FROM club 
  INNER JOIN president ON club.id_president = president.id_president
  INNER JOIN personne ON  president.id_personne = personne.id_personne
  where id_club = '$id_club'";
  $query = mysqli_query($con,$sql);
  $rows = mysqli_fetch_assoc($query);
  $nom_club = $rows['nom_club'];
  $nom_president = $rows['nom'];
  $prenom_president = $rows['prenom'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Open Graph Meta-->
    <link href="../Home/img/favicon.png" rel="icon">
    <link href="../Home/img/logo.png" rel="apple-touch-icon">
    <title>Gestion des Evenements</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html" style="font-family: 'Courier New', Courier, monospace;"><?php echo $nom_club; ?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- User Menu-->
      <ul class="app-nav">
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="club.php"><i class="fa fa-sign-out fa-lg"></i> Modifier Profile</a></li>
          <li><a class="dropdown-item" href="../login president/deconnexion.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>

          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
              <p class="app-sidebar__user-designation">Bonjour</p>
              <p class="app-sidebar__user-name">Mr. <?php echo($prenom_president.' '.$nom_president); ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item " href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="demande.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gestion des Demandes</span></a></li>
        <li><a class="app-menu__item" href="membre.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gestion des Membres</span></a></li>
        <li><a class="app-menu__item active " href="evenements.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestion des Evenements</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-laptop"></i> Gestion des évenements</h1>
          <p> Gérer tous vos évenements </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Evenements</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Ajouter un évenement</h3>
              <p>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-primary icon-btn " style="text-align: right;margin: 0 0 0 650px;" data-toggle="modal" data-target="#Modal-ajouter_<?php echo $id_club;?>"><i class="fa fa-plus"></i>Ajouter un évenement</button>
                <!-- Modal -->
                <div class="modal fade" id="Modal-ajouter_<?php echo $id_club;?>" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Remplir les informations d'evenements</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12 col-lg-12">
                            <div class="tile">
                              <h4 class="tile-title">EVENEMENT INFORMATION</h4>
                              <div class="tile-body">
                                <form action="insert_eve.php" method="POST" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label class="control-label">Titre de l'evenement</label>
                                    <input class="form-control" type="text" name="titre" placeholder="Entrer le titre">
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Date d'evenement</label>
                                    <input class="form-control" type="date" name="dates" placeholder="Entrer la date d'evenement">
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Lieu de l'evenement</label>
                                    <input class="form-control" type="text" name="lieu" placeholder="Entrer le lieu">
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" rows="4" name="description" placeholder="Entrer votre Description"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Photo de l'evenement</label>
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" accept="image/*" />
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="id_club" value="<?php echo $id_club;?>">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Créer</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </p>
            </div>
            <div class="tile-body">
              <b>Condition d'acceptation d'un  evenements</b><br>
              Lorsque vour ajouter un évenements ,il faut attendre la réponse du président !!
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Les Evenements Actuelles</h3>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nom de l'evenement</th>
                      <th>Description</th>
                      <th>date d'evenement</th>
                      <th>lieu d'evenement</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                    $sql ="SELECT * FROM evenement where id_club='$id_club'";
                    $querys =mysqli_query($con,$sql);
                    while ($rows = mysqli_fetch_assoc($querys)) {
                      $id_evenement = $rows['id_evenement'];
                    echo "<tr>";
                    echo '<td>'.$i++.'</td>';
                    echo '<td>'.$rows["title_evenement"].'</td>';
                    echo '<td>'.$rows["description_evenement"].'</td>';
                    echo '<td>'.$rows["date_evenement"].'</td>';
                    echo '<td>'.$rows["lieu_evenement"].'</td>';
                    ?>
                    <td class="text-right">
                         <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info badge-pill" data-toggle="modal" data-target="#ModalModifier_<?php echo $id_evenement;?>">Modifer</button>
                         <!-- Modal -->
                      <div class="modal fade" id="ModalModifier_<?php echo $id_evenement;?>" role="dialog">
                        <div class="modal-dialog"> 
                             <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">EVENEMENT INFORMATION</h4>
                            </div>
                            <div class="modal-body">
                            <?php 
                                  $requet = "SELECT * FROM `evenement` where id_evenement='$id_evenement'";
                                  $q = mysqli_query($con,$requet);
                                  $row = mysqli_fetch_assoc($q);
                                  $id_club = $row['id_club'];
                                ?>
                                  <div class="form-group text-left" >
                                <form action="modify_eve.php" method="POST">
                                    <label class="control-label ">Titre Evenement</label>
                                    <input type="text" class="form-control" name="titre_eve" value="<?php echo $row['title_evenement'] ?>" >
                                    <label class="control-label ">Date Evenemet</label>
                                    <input type="date" class="form-control" name="date_eve" value="<?php echo $row['date_evenement'] ?>" >
                                    <label class="control-label ">Lieu Evenement</label>
                                    <input type="text" class="form-control" name="lieu_eve" value="<?php echo $row['lieu_evenement'] ?>" > 
                                    <label class="control-label ">Description d'Evenement</label>
                                    <textarea  class="form-control" rows="4" placeholder="Enter your Description" name="description_eve" ><?php echo $row['description_evenement'] ?></textarea>
                                    <label class="control-label ">Photo d'Evenement</label>
                                    <input class="form-control" type="file" name="photo_eve" accept="image/*">
                                  </div>
                            </div>
                            <div class="modal-footer">
                                  <input type="hidden" name="id_evenement" value="<?php echo $id_evenement;?>">
                                  <input type="submit" class="btn btn-info" value="Changer">
                              </form>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                            </div>
                          </div> 
                        </div> 
                      </div> 
                         <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger badge-pill" data-toggle="modal" data-target="#Modal_supprimer_<?php echo $id_evenement;?>">Supprimer</button>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal_supprimer_<?php echo $id_evenement;?>" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Attention</h4>
                              </div>
                              <div class="modal-body">
                                <p class="text-left">Est ce que vous etes sur ?</p>
                              </div>
                              <div class="modal-footer">
                              <form action="delete_eve.php" method="POST">
                                <input type="hidden" name="id_evenement" value ="<?php echo $id_evenement;?>">
                                <button type="submit" class="btn btn-info" >Oui</button>
                              </form>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                              </div>
                            </div>
                          </div>
                        </div>
                     </td>
                     </tr>
                     <?php  } ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>