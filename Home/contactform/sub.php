<?php
if(!empty($_POST["send"])) {
   	$email = $_POST["email"];


	$conn = mysqli_connect("localhost", "root", "", "mailbd");
	$query = mysqli_query($conn, "INSERT INTO mail (email) VALUES ('$email')");

    if(isset($query)) {
        $message = "Your email is saved successfully.";
        $type = "success";
     }else{
        $message = "Your email is saved successfully.";

     }
}
?>