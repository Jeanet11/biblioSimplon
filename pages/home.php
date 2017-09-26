<?php
$endrequ = "";
if(!empty($_GET['search'])){
    $endrequ =sprintf(" and art_titre like '%%%s%%'",htmlspecialchars($_GET['search']));
}
if(!empty($_POST['tri'])){
    $endrequ.=sprintf(" order by %s",htmlspecialchars($_POST['tri']));
}
 
$response = $bdd->query("Select * from art_article, gnr_genre where art_gnr_oid = gnr_oid".$endrequ);
$data=$response->fetchAll();

?>
<div class='container page-header'>
    <h2 class='text-center'>Liste des articles</h2>
    <h4>Trier les articles</h4>
    <form method='POST' class="form-inline">
    <select name="tri" id="tri" class="form-control">
        <option value="art_titre">Titre</option>
        <option value="art_date">Date</option>
        <option value="gnr_libele">Genre</option>
        <option value="art_auteur">Auteur</option>
    </select>
    <button type="submit" class="btn btn-success">Trier</button>
</form>

</div>
<div id="idlist">
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
                    Genre
                </th>
                <th>
                 Extrait
             </th>
             <th>
                Date
            </th>
            <th>
                Consult
            </th>
        </tr>
    </thead>

    <tbody class='list'>
        <?php foreach($data as $values): ?>
            <tr class='name'>
                <td><?= $values['art_titre'] ?></td>
                <td><?= $values['art_auteur'] ?></td>
                <td><?= $values['gnr_libele'] ?></td>
                <td><?= substr($values['art_content'],0,70)."..." ?></td>
                <td><?= $values['art_date'] ?></td>
                <td><?= '<a href="?p=article&id='.$values['art_oid'].'"><i class="glyphicon glyphicon-search"></i></a>' ?>
                   <?php
                   if(isset($_SESSION['login'])){
                    echo '<a href="?p=modif&id='.$values['art_oid'].'"><i class="glyphicon glyphicon-pencil"></i></a>';
                    echo '<a href="?p=suppr&id='.$values['art_oid'].'"><i class=" glyphicon glyphicon-trash"></i></a>'; 
                    
                }
                ?>               
            </td> 
        </tr>
    <?php endforeach; ?>
</tbody>

</table>
<ul class='pagination pull-right'></ul>
</div>   

<script type='text/javascript' src='node_modules/jquery/dist/jquery.js'></script>
<script src="node_modules/list.js/dist/list.js"></script>
<script src="assets/js/paginate.js"></script>