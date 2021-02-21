<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>ajout terminer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="fom.css">
</head>
<body background="images/b.jpg">
	<?php
	if(isset($_SESSION['valid'])){
include("connexion.php");
?>
			<header>
		<div class="container-fluid" >
			<div class="row" style="background:#ffffff">
				<div class="col-sm-2" ><a href="index.php"><img src="images/logo2.png" class="img-responsive"></a></div>
				<div class="col-sm-8"></div>
				<div class="col-sm-2"><font size="4"> Bienvenue <?php echo $_SESSION['login'];?>!</font>
				<a href='logout.php' class="btn btn-info btn-responsive"><span>Deconixion</span></a>  </div>
			</div>
		</div>
	</header>
		<nav class="navbar navbar-inverse">
		<div class="container-fluid" >
		<div class="navbar-header"><a class="navbar-brand" href="index.php"><h5>Notre bibliothéque</h5> </a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="indexadmin.php">accueil</a></li>
		<li><a href='g_adherant.php'>gestion adherant </a></li>
		<li><a href='g_livre.php'>gestion livre</a></li>
		<li><a href='g_resv.php'>gestion de resevation </a></li>
		<li><a href="g_demande.php">gestion de demande</a></li>
		</ul>
		</div>
		</nav>
		<div class='container'>
		<div class='col-md-6 col-md-offset-3'>
			<div class='alert alert-danger'>
		<h5  style='text-align: center;' >ajout un noveau livre fait avec succée  </h5><br><br>
		<hr>

		<a href='g_livre.php'><h3 style='text-align: center;'>retour</h3></a>
		<hr>
		<a href='ajoutlivre.php'><h3 style='text-align: center;'>ajouter un autre</h3></a>

	</div></div></div>
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