<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>refuser demande</title>
</head>
<body>
<?php 	
if(isset($_SESSION['valid'])){
include("connexion.php");
$idd=$_GET['id'];
$sql=mysqli_query($mysqli,"DELETE FROM demande where id='$idd'");

echo "<script>window.location.href='g_demande.php';</script>";


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