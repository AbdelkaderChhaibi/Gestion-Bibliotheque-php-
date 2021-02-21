<?php session_start();
error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
	<title>changeps</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="fom.css">

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
	<br><br><br>
	<div class="container">
	<div class="col-md-6 col-md-offset-3" style="padding: 9%; background:  #1c0f57;box-shadow: 0 15px 28px 0 rgba(0,0,0,0.2),0 9px 26px 0 rgba(0,0,0,0.19); ">
	<form action="" method="post">
		<table>
			<tr>
				<td class="white">ancienne mot de passe:</td>
				<td><input type="password" name="anps"></td>
			</tr>
			<tr>
				<td class="white">noveau mot de passe:</td>
				<td><input type="password" name="nops"></td>
			</tr>
			<tr>
				<td class="white">comfirmer mot de passe:</td>
				<td><input type="password" name="nops2"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" class=" btn  btn-info"></td>
			</tr>
		</table>
	</form>
<?php 
if(isset($_POST['submit'])){
$idu=$_SESSION['valid2'];
$anps=$_POST['anps'];
$nops=$_POST['nops'];
$nops2=$_POST['nops2'];
if(empty($anps)||empty($nops)||empty($nops2)){
	echo "il faut remplir tous les champs";
}elseif ($nops2!=$nops) {
	echo "il faut bien comfirmer le noveau mot de pass";
}else{
$sql=mysqli_query($mysqli,"SELECT * from adherant where id='$idu'");
$row=mysqli_fetch_assoc($sql);
$ps=$row['password'];
if ($ps!=$anps) {
	echo "mot de pass incorect";
}else{
$sql2=mysqli_query($mysqli,"UPDATE adherant set password='$nops' where id='$idu'");
$sql3=mysqli_query($mysqli,"UPDATE adherant set ps=0");
session_destroy();
echo "<script>window.location.href='index.php';</script>";
}
}
}?>  
</div></div>
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