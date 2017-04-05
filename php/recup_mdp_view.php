<?php

require_once('config.php');
include_once('recup_mdp.php');

?>
<html lang="fr">
      <head>
	<title>Récuperation du mot de passe - Mister1610</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../style.css">
       </head>
<body>
<?php $en_cour = "PROFIL" ?>
<?php include("menu_php.php"); ?>
<br>
<div id="corps" style="height: 50%"><!--à recopier dans tout les fichier (div corps) -->
  <section class="menu1" style="height: 375px;"><!--Tous ce qui va être a gauche de l'écran-->
        <div class="menu1">
                <div class="lieu">
                        <br>
                        Vous êtes ici:  <a href="home.php"><strong>Accueil</strong></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="recup_mdp.php"><strong>Récuperation du mot de passe</strong></a>
                        <br>
                        <br> 
                        <hr>
                </div> 
        </div>
	<div class="espace_connexion"><!--espace de connexion --><!-- php my admin à faire sur le raspberry-->
	  <h4>Récuperation du mot de passe&nbsp;</h4>
	  <br><br>

	  <?php if($section == 'code') { ?>

	  Récupération de mot de passe pour <?= $_SESSION['recup-mail']; ?>

	  <form class="recup-mdp" method="post" action="">
	 	<input type="email" name="code" placeholder="Code de vérification" style="margin-left: -211px;">
	    <br><br>
	    <a href=""><input type="submit" value="Validé" name="Code_submit" class="Validé" style="margin-left: 24px;"></a>
	   </form>

	  <?php } else { ?>

	  <form class="recup-mdp" method="post" action="">
	 	<input type="email" name="recup-mail" placeholder="Votre Adresse Mail" style="margin-left: -211px;">
	    <br><br>
	    <a href=""><input type="submit" value="Validé" name="Valide" class="Validé" style="margin-left: 24px;"></a>
	    <br>
	    <?php 
		    if(isset($erreur))
		    {
		        echo '<font color="red">'.$erreur.'</font>';
		    }
	  	?>
	  </form>
	    <?php } ?>
	</div>
  </section>
  <section class="menu2"><!---Tous ce qui va être a droite de l'écran-->
        <img src="../image/sociaux/logo partager.jpg"> 
        <div class="network"> 
          <a href="https://twitter.com/primfx" rel="nofollow" target="_blank"><img src="../image/sociaux/twitter.png" width="50px" class="twitter"></a> <a href="https://twitter.com/primfx" rel="nofollow" target="_blank"><img src="../image/sociaux/twitch.ico" width="50px" class="twitch"></a>  <a href="https://www.facebook.com/primfxdesign" rel="nofollow" target="_blank" class="facebook"><img src="../image/sociaux/facebook.png" width="50px"></a> <a href="https://www.youtube.com/c/mister1610" rel="nofollow" target="_blank"><img src="../image/sociaux/youtube.png" width="50px" class="youtube"></a>
	</div>
  </section>
</div>
<div class="footer">
<?php include("../footer-view.php"); ?>
</div>
</body>
</html>
<style type="text/css">
.footer {
	margin-top: 68px;
}
strong {
  font-weight:normal;
}
a {
	text-decoration: none;
	color: black;
}
a:hover {
	color: blue;
}
.Validé {
	display: block;
    text-align: center;
    padding: 5px 10px;
    margin: 8px auto 0 14px;
    background: black;
    border: 2px solid black;
    color: white;
    transition: all .3s ease;
}
</style>