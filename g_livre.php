<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>gestion d livre</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<?php

	if(isset($_SESSION['valid'])) {
		include("connexion.php");
		$res1=mysqli_query($mysqli,"SELECT * FROM livre");
	?>
			<header>
				<div class="container-fluid" >
			<div class="row">
				<div class="col-sm-2" ><a href="index.php"><img src="images/logo2.png" class="img-responsive"></a></div>
				<div class="col-sm-8"></div>
				<div class="col-sm-2"><font size="4"> Bienvenue <?php echo $_SESSION['login'];?>!</font>
				<a href='logout.php' class="btn btn-info btn-lm"><span>Deconixion</span></a>  </div>
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
<div class="panel-heading">les livres </div>
<div class="panel-body"><a href="ajoutlivre.php">ajouter livre</a>
	
<div class="container">
	<div class="row">
<div class="form-group">
	<form action="" method="post"><label class="col-sm-1"> <img src="images/rech.png" class="img-responsive" style=" width:7.25em; height:2.45em;"></label><div class="col-sm-2"><input type="text" name="rech" placeholder="N'importe information" class="form-control"style="width: 180px;"> 
	<small class="form-text"> taper n' importe information </small></div><input type="submit" name="submit" value="rechercher" class="btn btn-info col-sm-2"></form>
</div>
</div>
<br>
	<table class="table  table-responsive">
		<thead >
		<tr bgcolor=#0effff>
			<th>image</th>
			<th>title</th>
			<th>auteur</th>
			<th>date sortie</th>
			<th>nomber de page</th>
			<th>etat</th>
			<th>reserver a</th>
			<th>etudier</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if (isset($_POST['submit'])) {
			$rech=$_POST['rech'];
		$sql="SELECT * FROM livre where title like '%$rech%' or autheur like '%$rech%' or date_sortie like '%$rech%' or nombre_de_pages like '%$rech%'";
		$res=mysqli_query($mysqli,$sql);
			if(!empty($res)&&!is_null($rech)) {
		
		while ($row=mysqli_fetch_array($res)) { ?>
			<tr >
			 	<td><img src="<?php echo $row['photo']; ?>" style="width:30px;height:40px;"></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['autheur'] ?></td>
				<td><?php echo $row['date_sortie'] ; ?></td>
				<td><?php echo$row['nombre_de_pages'] ; ?></td>
				<td><?php if($row['dispo']){ 
							echo "disponible";
						}else{
							echo "non disbosible";		
						} ?>
				</td>
				<td><?php if($row['reserver']){
							echo $row['reserver'] ;
						}else{
						echo "aucun reservation"; }//
				?>
			
				</td>
					<?php echo "<td><a href=\"modiflivre.php?id=$row[code]\" onClick=\"return confirm('Are you sure you want to modifier?')\"><img src=\"images/edit.png\" class=\"img-responsive\" style=\" width:5em; height:2em;\" align=\"left\"></a>";


					echo "<a href=\"supplivre.php?id=$row[code]\" onClick=\"return confirm('Are you sure you want to delete?')\"><img src=\"images/supp.png\" class=\"img-responsive\" style=\" width:5em; height:2em;\" align=\"right\"></a></td>";  ?>
			</tr>
			<?php  
		}}


		
	}else{
		while (		$row=mysqli_fetch_array($res1)) { ?>
			<tr>
    			<td><img src="<?php echo $row['photo']; ?>" style="width:30px;height:40px;"></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['autheur'] ?></td>
				<td><?php echo $row['date_sortie'] ; ?></td>
				<td><?php echo$row['nombre_de_pages'] ; ?></td>
				<td><?php if($row['dispo']){ 
							echo "disponible";
						}else{
							echo "non disbosible";		
						} ?>
				</td>
				<td><?php if($row['reserver']){
							echo $row['reserver'] ;
						}else{
						echo "aucun reservation"; }
				?>
			
				</td>
					<?php echo "<td><a href=\"modiflivre.php?id=$row[code]\" onClick=\"return confirm('Are you sure you want to modifier?')\"><img src=\"images/edit.png\" class=\"img-responsive\" style=\" width:5em; height:2em;\" align=\"left\"></a>";


					echo "<a href=\"supplivre.php?id=$row[code]\" onClick=\"return confirm('Are you sure you want to delete?')\"><img src=\"images/supp.png\" class=\"img-responsive\" style=\" width:5em; height:2em;\" align=\"right\"></a></td>";  ?>

			</tr>

		 	
		<?php } }?>
</tbody>
</table>
</div>
</div>
<div class="panel-footer"></div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
<div class="container-fluid">
	<div class="row"style=" background: #000000;box-shadow: 0 15px 28px 0 rgba(0,0,0,0.2),0 9px 26px 0 rgba(0,0,0,0.19); ">
		<br><br><br>
		<p style="text-align: center;"><small> ce site etait créer comme etant un projet de programation web pour les etudiants de 3 éme info à l'école polytechnique de sousse</small> <br>      &copy Notre Bibliotheque 2020 </p>



	</div>
</div>	
</footer>
	<?php	}else{

				echo "<div style='background-color:white;'>You must be logged in to view this page.<br/><br/>
		  <a href='index.php'>Login</a></div>";


		}

		?> 

			
	


	
	

</body>
</html>