<?php 
session_start();
if($_SESSION["autorise"] != "oui"){
  header("location:../login president/index.php");
  exit();
} 

require '../connexion.php';
$sql = "SELECT * FROM club";
$query = mysqli_query($con,$sql);
while ($rows = mysqli_fetch_assoc($query)) {
  if($_SESSION["id"] == $rows['id_club']){
    $id_club = $rows['id_club'];
    break;
  } 
}

  $sql = "SELECT * FROM club 
  INNER JOIN president ON club.id_president = president.id_president
  INNER JOIN personne ON  president.id_personne = personne.id_personne
  where id_club = '$id_club'";
  $query = mysqli_query($con,$sql);
  $rows = mysqli_fetch_assoc($query);
  $nom_club = $rows['nom_club'];
  $nom_president = $rows['nom'];
  $prenom_president = $rows['prenom'];
  
  $sql1 = "SELECT COUNT(*) as nbr_evenement FROM `evenement` where id_club = '$id_club'";
  $sql2 = "SELECT COUNT(*) as nbr_demande_ins FROM `demande_inscription` where id_club = '$id_club'";
  $sql3 = "SELECT COUNT(*) as nbr_membre FROM `appartient` where id_club = '$id_club'";
  $sql4 = "SELECT COUNT(*) as nbr_demande_eve FROM `demande_evenement` where id_club = '$id_club'";
  $query1 = mysqli_query($con,$sql1);
  $query2 = mysqli_query($con,$sql2);
  $query3 = mysqli_query($con,$sql3);
  $query4 = mysqli_query($con,$sql4);
  $rows1 = mysqli_fetch_array($query1);
  $rows2 = mysqli_fetch_array($query2);
  $rows3 = mysqli_fetch_array($query3);
  $rows4 = mysqli_fetch_array($query4);
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
    <title>Dashboard President</title>
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
    <header class="app-header"><a class="app-header__logo" href="index.php" style="font-family: 'Courier New', Courier, monospace;"><?php echo $nom_club; ?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- User Menu-->
      <ul class="app-nav">
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"> club</i></a>
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
        <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="demande.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gestion des Demandes</span></a></li>
        <li><a class="app-menu__item" href="membre.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gestion des Membres</span></a></li>
        <li><a class="app-menu__item" href="evenements.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestion des Evenements</span></a></li>
        
        
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-9 col-lg-4">
          <div class="widget-small primary coloured-icon" style="height: 150px;"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h3>LES DEMANDE EN ATTENTE</h3>
              <p><span style="font-size: x-large; font-weight: bold;"><?php echo $rows2['nbr_demande_ins'];?>
              </span></p>
            </div>
          </div>
        </div>
        <br>
        <div class="col-md-9 col-lg-4">
          <div class="widget-small info coloured-icon" style="height: 150px;"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h3>LE NOMBRE DES MEMBRES</h3>
              <p><span style="font-size: x-large; font-weight: bold;">
              <?php echo $rows3['nbr_membre'];?>
              </span></p>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-lg-4">
          <div class="widget-small warning coloured-icon" style="height: 150px;"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h3> LES EVENEMENTS EN ATTENTE</h3>
              <p><span style="font-size: x-large; font-weight: bold;">
               <?php echo $rows4['nbr_demande_eve'];?> 
              </span></p>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-lg-4">
          <div class="widget-small danger coloured-icon" style="height: 150px;"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h3> LES EVENEMENTS EFFECTUER</h3>
              <p><span style="font-size: x-large; font-weight: bold;">
               <?php echo $rows1['nbr_evenement'];?> 
              </span></p>
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
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    
    <!-- Google analytics script-->
    
  </body>
</html>