<?php
if(empty($_SESSION['login'])){
    header('Location: ?p=home');
}
	
    $bdd->query(sprintf("Delete from com_commentaire where com_oid = %d",$_GET['id']));
    header('Location: ?p=commentaires');
?>


<h1>Suppression en cours</h1>