<?php 
  require '../connexion.php';
  $sql = "SELECT * FROM club";
  $query = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CampusESTG : Les Espaces</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

       <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
      
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
      
        <!--==========================
        Header
        ============================-->
        <?php require '../Home/header.php';?>
        <!-- #header -->

       <br><br><br>
        <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Formulaire de Demande Inscription</h3>
          <p>Veuillez remplir s'il vous plait la formule suivante pour effectuer une Demande d'inscription en ligne</p>
        </header>
        <div class="row">

          <div class="col-md-12 col-lg-12 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box text-center"> 
            <?php 
                  if(isset($_GET['error'])){
                    echo '<div class="alert alert-danger" role="danger"><p>' 
                    .$_GET['error'].'</p></div>';
                  }else if(isset($_GET['success'])){
                    echo '<div class="alert alert-success" role="success"><p>' 
                    .$_GET['success'].'</p></div>';
                  }
                ?>
              <form method="post" action="demande-ins.php" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="prenom" class="form-control" id="name" placeholder="Saisir votre Prenom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control" name="nom" id="name" placeholder="Saisir votre Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <select name="club" class="form-control">
                    <?php while ($rows = mysqli_fetch_assoc($query)) {
                      $id = $rows['id_club'];
                      $nom = $rows['nom_club'];
                    ?>
                      <option value="<?php echo $id;?>"><?php echo $nom; }?></option>
                    </select>
                    <div class="validation"></div>
                  </div>
                  <!-- <input type="hidden" name="id" value=""> -->
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control" name="filliere" placeholder="Saisir votre Filliére" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="number" name="telephone" class="form-control" id="name" placeholder="Saisir Votre Numero de Telephone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Votre Email adresse" data-rule="minlen:4" data-msg="Please enter a valid Email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="motivation" rows="5" data-rule="required" data-msg="Entrer Votre Motivation" placeholder="Votre Motivation"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center">
                  <button class="btn btn-info" type="submit" title="Send">Envoyer</button>               
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #services 
          -==========================
    Footer
  ============================-->
  <?php require '../Home/footer.php';?>
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
        
          <!-- Template Main Javascript File -->
          <script src="js/main.js"></script>
</body>
</html>