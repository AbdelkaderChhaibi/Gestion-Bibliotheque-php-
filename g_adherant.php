<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>gestion d adhrant</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	
	<?php
	if(isset($_SESSION['valid'])) {
		include("connexion.php");
		$res1=mysqli_query($mysqli,"SELECT * FROM adherant");
	?>
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
<div class="panel-heading">les adherant </div>
<div class="panel-body">
<div class="container">
	<div class="row">
<div class="form-group">
	<form action="" method="post"><label class="col-sm-1"><img src="images/rech.png" class="img-responsive" style=" width:7.25em; height:2.45em;"></label><div class="col-sm-2"><input type="text" name="rech" placeholder="N'importe information" class="form-control"style="width: 180px;"> 
	<small class="form-text"> taper n' importe information </small></div><input type="submit" name="submit" value="rechercher" class="btn btn-info col-sm-2"></form>
</div>
</div>
<br>
	<table class="table table-respensive">
		<thead>
		<tr bgcolor='#0effff'>
			<th>matricule</th>
			<th>nom</th>
			<th>prenom</th>
			<th>email</th>
			<th>tel</th>
			<th>nombre livre</th>
			<th>envoyer un email</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if (isset($_POST['submit'])&&!empty($_POST['rech'])) {
			$rech=$_POST['rech'];
			if(!empty($rech)){
		$sql="SELECT * FROM adherant where matricule like '%$rech%' or nom like '%$rech%' or prenom like '%$rech%' or email like '%$rech%' or tel like '%$rech%' or nbrlivre like '%$rech%'";
		$res=mysqli_query($mysqli,$sql);
			if(isset($res)) {
		while ($row=mysqli_fetch_array($res)) { ?>
			<tr>
				<td><?php echo $row['matricule']; ?></td>
				<td><?php echo $row['nom']; ?></td>
				<td><?php echo $row['prenom'] ?></td>
				<td><?php echo $row['email'] ; ?></td>
				<td><?php echo$row['tel'] ; ?></td>
				<td> <?php echo $row['nbrlivre']; ?> </td>
			
				
				<?php echo "<td><span><a href=\"envemail.php?id=$row[id]\"><img src=\"images/email2.png\" class=\"img-responsive\" style=\" width:4em; height:2em;\" align=\"left\">"; 
				echo "<a href=\"suppadh.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><img src=\"images/supp.png\" class=\"img-responsive\" style=\" width:4em; height:2em;\" align=\"right\"></a></span></td>";
?>

			</tr>

		 	
		<?php }

  }
}
 }else{
  	while (		$row2=mysqli_fetch_array($res1)) { ?>
			<tr>
				<td><?php echo $row2['matricule']; ?></td>
				<td><?php echo $row2['nom']; ?></td>
				<td><?php echo $row2['prenom'] ?></td>
				<td><?php echo $row2['email'] ; ?></td>
				<td><?php echo$row2['tel'] ; ?></td>
				<td> <?php echo $row2['nbrlivre']; ?> </td>
			
				
				<?php echo "<td><span><a href=\"envemail.php?id=$row2[id]\"><img src=\"images/email2.png\" class=\"img-responsive\" style=\" width:4em; height:2em; \" align=\"left\">"; 
				echo "<a href=\"suppadh.php?id=$row2[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><img src=\"images/supp.png\" class=\"img-responsive\" style=\" width:4em; height:2em;\" align=\"right\"></a></span></td>";
?>

		
			</tr>
		

		

		<?php
	}}?>
</tbody>
</table>
</div>
</div>
<div class="panel-footer"></div>
</div>






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