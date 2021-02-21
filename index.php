<?php session_start();
error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>connexion</title>
	<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="fom.css">

</head>
<body background="icons/b.jpg">
	<img src="index.png" class="img-respensive" style="width: 100%;">
<?php 
include("connexion.php");

if(isset($_POST['submit'])) 
{
	                     $user = mysqli_real_escape_string($mysqli, $_POST['login']);
	                      $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") 
	{
		         echo "<div class='container'><div class='col-md-6 col-md-offset-3'><div class='alert alert-danger'><h5  style='text-align: center;' >login vide ou mot de pass vide</h5><br><br><hr><a href='index.php'><h3 style='text-align: center;'>retour</h3></a></div></div></div>";
	}else{
		 $result = mysqli_query($mysqli, "SELECT * FROM admin WHERE login='$user' AND password='$pass'");
		 $result1=mysqli_query($mysqli,"SELECT * from adherant where email='$user' and password='$pass' ");
		   $row1=mysqli_fetch_assoc($result1);
		   $row=mysqli_fetch_assoc($result);

		if(is_array($row) && !empty($row)){
			      $_SESSION['valid']=$row['login'];
			      $_SESSION['login']=$row['login'];
			      //header('location:indexadmin.php'); 
			//$_SESSION['password']=$row['password'];
		}elseif(is_array($row1) && !empty($row1)) {
			      $_SESSION['valid1']=$row1['email'];
			      $_SESSION['valid2']=$row1['id'];
			      $_SESSION['valid3']=$row1['matricule'];
			      $_SESSION['nom']=$row1['nom'];
			     // header('location:indexadherant.php'); 
		}else{

					echo "<div class='container'>
	        	<div class='col-md-6 col-md-offset-3'><div class='alert alert-danger'>
		        <h5  style='text-align: center;' >invalide username ou password</h5><br><br>
		        <hr> <a href='index.php'><h3 style='text-align: center;'>retour</h3></a>
	              </div></div></div>";
		      }
	}
		
}
	
		if(isset($_SESSION['valid'])){

			//header('location:indexadmin.php');
			echo "<script>window.location.href='indexadmin.php';</script>";
	
		}
		if (isset($_SESSION['valid1'])) {
			//header('location:indexadherant.php'); 
			echo "<script>window.location.href='indexadherant.php';</script>";
		}

		?>

<div class=" container" >
	<div class="row">
		<div class="col-md-6 col-md-offset-3 style1">
	<form name="form1" method="post" action="index.php">
		<h2 style=" color: #afafaf;">L o g i n</h2>
		<div class="form-group form1"  >
		<input type="text" name="login" placeholder="username" class="form-group input">
		</div>
				<div class="form-group form1">
			<input type="password" name="password" placeholder="mot de pass" class="form-group input">
		</div>
		<div class="form1 form-group">
			<input  type="submit" name="submit" class="btn btn-primary input" value="connexion">
		</div>		
			</form>
<br><br><hr align="center" width="300px" >
			<a href="demande.php" ><h4 align="center" >demande un compte</h4></a>
			<br><hr align="center" width="300px" >
			<a href="obpass.php" ><h5 align="center" >mot de pass oublier</h5></a>
	</div>
</div>		
</div>
			

<footer>
<div class="container-fluid">
	<div class="row"style=" background: #000000;box-shadow: 0 15px 28px 0 rgba(0,0,0,0.2),0 9px 26px 0 rgba(0,0,0,0.19); ">
		<br><br><br>
		<p style="text-align: center;"><small> ce site etait créer comme etant un projet de programation web pour les etudiants de 3 éme info à l'école polytechnique de sousse</small> <br>      &copy Notre Bibliotheque 2020 </p>



	</div>
</div>	
</footer>



 
</body>
</html>