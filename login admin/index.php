<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CampusESTG : Les Espaces</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link href="../Home/img/favicon.png" rel="icon">
        <link href="../Home/img/logo.png" rel="apple-touch-icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
      </head>
      <body>
        <!--========================== Header ============================-->
        <?php require '../Home/header.php';?>
        <!-- #header -->
       <br><br><br><br><br>
       <div class="container">
       <body class="text-center">
         <div class="box" style="width: 500px; margin: 50px auto;">
        <form class="form-signin" action="connect.php" method="POST">
          <!-- <img class="mb-4" src="" alt="" width="72" height="72"> -->
          <h1 class="h3 mb-3 font-weight-normal">Admin Connection</h1>
              <input type="text"  name="email" class="form-control" placeholder="Email address" required="" autofocus=""><br>
              <input type="password"  name="password" class="form-control" placeholder="Password" required="">
              <br>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" >Sign in</button>
              
                <?php 
                  if(isset($_GET['error'])){
                    echo '<div class="alert alert-danger" role="danger"><p>' 
                    .$_GET['error'].'</p></div>';
                  }
                ?>
                
              </div>
              
        </form>
        
        </div>
        <br><br>
</div>
</body> 
        <!--========================== FOOTER ============================-->
        <?php require '../Home/footer.php';?>
</body>
</html>