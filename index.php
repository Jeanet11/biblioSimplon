<?php

session_start();
//connect db
$user = "root";
$pass = "admin";
try {
    $bdd = new PDO('mysql:host=localhost;dbname=db_biblio', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
};


$p = 'home';
if(isset($_GET['p'])){
	$p=$_GET['p'];
}

ob_start();

if($p==='home'){
	$title='acceuil';
	include "pages/home.php";
}
if($p==='article'){
	$title="detail de l'article";
	include "pages/detail_article.php";
}
if($p==='modif'){
	$title ="Modifier un article";
	include "pages/modif_article.php";
}
if($p==='creat'){
	$title ="Ajouter un article";
	include "pages/creat_article.php";
}
if($p==='commentaires'){
	$title ="Gestion des commentaires";
	include "pages/gestion_commentaire.php";
}
if($p==='connexion'){
	$title ="Login";
	include 'pages/connexion.php';
}
if($p==='indexAdmin'){
	$title ="Acceuil back office";
	include 'pages/index_admin.php';
}
if($p==='logout'){
	$title ="logout...";
	include 'pages/deconnexion.php';
}
if($p==='suppr'){
	$title ="suppresion...";
	include 'pages/suppress.php';
}
if($p==='supprCom'){
	$title ="suppresion...";
	include 'pages/suppCom.php';
}

$content=ob_get_clean();
if ($content == ''){
	header("Location: ?p=home");
}
include "./assets/template/layout.php";

