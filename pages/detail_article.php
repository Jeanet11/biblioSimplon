<?php 

$id = $_GET['id'];
echo $id;

try {
$reponse = $bdd->query("SELECT art_titre, art_auteur, art_date, art_content FROM art_article WHERE art_oid = $id");
 $donnees = $reponse->fetch();

} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}


if(!empty($_POST)) {
$pseudo = htmlspecialchars($_POST['pseudo']);
$com = htmlspecialchars($_POST['com']);
$req = ("INSERT INTO com_commentaire (com_oid, com_pseudo, com_content) FROM com_commentaire INNER JOIN art_article ON com_art_oid = art_oid");


}

try {
 $bdd->query($req);

} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

?>



<table class='table'>
    <thead>
    <tr>
        <th>
            Titre
        </th>
        <th>
            Auteur
        </th>
           
        <th>
            Date
        </th>
        
        </tr>
    </thead>

    <tbody>
        
         <tr>
            <td><?= $donnees['art_titre'] ?></td>
            <td><?= $donnees['art_auteur'] ?></td>
            
            <td><?= $donnees['art_date'] ?></td>
            
                 <?php
                    
                 ?>               
            </td> 
        </tr>
               
    </tbody>   
</table>


<div id="content"><?=$donnees['art_content'] ?></div>

<!-- formulaire commentaires -->
<form action="" method="post" class="text">

<ul class="list-unstyled">
    
    <li class="form-inline">
        <div class="form-group">
            <input require type="text" class="form-control" name="pseudo" id="pseudo" placeholder="pseudo">
        </div>
        
        
    <li><textarea type="text" name="com" id="com" cols="100" rows="15"></textarea> </li>
</ul>

<input type="submit" value="Envoyer" class="btn btn-success">
</form>

<!--  <div class="pre-scrollable"></div> -->
