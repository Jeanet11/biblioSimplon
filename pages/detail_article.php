<?php 

$id = $_GET['id'];


// affiche du contenu entier
try {
    $reponse = $bdd->query("SELECT art_titre, art_auteur, art_date, art_content FROM art_article WHERE art_oid = $id");
    $donnees = $reponse->fetch();

} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

?>
<ul class="list-unstyled list-inline">
    
    
        <li><h2 ><?= $donnees['art_titre'] ?></h2></li>
        <li></li>
        <li><h4 ><?= $donnees['art_auteur'] ?></h4></li>
 </ul>   
    <hr>
        
  
<div  id="content"><?=$donnees['art_content'] ?></div>
<hr>
<div ><?= $donnees['art_date'] ?></div>

</div>


<!-- section commentaires -->
<h4><strong>Commentaires</strong></h4>

<?php

//affichage des commentaires
$reponse->closeCursor();

$reponse2 = $bdd->query("SELECT * FROM com_commentaire WHERE com_art_oid = $id");

?>

<div class="container well">
    <?php
    while($donnees = $reponse2->fetch())
    {
        ?>
      <div class="row list-unstyled comments  ">
            <div class="col-md-2 comment" ><p><strong><?= $donnees['com_pseudo'] ?></strong></p></div>
            <div class="col-md-9 comment"><p><em><?= $donnees['com_content'] ?></em></p></div>
            <div class="col-md-1 col-md-offset comment"><p><?= $donnees['com_date'] ?></p></div>
    
    </div>



<?php
}

$reponse2->closeCursor();

?>


</table>

<?php
//creation d'un commentaire dans la bdd
if(!empty($_POST)) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $com = htmlspecialchars($_POST['com']);


    $sql_ajout_com = sprintf("INSERT INTO com_commentaire(com_pseudo, com_content, com_art_oid)
        VALUES ('%' , '%' , %d)", $pseudo, $com, $id) ;

    try {

     $bdd->query($sql_ajout_com);

 } catch (Exception $e) {
    echo $e->getMessage(), "\n";
}
}

?>

<hr>

 <!-- formulaire d'ajout de commentaire -->
    <h4>Ajouter un commentaire</h4>
 
    <form role="form" method="post">

        <div class="col-md-2 form-group">
            <label class="sr-only" for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" placeholder="pseudo" name="pseudo" maxlength="20">
        </div>
 
         
        <div class="col-md-5 form-group">
            <label class="sr-only" for="com">Commentaire</label>
            <textarea class="form-control" id="com" placeholder="Commentaire" name="com" maxlength="255"></textarea>
        </div>
 
        <div class="col-md-2 form-group ">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
 
    </form>
</div>


