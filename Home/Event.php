<?php
               require '../connexion.php';
               $id = $_GET["idlien"];
               $requet = "SELECT * FROM `evenement` WHERE id_evenement = $id ";
               $query = mysqli_query($con,$requet);
               $rows=mysqli_fetch_assoc($query);
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CampusESTG : Les Events</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
      
        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/logo.png" rel="apple-touch-icon">
      
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
      
        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
        <!-- Libraries CSS Files -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
      
        <!-- Main Stylesheet File -->
        <link href="css/style.css" rel="stylesheet">
      
        
      </head>
      
      <body>
      
        <!--==========================
        Header
        ============================-->
        <?php require './header.php';?>
        <!-- #header -->
        
    <!--==========================
      Events Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">
        <br><br><br><br>
        <!--header class="section-header">
          <h3>Les Evénements</h3>
          <p>Vous trouverez ici tout les Events publiées sur <span style="color: rgb(207, 48, 136);">CAMPUS</span>ESTG par les Clubs.</p>
        </header-->
            <div class="row">      

               
          <div class="col-md-12 col-lg-12 wow bounceInUp" data-wow-duration="1.4s" >
            <div class="box" style="display:flex; width:1100px;">

         <div id="portfolio" class="" style="width:300px; box-shadow:0 0 0 0 ;">
           <div class=" portfolio-item filter-web" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="../dashboard presi/<?PHP echo $rows['logo_evenement']?>" class="" style="height:400px; width=400px;" alt="">
              <div class="portfolio-info">               
                  <a href="../dashboard presi/<?PHP echo $rows['logo_evenement']?>" class="link-preview" data-lightbox="portfolio" data-title="Image" title="Preview"><i class="ion ion-eye"></i></a>
              </div>
              
            </div>
          </div>
                    <!--img src="<?PHP// echo $rows['urlimage']?>"  alt="LOGO" style="height:200px; width=200px;"-->
               </div>
          
               <div style="margin-left:120px; text-position:center;" >
                 <h3><?php echo $rows['title_evenement'] ?></h3></a>
                 <?php 
                  require '../connexion.php';
                  $id_club = $rows['id_club'];
                  $req = "SELECT * FROM club where id_club ='$id_club'";
                  $q = mysqli_query($con,$req);
                  $row = mysqli_fetch_assoc($q);
                 ?>
               <h6>le <?php echo $rows['date_evenement'] ?> à <?php echo $rows['lieu_evenement'] ?> <br>  Publié Par : <a href="../NOS_CLUB/profile.php?idlien=<?php echo $id_club; ?>">
               <?php 
                  echo $row['nom_club']; 
               ?></a>  </h6>
              <p class="description" ><?php echo $rows['description_evenement'] ?></p>
               </div>
                
            </div>
            <div  class="row justify-content-center" style="">
                <a href="Events.php" style=" 
                                            margin-top: 30px;
                                            background: #007bff;
                                            border: 0;
                                            border-radius: 20px;
                                            padding: 8px 30px;
                                            color: #fff;
                                            transition: 0.3s;
                                            width: 130px;
                                            text-align:center;" > Retour </a>
                </div>
          </div>

          <?php// } ?>
         
        </div>
    </div>

        </div>



                
      </div>
    </section><!-- #services -->
     <!--==========================
      clubs Section
    ============================-->

  <!--  Footer  ============================-->
  <?php require './footer.php';?>
  <!-- #footer -->
          <!----------------------------aaaaaaaaaaaaadddddddddddddddddddddddddddddddddddddddddddd------------------------->
          
          <!-- Uncomment below i you want to use a preloader -->
           <!-- <img src="img/Prelaoder.gif" class="preldr container col-lg-5" id="preloader">      -->
        
          <!-- JavaScript Libraries -->
          <script src="lib/jquery/jquery.min.js"></script>
          <script src="lib/jquery/jquery-migrate.min.js"></script>
          <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="lib/easing/easing.min.js"></script>
          <script src="lib/mobile-nav/mobile-nav.js"></script>
          <script src="lib/wow/wow.min.js"></script>
          <script src="lib/waypoints/waypoints.min.js"></script>
          <script src="lib/counterup/counterup.min.js"></script>
          <script src="lib/owlcarousel/owl.carousel.min.js"></script>
          <script src="lib/isotope/isotope.pkgd.min.js"></script>
          <script src="lib/lightbox/js/lightbox.min.js"></script>
          <!-- Contact Form JavaScript File -->
          <script src="contactform/contactform.js"></script>
        
          <!-- Template Main Javascript File -->
          <script src="js/main.js"></script>
</body>
</html>