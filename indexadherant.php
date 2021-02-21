<?php session_start();
error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
	<title>bibliotheque</title>
	<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body background="images/b.jpg">
					

	<?php

	if(isset($_SESSION['valid1'])) {
		include("connexion.php");
		$iduser=$_SESSION['valid2'];
		$res0=mysqli_query($mysqli,"SELECT *from adherant where id='$iduser'");
		$row45=mysqli_fetch_assoc($res0);
		$ps=$row45['ps'];
		if ($ps) {
			$sql11=mysqli_query($mysqli,"UPDATE adherant set ps=0 where id='$iduser'");
			
			echo "<script>window.location.href='changeps.php';</script>";
		}

		$res1=mysqli_query($mysqli,"SELECT * FROM livre");
	?>
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
<div class="panel-heading">les livres </div>
<div class="panel-body">	<a href="resadherant.php">consulter mes reservation</a>

	
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
			<th>reserver</th>
		</tr>
		</thead>
		<tbody>
		
		<?php
		if (isset($_POST['rech'])) {
			$rech=$_POST['rech'];
		$sql="SELECT * FROM livre where title like '%$rech%' or autheur like '%$rech%' or date_sortie like '%$rech%' or nombre_de_pages like '%$rech%'";
		$res=mysqli_query($mysqli,$sql);
			if(!empty($res)) {
		
		while ($row=mysqli_fetch_array($res)) { ?>
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
				
			
					<?php echo "<td><a href=\"reslivre.php?id=$row[title]\"><img src=\"images/147.png\" class=\"img-responsive\" style=\" width:5.5em; height:2em;\"></a> </td>";  ?>

			</tr>
			<?php  
		}}}else{
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
							echo "non disposible";		
						} ?>
				</td>

					<?php if($row['dispo']){ echo "<td><a href=\"reslivre.php?id=$row[title]\"><img src=\"images/147.png\" class=\"img-responsive\" style=\" width:5.5em; height:2em;\"></a> </td>";} 
					else echo "<td> non disposible</td>"; ?>


			</tr>

		 	
		<?php }}?>
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
		<?php }else{

				echo "<div style='background-color:white;'>You must be logged in to view this page.<br/><br/>
		  <a href='index.php'>Login</a></div>";


		}

		?> 

			
	</table>


	
	

</body>
</html>