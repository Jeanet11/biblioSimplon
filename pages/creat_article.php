<?php
if(empty($_SESSION['login'])){
        header('Location: ?p=home');
    }
//Traitement PHP
if(!empty($_POST)):
    $titre = htmlspecialchars($_POST['titre']);
    $genre = htmlspecialchars((INT)$_POST['genre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $auteur = htmlspecialchars($_POST['auteur']);
    $date = htmlspecialchars($_POST['date']);
//ajoute les articles
    $sql_ajout_article = sprintf("INSERT INTO art_article (art_titre,art_content,art_auteur,art_date, art_gnr_oid)VALUES 
                                ('%s','%s','%s','%s', %d)", $titre, $contenu, $auteur, $date, $genre);
    try {
        $bdd->query($sql_ajout_article);
        $succes = "L'article suivant est enregistré : ".$titre;
    } catch (Exception $e) {
        echo $e->getMessage(), "\n";
    }
endif;
//requete la liste des genres
try {
    $sql_genre = $bdd->query(sprintf("SELECT * FROM gnr_genre ORDER BY gnr_libele asc"));
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}
?>
<!-- Affichage HTML -->
<?php
    if (!empty($succes)){
        echo "<h1>".$succes."</h1>";
        $succes = "";
    }
?>
<form action="" method="post" class="text-center">
<ul class="list-unstyled">
    <li>
        <input type="submit" value="Créer l'article" class="btn btn-success">
        <a href="?p=home" class="btn btn-danger">Annuler</a>
    </li><br/>
    <li class="form-inline">
        <div class="form-group">
            <input require type="text" class="form-control" name="titre" id="titre" placeholder="Titre">
            <input type="text" name="auteur" class="form-control" id="auteur" placeholder="Auteur">
            <select name="genre" id="genre" class="form-control">
                <optgroup label="Genre">
                    <?php foreach ($sql_genre as $key => $value) :?>
                        <option value= <?= $value["gnr_oid"] ?>> <?= $value["gnr_libele"] ?> </option>
                    <?php endforeach ?>
                </optgroup>
            </select>
            <input type="date" name="date" class="form-control" id="date">
        </div>
    </li><br/>
    <li><textarea name="contenu" id="contenu" cols="100" rows="30"></textarea></li>
</ul>
</form>