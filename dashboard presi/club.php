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
  $sql = "SELECT * FROM club where id_club = '$id_club'";
  $query = mysqli_query($con,$sql);
 
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
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
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
          <p class="app-sidebar__user-name">Badr Ezzaki</p>
          <p class="app-sidebar__user-designation">PRESIDENT DU CLUB</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item " href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="demande.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gestion des Demandes</span></a></li>
        <li><a class="app-menu__item" href="membre.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Gestion des Membres</span></a></li>
        <li><a class="app-menu__item " href="evenements.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestion des Evenements</span></a></li>
        
        
      </ul>
    </aside>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-laptop"></i> Modification des informations du Club</h1>
          <p> Modifier Profile de votre Club </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Profile</a></li>
        </ul>
      </div>
      
        <div class="row">
          
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Les Informations du Club</h3>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nom de notre Club</th>
                      <th>Description du Club</th>
                      <th>Logo </th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  while($rows = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                    <td><?php echo $rows['nom_club']; ?></td>
                    <td><?php echo $rows['description_club']; ?></td>
                    <td><?php echo $rows['logo_club']; ?></td>
                      <td class="text-right">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info badge-pill" data-toggle="modal" data-target="#Modal_modifier_<?php echo $id_club;?>">Modifier</button>
                      
                        <!-- Modal -->
                        <div class="modal fade" id="Modal_modifier_<?php echo $id_club;?>" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Modifier vos informations</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12 col-lg-12">
                                    <div class="tile">
                                      <h4 class="tile-title text-left">EVENEMENT INFORMATION</h4>
                                      <div class="tile-body text-left">
                                        <form action="modify_club.php" method="POST">
                                            <label class="control-label">Nom</label>
                                            <input class="form-control" type="text" name="nom_club" value="<?php echo $rows['nom_club'];?>">
                                            <label class="control-label">Description</label>
                                            <input class="form-control" type="text" name="description_club" value="<?php echo $rows['description_club'];?>">
                                            <label class="control-label">Logo du Club</label>
                                            <input class="form-control" type="file" name="logo_club" accept="image/*" >
                                           
                                      </div>
                                    </div>
                                  </div>  
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input type="hidden" name="id_club" value="<?php echo $id_club; ?>">
                                <button type="submit" class="btn btn-info" >Changer</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                              </div>
                              </form>
                            </div>  
                          </div>
                        </div>
                    </tr>
                    <?php } ?>
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