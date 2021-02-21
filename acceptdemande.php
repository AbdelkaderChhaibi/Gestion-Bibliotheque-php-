<?php session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>accept demande</title>
</head>
<body>
<?php 	
if(isset($_SESSION['valid'])){
include("connexion.php");
$idd=$_GET['id'];
$x='0123456789abcdefghijklmnopqrstuvwxyz';
$l=10;
$pasw=substr(str_shuffle(str_repeat($x, ceil($l/strlen($x)))),1,$l) ;
$sql0=mysqli_query($mysqli,"SELECT * FROM demande where id='$idd'");
$row=mysqli_fetch_assoc($sql0);
$mat=$row['mat'];
$nom=$row['nom'];
$prenom=$row['prenom'];
$email=$row['email'];
$tel=$row['tel'];
$sql3=mysqli_query($mysqli,"INSERT INTO adherant ( matricule, nom, prenom, email, tel, password) VALUES ( '$mat', '$nom', '$prenom', '$email', '$tel', '$pasw')");
$sql2=mysqli_query($mysqli,"DELETE FROM demande where id='$idd'");
mail($email, "confirmation de compte" ,"votre demande a ete accepter \nvotre mot de pass est:$pasw ");
echo "<script>window.location.href='g_demande.php';</script>";



}else{

			echo "<div style='background-color:white;'>You must be logged in to view this page.<br/><br/>
		  <a href='index.php'>Login</a></div>";


		}
?>
















</body>
</html>