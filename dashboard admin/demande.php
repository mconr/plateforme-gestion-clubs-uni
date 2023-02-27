<?php
session_start();
if($_SESSION["connect"] != "oui"){
  header("location:../login admin/index.php");
  exit();
}
require "../connexion.php";
$sql=" SELECT * from demande_club ";
$query=mysqli_query($con,$sql);

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
    <title>Gestion des Club</title>
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
            <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <li><a class="app-menu__item active" href="demande.php" data-toggle="treeview"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Creation des Clubs</span></a></li>
            <li><a class="app-menu__item" href="membre.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Nos Clubs</span></a></li>
            <li><a class="app-menu__item" href="evenements.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestion des Evenements</span></a></li>
            
          </ul>
        </aside>
    <!-- Sidebar menu Fin-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Gestion des Demandes</h1>
          <p>Gestion des demandes de crèation des clubs </p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="#">Gestion des Demandes</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
               <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Nom du Club</th>
                    <th>Description</th>
                    <th>Motivation</th>
                    <th>Logo</th>
                    <th>Decision</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                  while ($rows = mysqli_fetch_assoc($query)){
                      $id=$rows['id_demande_club'];
                    echo "<tr>";
                   echo "<td> ".$rows['nom_club']." </td>";
                   echo "<td> ".$rows['description']." </td>";
                   echo "<td> ".$rows['motivation']." </td>";
                   echo "<td> ".$rows['logo']." </td>";
                  
                    ?>
                    <td class="text-right">
                   
                         <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info badge-pill" data-toggle="modal" data-target="#myModal_<?php echo $id;?>" >Accepter</button>
                         <!-- Modal -->
                      <div class="modal fade" id="myModal_<?php echo $id;?>" role="dialog">
                        <div class="modal-dialog"> 
                             <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                              <p class="text-left">Confirmer votre Acceptation</p>
                            </div>
                            <div class="modal-footer">

                              <form method="post" action= "dmdaccepter.php">
                              <input type="hidden" name="id" value="<?php echo $id; ?>">
                              <button type="submit" class="btn btn-info">Confirmer </button>
                            
                              </form>

                              <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                            </div>
                          </div> 
                        </div> 
                      </div> 
                        
                         <!-- Trigger the modal with a button -->
                        <button  type="button" class="btn btn-danger badge-pill" data-toggle="modal" data-target="#Modal_supprimer<?php echo $id;?>  ">Refuser</button>
                        
                       
                        
                        <!-- Modal -->
                        <div class="modal fade" id="Modal_supprimer<?php echo $id;?>" role="dialog">
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
                              <form method="post" action="delete_demande.php">
                              <input type="hidden" name="id" value="<?php echo $id; ?>">
                              <button type="submit" class="btn btn-info" >Oui</button>
                              </form>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                              </div>
                            </div>
                          </div>
                        </div>
                     </td>
                     </tr>
                     <?php } ?> 
                </tbody> 
              </table> 
            </div>
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
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