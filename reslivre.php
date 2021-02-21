<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>reservation</title>
	<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body background="images/b.jpg">
	<?php

	if(isset($_SESSION['valid1'])) {
		include("connexion.php");?>



	<header>
		<div class="container-fluid" >
			<div class="row" style="background: #ffffff" >
				<div class="col-sm-2" ><a href="index.php"><img src="images/logo2.png" class="img-responsive"></a></div>
				<div class="col-sm-8"></div>
				<div class="col-sm-2"><font size="4"> Bienvenue <?php echo $_SESSION['nom'];?>!</font>
					 <a href='logout.php' class="btn btn-info btn-lg"><span>Deconixion</span></a>  </div>
			</div>
		</div>
	</header>
	<br>
	<br><br>


		<?php
		$idu=$_SESSION['valid2'];
		$idl=$_GET['id'];
		$sql0=mysqli_query($mysqli,"SELECT * from adherant where id='$idu' ");
	$row=mysqli_fetch_assoc($sql0); 
 	$nlivre=$row['nbrlivre'];
 	$mat=$row['matricule'];
if ($nlivre<5) {
	$sql1=mysqli_query($mysqli,"UPDATE adherant set nbrlivre=nbrlivre+1 where id='$idu' ");
	//$sql2=mysqli_query($mysqli,"UPDATE livre set reseverver='$mat' where code='$idl' ");
	$sql3=mysqli_query($mysqli,"INSERT into reservation( livre, matadherant, etat )values( '$idl', '$mat', 'a traiter')");
	echo "<div class='container'>
		<div class='col-md-6 col-md-offset-3'>
			<div class='alert alert-danger'>
		<h5  style='text-align: center;' > reservation terminer votre demande  sera traiter </h5><br><br>
		<hr>
		<a href='indexadherant.php'><h3 style='text-align: center;'>retour</h3></a>
	</div></div></div>";
	
	
}else{
	echo "<div class='container'>
		<div class='col-md-6 col-md-offset-3'>
			<div class='alert alert-danger'>
		<h5  style='text-align: center;' > vous avez depasser le nomber maximal vous pouvez retouner un liver pour plus de reservation </h5><br><br>
		<hr>
		<a href='indexadherant.php'><h3 style='text-align: center;'>retour</h3></a>
	</div></div></div>";

}
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
<div class="container-fluid">
	<div class="row"style=" background: #000000;box-shadow: 0 15px 28px 0 rgba(0,0,0,0.2),0 9px 26px 0 rgba(0,0,0,0.19); ">
		<br><br><br>
		<p style="text-align: center;"><small> ce site etait créer comme etant un projet de programation web pour les etudiants de 3 éme info à l'école polytechnique de sousse</small> <br>      &copy Notre Bibliotheque 2020 </p>



	</div>
</div>	
</footer>


<?php

	}else{

				echo "<div style='background-color:white;'>You must be logged in to view this page.<br/><br/>
		  <a href='index.php'>Login</a></div>";

		}

		?> 

</body>
</html>