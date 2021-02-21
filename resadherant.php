<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>mes reservation</title>
	<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css">

</head >
<body background="images/b.jpg">
	<?php
	if(isset($_SESSION['valid1'])) {
		include("connexion.php");
		$idu=$_SESSION['valid2'];
		$mat=$_SESSION['valid3'];
		//echo "$mat";
		$n=0;
		$sql1=mysqli_query($mysqli,"SELECT * from reservation where matadherant='$mat'");
		//$row2=mysqli_fetch_assoc($sql1);
		$sql2=mysqli_query($mysqli,"SELECT nbrlivre from adherant where id='$idu'");
		$row0=mysqli_fetch_assoc($sql2);
		$n=$row0['nbrlivre'];
		if($n){?>
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
		<div class="panel panel-primary">
<div class="panel-heading">Mes reservations </div>
<div class="panel-body">	<a href="indexadherant.php">Retour</a>
			<p>vous avez <?php echo $n ?> rservations;</p>
<br>
	
<div class="container">
<br>
	<table class="table  table-responsive">
		<thead >

			
				<tr bgcolor=#0effff>
					<th>livre</th>
					<th>date</th>
					<th>etat</th>
					<th>annuler</th>
				</tr>
				</thead>
				<tbody>
				<?php while ($row2=mysqli_fetch_array($sql1)) { ?>
				<tr>
					<td><?php echo $row2['livre']; ?></td>
					<td><?php echo $row2['date_']; ?></td>
					<td><?php echo $row2['etat']; ?></td>
					<?php if($row2['etat']=='a traiter'){ echo "<td><a href=\"annulres.php?id=$row2[id]\"><img src=\"images/ares.png\" class=\"img-responsive\" style=\" width:5.5em; height:2em;\"></a> </td>"; }else echo "<td>est en cour </td></tr>";} ?>
					
			</tbody>
</table>
</div>
</div>
<div class="panel-footer"></div>
</div>




	<?php	}else{?>				
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
		<div class="panel panel-primary">
<div class="panel-heading">Mes reservations </div>
<div class="panel-body">
<br>
<div class='container'>
		<div class='col-md-6 col-md-offset-3'>
			<div class='alert alert-danger'>
		<h5  style='text-align: center;' >vous avez aucune reservation </h5><br><br>
		<hr>

		<a href='indexadherant.php'><h3 style='text-align: center;'>Retour</h3></a>
	</div></div></div>
</div>
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




	<?php }



}else{

			echo "You must be logged in to view this page.<br/><br/>";
		    echo "<a href='index.php'>Login</a>";


		}

		?> 

</body>
</html>