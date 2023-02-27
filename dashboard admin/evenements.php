<?php
session_start();
if($_SESSION["connect"] != "oui"){
  header("location:../login admin/index.php");
  exit();
}
require "../connexion.php";
$requet=" SELECT * FROM demande_evenement";
$query=mysqli_query($con,$requet);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
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
    <header class="app-header"><a class="app-header__logo" href="index.html" style="font-family: 'Courier New', Courier, monospace;">ESTG CLUBS</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- User Menu-->
      <ul class="app-nav">
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"> Admin</i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="../login admin/deconnexion.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">Administration</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item " href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="demande.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Creation des Clubs</span></a></li>
        <li><a class="app-menu__item" href="membre.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Nos Clubs</span></a></li>
        <li><a class="app-menu__item active " href="evenements.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestion des Evenements</span></a></li>
        
        
      </ul>
    </aside>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-laptop"></i> Gestion des demandes d'évenements</h1>
          <p> Gérer les évenements </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Evenements</a></li>
        </ul>
      </div>
        <div class="row">
          
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Les Demandes Actuelles</h3>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                     
                      <th>Nom du Club</th>
                      <th>Nom de l'evenement</th>
                      <th>Description</th>
                      <th>date d'evenement</th>
                      <th>lieu</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $i = 0;
                    while ($rows = mysqli_fetch_assoc($query)) {
                      $id=$rows['id_demande_eve'];
                      $id_club=$rows['id_club'];
                      $sql = "SELECT * FROM club where id_club='$id_club'";
                      $querys=mysqli_query($con,$sql);
                      $row = mysqli_fetch_assoc($querys);
                      $nom_club= $row['nom_club'];
                      echo "<td> ".$i++." </td>";
                      echo "<td> ".$nom_club." </td>";
                      echo "<td> ".$rows['nom_eve']." </td>";
                      echo "<td> ".$rows['description_eve']." </td>";
                      echo "<td> ".$rows['date_eve']." </td>";
                      echo "<td> ".$rows['lieu_eve']." </td>";
                  ?>
                      <td class="text-right">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info badge-pill" data-toggle="modal" data-target="#Modal_modifier<?php echo $id; ?>">Modifier</button>
                      
                        <!-- Modal -->
                        <div class="modal fade" id="Modal_modifier<?php echo $id; ?>" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Modifier les informations de localisation</h4>
                              </div>
                              <div class="modal-body text-left">
                                <div class="row">
                                  <div class="col-md-12 col-lg-12">
                                    <div class="tile">
                                      <h4 class="tile-title">EVENEMENT INFORMATION</h4>
                                      <div class="tile-body">
                                        <form action="eve_modifier.php" method="POST">
                                          <div class="form-group">
                                            <label class="control-label">Date de l'evenement</label>
                                            <input class="form-control"name="date_eve" type="date" placeholder="Modifier la date de l'evenement" value="<?php echo $rows["date_eve"];?>">
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label">Lieu de l'evenement </label>
                                            <input class="form-control" name="lieu_eve" type="text" placeholder="Modifier le lieu de l'evenement" value="<?php echo $rows["lieu_eve"];?>">
                                          </div>
                                      </div> 
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                                  <button type="submit" class="btn btn-info" >Changer</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                                  </form>
                              </div>
                            </div> 
                          </div>
                        </div>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger badge-pill" data-toggle="modal" data-target="#Modal_supprimer<?php echo $id;?>">Supprimer</button>
                      
                        <!-- Modal -->
                        <div class="modal fade" id="Modal_supprimer<?php echo $id;?>" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Attention</h4>
                              </div>
                              <div class="modal-body">
                                <p>Est ce que vous etes sur ?</p>
                              </div>
                              <div class="modal-footer">
                                <form method="post" action= "eve_refuser.php">
                                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                                  <button type="submit" class="btn btn-info" >Oui</button>
                                </form>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <!-- boutton accepter -->
                      <button type="button" class="btn btn-success badge-pill" data-toggle="modal" data-target="#Modal_accepter<?php echo $id;?>">accepter</button>
                      <!-- Modal -->
                      <div class="modal fade" id="Modal_accepter<?php echo $id;?>" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                              <p>Confirmer votre Acceptation</p>
                            </div>
                            <div class="modal-footer">
                            <form method="POST" action= "eve_accepter.php">
                              <input type="hidden" name="id" value="<?php echo $id; ?>">
                              <button type="submit" class="btn btn-info" >Confirmer</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                     </td>
                     </tr>
                      <?php } ?> 
                    </tr>
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
    
  </body>
</html>