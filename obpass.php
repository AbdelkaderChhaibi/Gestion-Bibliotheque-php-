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
				<td class="white">votre email</td>
				<td><input type="email" name="anps"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="submit" class=" btn  btn-info"></td>
			</tr>
		</table>
	</form>
<?php 
if(isset($_POST['submit'])){

$anps=$_POST['anps'];
if(empty($anps)){
	echo "il faut enter votre email";
}else{
$sql=mysqli_query($mysqli,"SELECT * from adherant where email='$anps'");
if(mysqli_num_rows($sql)){
    $row=mysqli_fetch_assoc($sql);
    $ps=$row['password'];
    mail($anps,"mot de pass","votre mot de pass est:$ps");
 $sql2=mysqli_query($mysqli,"UPDATE adherant SET ps=1 where email='$anps'") ; 
    
}else{
    
echo "compte n'existe pas";
    
}
echo "<script>window.location.href='index.php';</script>";
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
















		


</body>
</html>