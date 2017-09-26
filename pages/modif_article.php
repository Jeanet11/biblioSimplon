<?php
if(!empty($_SESSION["login"])){
    //le code pour la modification ici

$id = $_GET['id'];
if(!empty($_POST)) {
    
    try {

        $titre = htmlspecialchars($_POST['titre']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $date = htmlspecialchars($_POST['date']);
        $content = htmlspecialchars($_POST['content']);


        $sql_modif_article = sprintf("UPDATE art_article SET art_titre='%s', art_auteur='%s', art_date='%s', art_content='%s' WHERE art_oid=%d", $titre, $auteur, $date, $content, $id);

        $req=$bdd->exec($sql_modif_article);
        $succes = "Les modifications sont enregistrées ";
    } catch (Exception $e) {
        echo $e->getMessage(), "\n";
    }
}

try {

    $reponse = $bdd->query(sprintf("SELECT art_oid, art_titre, art_auteur, art_date, art_content, gnr_libele FROM art_article  INNER JOIN gnr_genre    ON  (art_gnr_oid = gnr_oid) WHERE art_oid = %d", $id));
    $donnees = $reponse->fetch();

} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

 
$reponse->closeCursor();

if (!empty($succes)){
    echo "<h1>".$succes."</h1>";
    $succes = "";
}
?>

<form action="" method="post" class="text-center">
	<ul class="list-unstyled">
		<li>
			<input type="submit" value="Enregistrer les modifications" class="btn btn-success">
			<a href="?p=home" class="btn btn-danger">Annuler</a>
		</li><br/>
		<li class="form-inline">
			<div class="form-group">
				<?= '<input require type="text" class="form-control" name="titre" id="titre" value ="'.$donnees['art_titre'].'"/>' ?>
				<?= '<input require type="text" class="form-control" name="auteur" id="auteur" value ="'.$donnees['art_auteur'].'"/>' ?> 
				<?= '<input require type="date" class="form-control" name="date" id="date" value ="'.$donnees['art_date'].'"/>' ?> 

				
			</div>
		</li><hr/>
	</ul>
    
  <textarea name="content" id="content" cols="100" rows="30" ><?= $donnees['art_content'] ?> </textarea>
  
 
</form>
<hr>
<?php
}else{
    //redirige la personne sur l'index si elle n'est pas connecté
    header("Location: ?p=home");
}
?>