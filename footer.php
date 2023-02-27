<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3><span style="color: rgb(207, 48, 136);">CAMPUS</span>ESTG</h3>
            <p>Cette Application Web, est un travail réalisé par un group des étudaints de l'Ecole Supérieure de Technologies, en vue de faciliter la vie scolaire au sein de leur établissement.</p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Suivez-Nous</h4>
            <ul>
              <li class="active"><a href="#intro">Home</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#clubs">clubs</a></li>
              <li><a href="#about">About Us</a></li>
              <li><a href="#team">Team</a></li>
              <li><a href="#contact">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Avenue Abou Maachar Al Balkhi <br>
              B.P 1317, GUELMIM<br>
              MAROC <br>
              <strong>Tél:</strong> 05 28 77 02 73<br>
              <strong>Fax:</strong> 05 28 77 27 46<br>
              <strong>Email:</strong> Estg@uiz.ac.ma<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Restez Branchés !</h4>
            <p>Restez connecté aux dernières nouvelles et informations de <strong><span style="color: rgb(207, 48, 136);">CAMPUS</span>ESTG</strong>.</p>
            <!-- -------------------- -->
          
            <form action=" <?php
                  
                  if(isset($_POST['abonner']) & isset($_post['email'])){
                      require 'connexion.php';
                      $mail = $_POST['email'];
                      $req = "INSERT INTO `mailabonne`(`email`) 
                                              VALUES ('$mail')";
                      $query = mysqli_query($con,$req);
                      if(isset($query)){
                          $text= "succee";
                      }else{
                         $text =  "echec";
                      }
                  }
            ?>" method="post">
              <!-- <input type="email" name="email">
              <input type="submit" name="abonner"  value="Abonner">   -->
              <br>
              <p> <?php $text ?> </p>
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>CampusESTG</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#team">BADR & WISSAL & MONIR</a>
      </div>
    </div>
  </footer>