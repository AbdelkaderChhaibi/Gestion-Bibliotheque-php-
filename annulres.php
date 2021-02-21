<?php session_start(); 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>annule resvation</title>
</head>
<body>
	<?php 
	if(isset($_SESSION['valid1'])) {
		include("connexion.php");
		$idu=$_SESSION['valid2'];
		$idr=$_GET['id'];
		$sql=mysqli_query($mysqli, "DELETE from reservation where id='$idr'");
	$sql1=mysqli_query($mysqli,"UPDATE adherant set nbrlivre=nbrlivre-1 where id='$idu' ");
	
echo "<script>window.location.href='resadherant.php';</script>";








	}else{

			echo "<div style='background-color:white;'>You must be logged in to view this page.<br/><br/>
		  <a href='index.php'>Login</a></div>";


		}

		?> 

</body>
</html>