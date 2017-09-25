<?php

if(empty($_SESSION['login'])){
	header('Location: ?p=home');
}

?>



<ul class='list-unstyled col-md-offset-5'>
	<li>
		<a href="">Ajout d'un article</a>
	</li>
	<li>
		<a href="">Gestion des commentaires</a>
	</li>
	<li>
		<a href='?p=logout'><i class='glyphicon glyphicon-log-out'></i></a>
	</li>
</ul>