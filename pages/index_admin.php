<?php

if(empty($_SESSION['login'])){
	header('Location: ?p=home');
}

?>


<ul class='list-unstyled col-md-offset-4 col-md-4 well text-center' >
	<li>
		<h4><a href="?p=creat">Ajout d'un article</a></h4>
	</li>
	<li>
		<h4><a href="?p=commentaires">Gestion des commentaires</a></h4>
	</li>
	<li>
		<h4><a href='?p=logout'><i class='glyphicon glyphicon-log-out'></i></a></h4>
	</li>
</ul>

<div class="col-md-offset-3 col-md-6 text-center" >
	<a href="?=logout"><img src="./assets/images/logo_admin.jpg"/></a>
</div>