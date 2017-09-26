<?php
    $endrequ = "";
    if(!empty($_GET['search'])){
        $endrequ =sprintf(" and art_titre like '%%%s%%'",htmlspecialchars($_GET['search']));
    }
    if(!empty($_GET['tri'])){
        $endrequ.=sprintf(" order by %s",htmlspecialchars($_GET['tri']));
    }   
    $response = $bdd->query("Select * from art_article, gnr_genre where art_gnr_oid = gnr_oid".$endrequ);
    $data=$response->fetchAll();
    
?>

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
    <ul class='pagination'></ul>
    </div>   
</table>
<script type='text/javascript' src='node_modules/jquery/dist/jquery.js'></script>
<script src="node_modules/list.js/dist/list.js"></script>
<script src="assets/js/paginate.js"></script>