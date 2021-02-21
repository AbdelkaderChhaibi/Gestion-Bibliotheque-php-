<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>gestion reservation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<?php

	if(isset($_SESSION['valid'])) {
		include("connexion.php");
		$sql=mysqli_query($mysqli,"SELECT * FROM reservation ");
		?> 
		<header>
			<header>
		<div class="container-fluid" >
			<div class="row">
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
<div class="panel panel-primary">
<div class="panel-heading">les reservation </div>
<div class="panel-body">
<div class="container">
	<table class="table table-respensive">
		<thead>
		<tr bgcolor='#0effff'>
			<td>livre</td>
			<td>matricule</td>
			<td>etat</td>
			<td>date</td>
			<td>action</td>
		</tr>
	</thead>
	<tbody>
	<?php while ($row=mysqli_fetch_array($sql)) {?>
				<tr> 
					<td><?php echo $row['livre']; ?></td>
					<td><?php echo $row['matadherant']; ?></td>
					<td><?php echo $row['etat']; ?></td>
										<td><?php echo $row['date_']; ?></td>

					<td>
						<?php 
						if($row['etat']=='en cour')

							echo "<a href=\"retoures.php?id=$row[id]\" class=\" btn btn-info\">retour livre</a>";
						else{ echo "<a href=\"acceptres.php?id=$row[id]\"><img src=\"images/accpt.png\" class=\"img-responsive\" style=\" width:5em; height:2em;\" align=\"left\"></a><a href=\"refres.php?id=$row[id]\"><img src=\"images/refus.png\" class=\"img-responsive\" style=\" width:5em; height:2em;\" align=\"right\"></a>";


						 }?>
					</td>


				</tr>

	
		<?php }?>

</tbody>
</table>
</div>
</div>
<div class="panel-footer"></div>
</div>
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