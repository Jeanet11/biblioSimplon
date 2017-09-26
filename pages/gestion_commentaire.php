<?php
    if(empty($_SESSION['login'])){
        header('Location: ?p=home');
    }
    $reponse2 = $bdd->query("SELECT * FROM com_commentaire, art_article where com_art_oid = art_oid order by art_oid")->fetchAll();
?>


<ul class='list-unstyled'>
	<?php foreach ($reponse2 as $key => $value): ?>
	<li>
		<ul class='list-unstyled'>
			<li>Pseudo :<?= $value['com_pseudo'] ?></li>
			<li>Commentaire :<?= $value['com_content'] ?></li>
			<li>Date :<?= $value['com_date'] ?></li>
			<li>Article concerné :<?= $value['art_titre']?></li>
			<li>
				<?= '<a href="?p=supprCom&id='.$value['com_oid'].'"><i class=" glyphicon glyphicon-trash"></i></a>' ?>

			</li>
		</ul>
	
	</li>
	<hr></hr>		
	<?php endforeach;?>


</ul>