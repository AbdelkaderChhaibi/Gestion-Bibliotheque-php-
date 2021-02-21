<?php session_start();?>
<!DOCTYPE html>
<html >
<head>
	<title> deconnection</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body >
	<img src="images/index.png" class="img-respensive" style="width: 100%;">

<?php session_destroy();?>

<div class='container' style="">
		<div class='col-md-6 col-md-offset-3'>
			<div class='alert alert-danger'>
		        <h5  style='text-align: center;' >vous etes deconnecté </h5><br><br>
		         <hr>
		        <a href='index.php'><h3 style='text-align: center;'>connection</h3></a>
	       </div>
      </div>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer >
     <div class="container-fluid">
	    <div class="row"style=" background: #000000;box-shadow: 0 15px 28px 0 rgba(0,0,0,0.2),0 9px 26px 0 rgba(0,0,0,0.19); ">
		     <br><br><br>
		     <p style="text-align: center;"><small> ce site etait créer comme etant un projet de programation web pour les etudiants de 3 éme info à l'école polytechnique de sousse</small> <br>      &copy Notre Bibliotheque 2020 </p>



	     </div>
       </div>	
</footer>

</body>
</html>





 