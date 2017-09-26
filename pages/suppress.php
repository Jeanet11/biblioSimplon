<?php
if(empty($_SESSION['login'])){
    header('Location: ?p=home');
}

    $bdd->query(sprintf("Delete from art_article where art_oid = %d",$_GET['id']));
    header('Location: ?p=home');
?>

