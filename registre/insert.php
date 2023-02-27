<?php 
require '../connexion.php';
//---------------------------------
$filliere = $_POST['filliere'];
//---------------------------------
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
//---------------------------------
$password = $_POST['password'];
$hashed = password_hash($password,PASSWORD_DEFAULT);
//---------------------------------
$club_nom = $_POST['club_nom'];
$motivation = $_POST['motivation'];
$description = $_POST['description'];
//---------------------------------
$sql="SELECT * FROM president";
$query = mysqli_query($con,$sql);
while($rows = mysqli_fetch_assoc($query)){
  $id_president = $rows['id_president'];
  $email_president = $rows['email_president'];
  $sql = "SELECT * FROM CLUB WHERE id_president = '$id_president'";
  $query = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($query);
  $nom_club = $row['nom_club'];
  if($email == $email_president){
    header("location:index.php?error=email déja exister");
    exit;
  }
  if($nom_club == $club_nom){
    header("location:index.php?error=Nom du club déja utiliser");
    exit;
  }
}
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
//---------------------------------

$sql = "INSERT INTO `demande_club`(`nom`, `prenom`, `telephone`, `filliere`, `email`, `password`, `nom_club`, `motivation`, `description`, `logo`) VALUES ('$nom','$prenom','$telephone','$filliere','$email','$hashed','$club_nom','$motivation','$description','$target_file')";
$query= mysqli_query($con,$sql);
if(isset($query)){
    header("location:index.php?success=Votre demande de création est terminer");
}
else {
    echo 'Error insertion';
}
?>