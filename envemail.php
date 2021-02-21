<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title> evoyer email</title>
		<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="fom.css">

</head>
<body background="images/b.jpg"> 
	<?php

	if(isset($_SESSION['valid'])) {
		include("connexion.php");
		$ida=$_GET['id'];
		$res1=mysqli_query($mysqli,"SELECT * FROM adherant where id=$ida");
		$row=mysqli_fetch_assoc($res1);
		$email=$row['email'];
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
	<div class=" container" >
	<div class="row">
		<div class="col-md-6 col-md-offset-3 style1">
			<a href="g_livre.php" class="btn btn-info">R e t o u r</a>
<h2 >E_mail</h2>
		<form action="" method="post" >
	<div class="form1">
			<label class="form-group hh"> subject </label>
			<textarea name="sub" rows="3" cols="30"class="form-group input"> Notre bibliothéque.  </textarea>
	</div>	
	<div class="form1">
			<label class="form-group hh"> message:</label>
				<textarea name="msg" rows="10" cols="30" class="form-group input" ></textarea>
		 </div>

		<div>
			<input type="submit" name="submit" class="form-group btn btn-info inputbtn" value="envoyer">
 </div>
 </form>
</div></div></div>

<?php
if(isset($_POST['submit'])){
	$msg=$_POST['msg'];
	$sub=$_POST['sub'];
	if(empty($msg)){

		echo "<div class='container'>
		<div class='col-md-6 col-md-offset-3'>
			<div class='alert alert-danger'>
		<h5  style='text-align: center;' > il faut ecrire un message </h5><br><br>
		<hr>
	</div></div></div>";

	}else{
		mail($email, $sub, $msg);
				echo "<div class='container'>
		<div class='col-md-6 col-md-offset-3'>
			<div class='alert alert-danger'>
		<h5  style='text-align: center;' > le  message est bien envoyer </h5><br><br>
		<hr>
		<a href='g_adherant.php'> retour</a>
	</div></div></div>";
	}




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
	}else{			echo "<div style='background-color:white;'>You must be logged in to view this page.<br/><br/>
		  <a href='index.php'>Login</a></div>";

		}









?>


</body>
</html>