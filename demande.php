<?php session_start(); 
error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
	<title>demande</title>
	<meta charset="utf-8">
			<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="fom.css">
</head>
<body background="images/b.jpg"> 
<img src="images/index.png" class="img-respensive" style="width: 100%;">

<?php 	
include("connexion.php");



?>

<div class=" container" >
	<div class="row">
		<div class="col-md-6 col-md-offset-2 style1">
<form action="demande.php" method="post" class="form1">
			<h2 style=" color: #afafaf;">demande compte</h2>
				<input type="text" name="nom" placeholder="Nom"  class="input" >
				<input type="text" name="prenom" placeholder="prenom" class="input" >
				<input type="text" name="matricule" placeholder="Matricule"  class="input" >
				<input type="email" name="email"  placeholder="email" class="input">
			<input type="tel" name="tel"  placeholder="tel" class="input">	<br>
			<p></p>
		 <input type="submit" name="submit" class="input btn btn-info">



 </form>
			

<?php
	if(isset($_POST['submit'])){
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$matricule=$_POST['matricule'];
		$email=$_POST['email'];
		$tel=$_POST['tel'];

			if(empty($nom)) {
				echo "<span class=\"white\">nom est vide </span>	";

	 			}
	 		  
			elseif(empty($prenom)){
			echo "<span class=\"white\">prenom est vide </span>	";

			}
			elseif(empty($email)){
				echo "<span class=\"white\">email est vide </span>	";

			}
			elseif(empty($tel)){
				echo "<span class=\"white\">tel est vide </span>	";
			}
			elseif(empty($matricule)){
				echo "<span class=\"white\">matricule  est vide </span>	";
			}else{
			    $sql10=mysqli_query($mysqli,"SELECT * FROM  adherant where email='$email'");
			    if(mysqli_num_rows($sql10)){
			       echo "<span class=\"white\">email existant </span>	"; 
			       
			    }else{
			        $sql11=mysqli_query($mysqli,"SELECT * FROM  demande where email='$email'");
			    if(mysqli_num_rows($sql11)){
			       echo "<span class=\"white\">email existant </span>	"; 
			       
			    }else{
			   
			   
mysqli_query($mysqli,"INSERT INTO demande ( mat, nom, prenom, email, tel) VALUES ( '$matricule'
	, '$nom', '$prenom', '$email','$tel')");

echo "<script>window.location.href='demande2.php';</script>";
		 	}}}
}



?>
<br><br><hr align="center" width="520px" >
			<a href="index.php" class="btn btn-info" style="width:15em; margin-left: 30%;"> retour</a>

</div></div></div>
</span>






</body>
</html>