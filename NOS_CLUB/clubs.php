<?php
                    // On détermine sur quelle page on se trouve
                    if(isset($_GET['page']) && !empty($_GET['page'])){
                        $currentPage = (int) strip_tags($_GET['page']);
                    }else{
                        $currentPage = 1;
                    }
                    // On se connecte à là base de données
                    require_once('connexion2.php');

                    // On détermine le nombre total d'articles
                    $sql = 'SELECT COUNT(*) AS nb_articles FROM `club`;';

                    // On prépare la requête
                    $query = $db->prepare($sql);

                    // On exécute
                    $query->execute();

                    // On récupère le nombre d'articles
                    $result = $query->fetch();

                    $nbArticles = (int) $result['nb_articles'];

                    // On détermine le nombre d'articles par page
                    $parPage = 3;

                    // On calcule le nombre de pages total
                    $pages = ceil($nbArticles / $parPage);

                    // Calcul du 1er article de la page
                    $premier = ($currentPage * $parPage) - $parPage;

                    $sql = 'SELECT * FROM `club`
                              ORDER BY Id_club DESC LIMIT :premier, :parpage;';

                    // On prépare la requête
                    $query = $db->prepare($sql);

                    $query->bindValue(':premier', $premier, PDO::PARAM_INT);
                    $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

                    // On exécute
                    $query->execute();

                    // On récupère les valeurs dans un tableau associatif
                    $articles = $query->fetchAll(PDO::FETCH_ASSOC);

                    $db=null;
                    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CampusESTG : Votre Espace Universitaire</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../Home/img/favicon.png" rel="icon">
  <link href="../Home/img/logo.png" rel="apple-touch-icon">

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
      
       <!--==========================  Header   ============================-->
        
       <?php require '../Home/header.php'; ?>
        <!-- #header -->
        
    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container3">
        <br><br><br><br>
        <header class="section-header">
        <h3 style="font-weight:bold;">Nos Club</h3 style="font-weight:bold;">
          <p>Bienvenue dans notre site,Notre établissement vous offre l'accés à plusieurs clubs,afin de promouvoir et de développer les talents,
          les connaissances et les compétences des élèves. <span style="color: rgb(207, 48, 136);">CAMPUS</span>ESTG pour les Clubs.</p>
        </header>
       
             
<div class="ab" style="text-align:center"; >
<div class="abc">
        <div class="col">
               <?php
                   foreach($articles as $article){
                     ?>
              <a href="<?php $idlien=$article['id_club']; echo"profile.php?idlien=".$idlien."";?>" style="color:rgb(12, 12, 12)";>
                     <div class="card1"  style="cursor:pointer"> 
                       
                       <img src="../registre/<?php 
                       require '../connexion.php';
                        $requet = "SELECT * FROM club where id_club = '$idlien'";
                        $q = mysqli_query($con,$requet);
                        $rows = mysqli_fetch_assoc($q);
                        echo $rows['logo_club']; 
                       ?>" class="img-thumbnail"  alt="LOGO" style="height:200px; width=200px;">
                       <?php
                       echo"<h3>".$article['nom_club']."</h3>";
                       ?>
                     </div>
                   </div>
                     <?php
                   }
                     ?>
                 </a>
           </div>
    </div>
                  <nav>
                    <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="clubs.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="clubs.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="clubs.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>
        </div>
               </div>

        </div>



                
      </div>
    </section><!-- #services -->
     <!--==========================
      clubs Section
    ============================-->

  <!--  Footer  ============================-->
    
  <?php require '../Home/footer.php'; ?>
  <!-- #footer -->
          <!----------------------------aaaaaaaaaaaaadddddddddddddddddddddddddddddddddddddddddddd------------------------->

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