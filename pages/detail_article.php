<?php 

$id = $_GET['id'];
$buttons ='';
$buttons2 = '';

if(isset($_SESSION['login'])){
    $buttons='<a href="?p=modif&id='.$id.'"><i class="glyphicon glyphicon-pencil"></i></a>';
    $buttons2='<div class="col-md-1"><a href="?p=suppr&id='.$id.'"><i class=" glyphicon glyphicon-trash"></i></a></div>';
}

// requete affichage du contenu entier
try {

    $reponse = $bdd->query(sprintf("SELECT a.art_oid, a.art_titre, a.art_auteur, a.art_date, a.art_content, g.gnr_libele FROM art_article a INNER JOIN gnr_genre g   ON  (art_gnr_oid = gnr_oid) WHERE art_oid = %d", $id));
    $donnees = $reponse->fetch();

} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

//ajout dans la base
if(!empty($_POST['pseudo']) && !empty($_POST['com'])) {
    
    try {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $com = htmlspecialchars($_POST['com']);
    $sql_ajout_com = sprintf("INSERT INTO com_commentaire(com_pseudo, com_content, com_art_oid, com_date)
        VALUES ('%s' , '%s' , %d, '%s')", $pseudo, $com, $id,date("d-m-Y")) ;

   
     $req=$bdd->exec($sql_ajout_com);
    
 } catch (Exception $e) {
    echo $e->getMessage(), "\n";
}
  
}

$reponse->closeCursor();

//affichage des commentaires
$reponse2 = $bdd->query("SELECT * FROM com_commentaire WHERE com_art_oid = $id ORDER BY com_oid DESC");
?>
<!-- affichage html -->
<section class="clearfix container" >
    <div class="row">
        <h2 class="col-md-12"><?= $donnees['art_titre'] ?></h2>


    </div>

    <div class="row">
     <div class="col-md-9"><h4><?= $donnees['gnr_libele'] ?></h4></div>
     <div class ='col-md-offset-2 col-md-1'><?= $buttons.$buttons2 ?></div>              
 </div>

 <hr>

 <div id="content"><?=$donnees['art_content'] ?></div>
 <hr>
 <ul class="row list-unstyled list_inline">
    <li class='col-md-2 col-md-offset-8'><?= $donnees['art_auteur'] ?></li>

    <li class="col-md-2"><?= $donnees['art_date'] ?></li>
</ul>
</div>
<div class="col-md-1 "><button class="pull-right btn btn-primary" type="submit" >Télécharger</button></div>
</section >

<!-- section commentaires -->
<section >
<h4>Commentaires</h4>


<div class="container well pre-scrollable">

    <?php
    while($donnees = $reponse2->fetch())
    {
        ?>
      <div class="row list-unstyled   ">
            <div class="col-md-2 " ><p><strong><?= $donnees['com_pseudo'] ?></strong></p></div>
            <div class="col-md-8 "><p><em><?= $donnees['com_content'] ?></em></p></div>
            <div class="col-md-2  "><p><?= $donnees['com_date'] ?></p></div>
    
    </div>
   
<?php
}

$reponse2->closeCursor();

?>


<br>


 <!-- formulaire d'ajout de commentaire -->
  
</div>
<div>
<h4 class='container'>Ajouter un commentaire</h4>
 
    <form role="form" method="post">

        <div class="col-md-2 form-group">
            <label class="sr-only" for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" placeholder="pseudo" name="pseudo" maxlength="50">
        </div>


        <div class="col-md-5 form-group">
            <label class="sr-only" for="com">Commentaire</label>
            <textarea class="form-control" id="com" placeholder="Commentaire" name="com" maxlength="255"></textarea>
        </div>

        <div class="col-md-0 form-group ">

              <?php
              $date = 
              $heure = date("H:i");
              // echo($date." ".$heure);
              ?>  
       </div>

        <div class="col-md-2 form-group ">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>

        
</div>


  </form>

</section>
<script type='text/javascript' src='node_modules/jquery/dist/jquery.js'></script>
<script type='text/javascript' src='node_modules/markdown/lib/markdown.js'></script>
<script type='text/javascript' src='assets/js/consult_article.js'></script>