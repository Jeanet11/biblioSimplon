<?php 

$id = $_GET['id'];
echo $id;

try {
$reponse = $bdd->query("SELECT art_titre, art_auteur, art_date, art_content FROM art_article WHERE art_oid = $id");
 $donnees = $reponse->fetch();

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


<form action="" method="post" class="text-center">

<ul class="list-unstyled">
    
    <li class="form-inline">
        <div class="form-group">
            <input require type="text" class="form-control" name="pseudo" id="pseudo" placeholder="pseudo">
        </div>
        
    <input type="textarea" name="com" id="com" col="400" row="100">
</ul>

<input type="submit" value="Envoyer" class="btn btn-success">
</form>
