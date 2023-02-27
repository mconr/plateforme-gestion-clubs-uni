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
          <h3>Formulaire de Création du Club</h3>
          <p>Veuillez remplir s'il vous plait la formulaire suivante pour effectuer une Demande de Création d'un Club Universitaire.</p>
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
              <form method="POST" action="insert.php" role="form" class="contactForm" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="prenom" class="form-control"  placeholder="Prenom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control" name="nom"  placeholder="Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="telephone" class="form-control"  placeholder="Telephone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control" name="filliere"  placeholder="Filliére" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control" name="email"  placeholder="Votre Email" data-rule="minlen:4" data-msg="Please enter a valid Email" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="password" name="password" class="form-control"  placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="club_nom" class="form-control"  placeholder="Nom du Club" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="motivation"  placeholder="Motivation de Création" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="description" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Description du club"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="form-group col-lg-6">
                <input type="file" class="form-control-lg" placeholder="logo du club" name="fileToUpload" id="fileToUpload" accept="image/*">
                
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
</body>
</html>