<?php
if(empty($_SESSION['login'])){
	header('Location: ?p=home');
}
$reponse2 = $bdd->query("SELECT * FROM com_commentaire, art_article where com_art_oid = art_oid order by art_oid")->fetchAll();
?>

<div id ='idlist'>
<ul class='list-unstyled list'>
		<?php foreach ($reponse2 as $key => $value): ?>
			<li>
				<ul class='list-unstyled name'>
					<li>Pseudo :<?= $value['com_pseudo'] ?></li>
					<li>Commentaire :<?= $value['com_content'] ?></li>
					<li>Date :<?= $value['com_date'] ?></li>
					<li>Article concerné :<?= $value['art_titre']?></li>
					<li>
						<?= '<a href="?p=supprCom&id='.$value['com_oid'].'"><i class=" glyphicon glyphicon-trash"></i></a>' ?>
					</li>
					<hr>
				</ul>

			</li>
				
		<?php endforeach;?>
	</ul>
	<ul class="pagination"></ul>
</div>
<script type='text/javascript' src='node_modules/jquery/dist/jquery.js'></script>
<script src="node_modules/list.js/dist/list.js"></script>
<script src="assets/js/gestionCom.js"></script>