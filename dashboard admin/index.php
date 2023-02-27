<?php 
session_start();
require '../connexion.php';
if($_SESSION["connect"] != "oui"){
  header("location:../login admin/index.php");
  exit();
}

$sql1 = "SELECT COUNT(*) as nbr_demande_club FROM demande_club";
$sql2 = "SELECT COUNT(*) as nbr_club FROM club";
$sql3 = "SELECT COUNT(*) as nbr_demande_eve FROM demande_evenement";
$sql4 = "SELECT COUNT(*) as nbr_eve FROM evenement";
$req1 = mysqli_query($con,$sql1);
$req2 = mysqli_query($con,$sql2);
$req3 = mysqli_query($con,$sql3);
$req4 = mysqli_query($con,$sql4);
$rows1 = mysqli_fetch_assoc($req1);
$rows2 = mysqli_fetch_assoc($req2);
$rows3 = mysqli_fetch_assoc($req3);
$rows4 = mysqli_fetch_assoc($req4);
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
    <title>Dashboard Admin</title>
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
      <li><a class="app-menu__item active " href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="demande.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Creation des Clubs</span></a></li>
        <li><a class="app-menu__item " href="membre.php"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Nos Clubs</span></a></li>
        <li><a class="app-menu__item " href="evenements.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestion des Evenements</span></a></li>
        
        
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
              <h3>LES DEMANDE DE CREATION EN ATTENTE</h3>
              <p><span style="font-size: x-large; font-weight: bold;"><?php echo $rows1['nbr_demande_club']; ?></span></p>
            </div>
          </div>
        </div>
        <br>
        <div class="col-md-9 col-lg-4">
          <div class="widget-small info coloured-icon" style="height: 150px;"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h3>LE NOMBRE DES CLUBS</h3>
              <p><span style="font-size: x-large; font-weight: bold;"><?php echo $rows2['nbr_club']; ?></span></p>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-lg-4" >
          <div class="widget-small warning coloured-icon" style="height: 150px;"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h3>LES EVENEMENTS EN ATTENTES</h3>
              <p><span style="font-size: x-large; font-weight: bold;"><?php echo $rows3['nbr_demande_eve']; ?></span></p>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-lg-4">
          <div class="widget-small danger coloured-icon" style="height: 150px;"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h3> LES EVENEMENTS ACCEPTER</h3>
              <p><span style="font-size: x-large; font-weight: bold;"><?php echo $rows4['nbr_eve']; ?></span></p>
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
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      // var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      // var lineChart = new Chart(ctxl).Line(data);
      
      // var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      // var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
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