<?php
    require '../connexion.php';
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $lieu = $_POST['lieu'];
    $dates = $_POST['dates'];
    $id_club = $_POST['id_club'];
    // -----------------------------
    //---------------------------------
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      //---------------------------------------

    $requet = "INSERT INTO `demande_evenement`(`nom_eve`, `description_eve`, `photo_eve`, `date_eve`, `lieu_eve`, `id_club`) VALUES ('$titre','$description','$target_file','$dates','$lieu','$id_club')";
    $query = mysqli_query($con, $requet);
    if(isset($query)) {
        header("location:evenements.php");
    } else{
        echo "<h1> ERROR D'INSERTION </h1>";
    }
?>