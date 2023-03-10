<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CampusESTG : Votre Espace Universitaire</title>
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

  <!--==========================  Header  ============================-->
  
  <?php require './header.php'; ?>
  
  <!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="img/zubi4.svg" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>CAMPUSESTG<br><span style="color: rgb(207, 48, 136);">Votre </span><br>Espace Universitaire</h2>
        <div>
          <a href="#clubs" class="btn-get-started scrollto">Trouver Ton Club</a>
          <a href="#services" class="btn-services scrollto">Nos Services</a>
        </div>
      </div>

    </div>
  </section>
  <!-- #intro -->

  <main id="main">

    <!--==========================
      c quoi campusestg Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3> <span style="color: rgb(207, 48, 136);">CAMPUS</span>ESTG qu'est ce que c'est ?</h3>
          <p>Votre espace Campus ?? distance, une approche inovative pour vous accompagner. </p>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <p>
                 Cette Application Web, est un travail r??alis?? par un group des ??tudaints de l'Ecole Sup??rieure de Technologies, en vue de faciliter la vie scolaire au sein de leur ??tablissement.<br>
                 Et parmi les plus grands facilit??s accord??es, On cite :
            </p>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-arrow-right"></i></div>
              <h4 class="title"><a >	Cr??ation d'un Club Universitaire </a></h4>
              <p class="description">cette t??che va ??tre effectu??e par les pr??sidents des nouveaux clubs(??tudiants). Il s'agit de remplir un formulaire en ligne qui va t'??tre envoyer automatiquement ?? l'administration.</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-arrow-right"></i></div>
              <h4 class="title"><a > S'inscrire ?? un Club Universitaire </a></h4>
              <p class="description">Maintenant, et ?? l'aide de votre site CAMPUSESTG, Vous pouvez faire une inscription ou rejoindre un club universitaire en ligne et ?? distance, sans Etre dans l'obligation d'Etre present physiquement.</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-arrow-right"></i></div>
              <h4 class="title"><a > Suivre Les actualit??s de Votre Club !  </a></h4>
              <p class="description">Pour la premier fois, vous pouvez maintenant suivre les actualit??s de Vos Clubs pr??f??r??s facilement et ?? la fois.</p>
            </div>
          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            <img src="img/about-img.svg" class="img-fluid" alt="">
          </div>
        </div>

        <div class="row about-extra">
          <div class="col-lg-6 wow fadeInUp">
            <img src="img/8747.svg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <p>
              &nbsp; &#160; <strong>EST</strong> Guelmim contient plusieurs Clubs de diff??rentes sp??cialit??s. Ces clubs d??sirant effectuer plusieurs activit??s au cour de l???ann??e universitaire, Chaque club doit faire une inscription pour les nouveaux membres par une formulaire et doit faire une demande de r??servation et affichage des ??v??nements, ce qui n??cessite une gestion manuelle.  
            <br>
            &nbsp; &#160; <strong>Pour</strong> Chaque Club, le responsable doit g??rer toutes les inscriptions et approuver les demandes d???inscription, et doit r??server la date des formations et des ??v??nements, alors le responsable ne dispose d???aucun outil informatique qui le permettent la gestion de tous ces documents. 
            <br>
            &nbsp; &#160; <strong>Pour</strong> prendre une r??servation d???un ??v??nement le responsable doit, toujours, ??crire une demande sur papier ?? l???administration et attend une longue dur??e pour la r??ponse. 
            </p>
          </div>          
        </div>

      </div>
    </section><!-- #about -->
    <!--==========================
    Events
    ============================-->
    <section id="testimonials" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Les Evenements </h3>
          <p>Vous trouverez ici les derniers 8 Evenements Anonc??s sur <span style="color: rgb(207, 48, 136);">CAMPUS</span>ESTG, Pour voir tout les Events, cliquez sur "Voir Tout" .</p>
        </header>
              <?php 
               require '../connexion.php';
               $requete="SELECT * FROM `evenement` ORDER BY date_evenement DESC limit 0,8";
               $query = mysqli_query($con, $requete);
               
               ?>
        <div class="row justify-content-center">
          <div class="col-lg-12">
         
            <div class="owl-carousel testimonials-carousel wow fadeInUp">
 <!-- -------------------------- PHP------------>
 <?php while($rows=mysqli_fetch_assoc($query)){ ?>
                <div class="testimonial-item" >
                <img src="../dashboard presi/<?php echo $rows['logo_evenement'] ?>" class="testimonial-img"  alt="">
                <h3><?php echo $rows['title_evenement'] ?></h3>
                <h4>le <?php echo $rows['date_evenement'] ?> ?? <?php echo $rows['lieu_evenement'] ?></h4>
                <h5 style="                overflow: hidden;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 5;
                                            -webkit-box-orient: vertical; ">
                <?php echo $rows['description_evenement'] ?>
               </h5>
              </div>

              <?php } ?>
             </div>
             
          </div>
          
        </div>
        
      </div>
      <div class=" row justify-content-center actuality">
       <a href="Events.php">Voir Tout les Articles</a>
      </div>
    </section>
    <!-- #actualit??s -->
     <!--==========================
     Espaces
    ============================-->
   
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Espaces</h3>
          <p> Parmi ces trois Espaces, Veuillez rejoindre l'Espace qui vous correspond. </p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <div class="card-body">
                <h5 class="card-title">Espace Etudiant</h5> <br>
                <p class="card-text">Espace Etudiant,si vous avez une id??e pour un nouveau Club, ou vous voulez rejoindre un Club ??xistant  .</p>
                <a href="../registre/index.php" class="readmore">Cr??er un Club </a> <br> 
                <a href="../Demande-Inscription/index.php" class="readmore">S'inscrire ?? un Club</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <div class="card-body">
                <h5 class="card-title">Espace Pr??sident d'un Club</h5>
                <p class="card-text">Espace Pr??sident du Club, est r??s??rv?? pour le pr??sident ou bien le Repr??sentant du Club.</p>
                <a href="../login president/index.php" class="readmore"> Connexion </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <div class="card-body">
                <h5 class="card-title">Espace G??rant</h5> <br>
                <p class="card-text">Espace G??rant, est r??s??rv?? pour le Repr??sentant de l'administration scolaire . </p>
                <a href="../login admin/index.php" class="readmore">Connexion</a>
              </div>
            </div>
          </div>

        </div>    
      </div>
    </section>

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Services</h3>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-compose-outline" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">S'inscrire ?? Un Club</a></h4>
              <p class="description">&nbsp; &#160; Vous Pouvez maintenant rejoindre un Club universitaire facilement en remplissant une demande en ligne Adress??e au Responsable du Club choisi. </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-lightbulb-outline" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">Cr??er Un Club</a></h4>
              <p class="description"> &nbsp; &#160; Vous Pouvez maintenant Cr??er un Club universitaire facilement en remplissant une formule en ligne Adress??e au Responsable Scolarit??.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-calendar-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">D??couvrir Les Prochains Events</a></h4>
              <p class="description"> &nbsp; &#160; Vous Pouvez maintenant Etre ?? jour et ne plus rater aucun Evenement organis?? au sein de l'Ecole Superieure de Technologie -Guelmim-, par Nos Clubs.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-paper-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">D??couvrir Nos Clubs</a></h4>
              <p class="description">&nbsp; &#160;A distance, Et en quelque cliques, Vous pouvez maintenant Decouvrir tout Nos Clubs universitaires actives au Campus de l'Ecole Sup??rieure de Technologie Guelmim.  </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #services -->
     <!--==========================
      clubs Section
    ============================-->
    <section id="clubs" class="section-bg">

      <div class="container">

        <div class="section-header">
          <h3>Nos CLUBS</h3>
          <p>L???<strong>EST de Guelmim</strong> a la fiert?? de compter +12 Clubs ??tudiants qui veillent ?? participer activement ?? l???animation de leur campus et contribuent au rayonnement et au d??veloppement de leur communaut??.</p>
        </div>

        <div class="row no-gutters clubs-wrap clearfix wow fadeInUp">
          <?php 
          require '../connexion.php';
          $requete = "SELECT * FROM club";
          $query= mysqli_query($con,$requete);
          while($rows=mysqli_fetch_assoc($query)){ ?>


          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <a href=""><img src="../registre/<?php echo $rows['logo_club']; ?>" class="img-fluid" alt=""  title="<?php echo $rows['nom_club'];?>"></a>
            </div>
          </div>
          <?php }?>
        </div>
         <div class="text-center btnclubs">
          <a href="../NOS_CLUB/clubs.php" style="margin-top: 30px;
                                            background: #007bff;
                                            border: 0;
                                            border-radius: 20px;
                                            padding: 8px 30px;
                                            color: #fff;
                                            transition: 0.3s;
                                            width: 130px;
                                            text-align:center; 
                                            :hover {
                                            background: #0067d5;
                                            cursor: pointer;
                                             " >Tout Voir</a> 
         </div>
      </div>
    </section>
   
    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Team</h3>
          <p>La plateform <span style="color: rgb(207, 48, 136);">CAMPUS</span>ESTG est r??alis??e comme un Projet de fin d'??tudes en 2021 par des ??tudiants d'informatique .</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Monir Chelh</h4>
                  <span>Developpeur Web</span>
                  <div class="social">
                    <a href="https://www.twitter.com/monirchelh" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/mconr" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus" target="_blank"></i></a>
                    <a href="https://www.linkedin.com/in/monir-chelh-964880188/" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="img/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Badr Ezzaki</h4>
                  <span>Developpeur Web</span>
                  <div class="social">
                    <a href="" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <a href="" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Wissal Haji</h4>
                  <span>Developpeuse Web</span>
                  <div class="social">
                    <a href="" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <a href="" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="img/team-5.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Yousef Errachidi</h4>
                  <span>Chef de Projet</span>
                  <div class="social">
                    <a href="" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <a href="" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

   
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Localisation</h3>
        </div>

        <div class=" wow fadeInUp ">

          <div class="row-lg-4" style="width:60%;height:auto;margin:0 auto;">
            <div class="map mb-4 mb-lg-0">
                   <video src="img/Zoom ESTG.mp4" type="video/mp4" loop autoplay controls width="100%" >Sorry, your browser doesn't support embedded videos.</video>
            </div>
          </div>
          <div class="row-lg-4" style="width:60%;height:auto;margin: 5px auto 5px 23%;">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p> Av Abou Maachar Al Balkhi <br>
                  B.P 1317, GUELMIM, MAROC</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>Estg@uiz.ac.ma</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>05.28.77.02.73</p>
              </div>
            </div>
          </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================  Footer  ============================-->
  <?php require './footer.php'; ?>

  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
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
