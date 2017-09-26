<?php
	
	$homeAdmin = '';
	$disconect = "<a class='navbar-brand' href='?p=connexion'><i class='glyphicon glyphicon-log-in'></i></a>";
    if(!empty($_SESSION['login'])){
		$disconect = "<a class='navbar-brand' href='?p=logout'><i class='glyphicon glyphicon-log-out'></i></a>";
		$homeAdmin = '<a href="?p=indexAdmin" class="navbar-brand"><i class="glyphicon glyphicon-cog"></i></a>';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
	<title><?= $title ?></title>
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a href="?p=home" class="navbar-brand"><i class="glyphicon glyphicon-home"></i></a>
					<?= $homeAdmin ?>
					<?= $disconect ?>
				</div>
				
				<form method='GET' action='?p=home'class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" name='search' class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search
						"></i></button>
					</form>
				</div>
			</nav>
		</header>
		<section class="container">
			<?= $content ?>
		</section>
		<footer>
			<div class="container">
				<ul class="list-inline ">
					<li class=" col-md-offset-1 list-inline-item">
						Créé par : Bouvier Jimmy - Cheurfa Nassim - Tiramani Jeanne
					</li>
					<li class=" col-md-offset-1 list-inline-item">
						Organisation : Simplon Carcassonne
					</li>
					<li class=" col-md-offset-1 list-inline-item">
						2017
					</li>
				</ul>
			</div>
		</footer>
	</body>
	</html>