<?php
require 'connexion.php';
if(isset($_POST['send'])){
    $titre = $_POST['titre'];
    $date = $_POST['date'];
    $lieu = $_POST['lieu'];
    $contenu = $_POST['contenu'];
    $url = $_POST['urlimage'];
    $req = "INSERT INTO `evenement`(`titre`, `date`, `lieu`, `contenu`, `urlimage`) 
                            VALUES ('$titre','$date','$lieu','$contenu','$url')";
    $query = mysqli_query($con,$req);
    if(isset($query)){
        echo "succee";
    }else{
        echo "echec";
    }
}
?>

<form method="POST" action="" >
    titre: <br>  <input type="text" name="titre"> <br>
    lieu : <br>  <input type="text" name="lieu"> <br>
    date : <br>  <input type="date" name="date" > <br>
    <textarea name="contenu" id="" cols="30" rows="10">description</textarea> <br> <br>
    url de l'image : <br> <input type="text" name="urlimage"> <br>
    <input type="submit" name="send" values="send">send</input>
</form>