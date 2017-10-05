<?php
//traitement PHP
if(isset($_SESSION['login'])){
    header("Location: ?p=home");
}
if (!empty($_POST)):
    //Récup des données saisies
    $mdp_saisi = htmlspecialchars($_POST["mdp"]);
    $pseudo_saisi = htmlspecialchars($_POST["pseudo"]);
    $sql_connexion = sprintf("SELECT adm_login, adm_mdp FROM adm_administrateur WHERE adm_login = '%s' AND adm_mdp = '%s'",
    $pseudo_saisi, $mdp_saisi);
    $resultat_saisi = $bdd->query($sql_connexion)->fetch();
    if (!empty($resultat_saisi)){
        $_SESSION["login"]=$pseudo_saisi;
        header("Location: ?p=indexAdmin");
    }else{
        $message_erreur = "Mot de passe ou nom d'utilisateur incorect.";
    };
endif;
?>
<!-- affichage HTML -->
<div class="col-sm-offset-4 col-sm-4 text-center well">
        <h2><?php if (isset($message_erreur)){
            echo $message_erreur;
        };?></h2>
    <form action="" method="post">
        <ul class="list-unstyled">
            <li><input required type="text"  name="pseudo" id="pseudo" placeholder="Pseudo"></li><br/>
            <li><input required type="password"  name="mdp" id="mdp" placeholder="Mot de passe"></li><br/>
            <li><input type="submit" class="btn btn-info" value="OK"></li>
        </ul>
    </form>
</div>