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
<?php                
  require 'connexion.php';
  $id = $_GET['idlien'];

  $requet = "SELECT * FROM club WHERE id_club = '$id' ";
  $query = mysqli_query($con,$requet);
  $rows = mysqli_fetch_assoc($query);
  $id_president = $rows['id_president'];
  
  $requet = "SELECT * FROM president WHERE id_president = '$id_president' ";
  $query = mysqli_query($con,$requet);
  $rows = mysqli_fetch_assoc($query);
  $id_personne = $rows['id_personne'];

  $requet = "SELECT * FROM personne WHERE id_personne = '$id_personne' ";
  $query = mysqli_query($con,$requet);
  $rows = mysqli_fetch_assoc($query);
  $nom = $rows['nom'];
  $prenom = $rows['prenom'];
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
      
        <!--==========================  Header ============================-->
        <?php require '../Home/header.php'?>
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
            <?php
                   
                   require '../connexion.php';
                 
                   $id = $_GET['idlien'];
                   $requet = "SELECT * FROM club WHERE id_club = $id";
                   $query = mysqli_query($con,$requet);
                   while($rows=mysqli_fetch_assoc($query)){ 
                   ?>
                   <div class="text-center">
                      <h1 style="font-weight: bold; margin-left:50px;"><?php echo $rows['nom_club'] ?></h1>
                   </div>
          <div class="col-md-12 col-lg-12 wow bounceInUp" data-wow-duration="1.4s" >
            <div class="box" style="display:flex; width:1100px;">
            
         <div id="portfolio" class="" style="width:300px; box-shadow:0 0 0 0 ;">
           <div class=" portfolio-item filter-web" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="../registre/<?PHP echo $rows['logo_club']?>" class="" style="height:200px; width=200px;" alt="">
              <div class="portfolio-info">               
                  <a href="../registre/<?PHP echo $rows['logo_club']?>" class="link-preview" data-lightbox="portfolio" data-title="Image" title="Preview"><i class="ion ion-eye"></i></a>
              </div>
              
            </div>
          </div>
                    <!--img src="<?PHP// echo $rows['urlimage']?>"  alt="LOGO" style="height:200px; width=200px;"-->
               </div>
          
               <div style="margin-left:120px; text-position:center;" >
                 
               <h3>Description du Club</h3>
              <p class="description" ><?php echo $rows['description_club'] ?></p>
               </div>
                
            </div>
            <div  class="row justify-content-center" style="">
                
                </div>
          </div>

          <?php } ?>
         
        </div>
    </div>

        </div>



                
      </div>


<!-- -------------------------- -->
      


  <div class="container44 text-center">
 <br><br>
<div class="col0-md-4 ">
<h2 style="font-weight:bold;">Les Evenements du Club</h2>
<br><br>
<!-- <button onclick="location.href=''" type="submit" class="btn "> <h3> s'inscrire </h3> </button>  -->
      <?php 
          $requet = "SELECT * FROM evenement WHERE id_club = '$id' ";
          $query = mysqli_query($con,$requet);
          while($rows = mysqli_fetch_assoc($query)){
          $title = $rows['title_evenement'];
          $logo = $rows['logo_evenement'];
          $id_evenement = $rows['id_evenement'];
      ?>
  <div class="blog-card0-image text-center">
      <div class="mo"> 
          <div class="no text-center">
              <div>
                    <a href="../Home/Event.php?idlien=<?php echo $id_evenement; ?>"> <img class="img-thumbnail" style="height: 300px;width: 300px; margin: 0 auto 5px;" src="../dashboard presi/<?php echo $logo;?>"  alt="Image" > </a>
              </div>
              <div class="blog-table0">
                      <div class="blog-card0-caption0">
                        <?php echo "<h1> " .$title." </h1>"; ?>
                        <a href="../Home/Event.php?idlien=<?php echo $id_evenement; ?>"> <span>LEARN MORE</span></a>
                        <?php } ?>        
                      </div>                                       
                  </div>
                  <nav>
                    <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="Events.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="Events.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="Events.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>
              </div>                                                     
          </div>
    </section>        
       </div> 
                                                
    </div>
      
  </div>
   
   

  
   

 <!-- </section> -->

    <!-- #services -->
     <!--==========================
      clubs Section
    ============================-->

  <!--  Footer  ============================-->

  <?php require '../Home/footer.php' ?>
  
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
</html-->