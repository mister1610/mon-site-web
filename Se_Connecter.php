<?php

require_once('php/config.php');
include_once('php/cookie_connect.php');

if(isset($_POST['bt_connexion']))
{
	$pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($pseudoconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? AND motdepasse = ? ");
		$requser->execute(array($pseudoconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		if ($userexist == 1) 
		{
			if(isset($_POST['rememberme']))
			{
				setcookie('pseudo', $pseudoconnect, time() + 365*24*3600, null, null, false, true);
				setcookie('password', $mdpconnect, time() + 365*24*3600, null, null, false, true);
			}
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $userinfo['mail'];
			header("Location: profil.php?".$_SESSION['pseudo']);

		}
		else
		{
			$erreur = "Mauvais pseudo ou mot de passe !";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent être complétés !";
	}
}
?>
<html lang="fr">
      <head>
		<title>Connexion - Mister1610</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="js/jquery.mCustomScrollbar.css" />
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	    <script>
		    (function($){
		        $(window).on("load",function(){
		            $("body").mCustomScrollbar({
		            	theme:'minimal'
		            });
		        });
		    })(jQuery);
		</script>
       </head>
<body>
<?php $en_cour = "SE CONNECTER" ?>
<?php include("menu.php"); ?>
<br>
<div id="corps" style="height: 50%"><!--à recopier dans tout les fichier (div corps) -->
  <section class="menu1" style="height: 375px;"><!--Tous ce qui va être a gauche de l'écran-->
        <div class="menu1">
                <div class="lieu">
                        <br>
                        Vous êtes ici:  <a href="home.php"><strong>Accueil</strong></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="Se_Connecter.php"><strong>Se connecter</strong></a>
                        <br>
                        <br> 
                        <hr>
                </div> 
        </div>
	<div class="espace_connexion"><!--espace de connexion --><!-- php my admin à faire sur le raspberry-->
	  <h4>CONNEXION&nbsp;</h4>
	  <a href="Inscription.php" class="no-account"> Vous n'avez pas de compte ? Crée en un ICI.</a>
	  <br><br>
	  <form class="formconnexion" method="post" action="">
	    <input type="text" placeholder="Pseudo" name="pseudoconnect" style="margin-left: 14px; height: 35px">
	    <br>
	    <input type="password" placeholder="Mot de passe" name="mdpconnect" style="margin-left: 14px; height: 35px">
	    <br>
	    <input type="checkbox" name="rememberme" id="souvenirdemoi" style="margin-left: 14px">
	    <label for="souvenirdemoi">Garder ma session active</label>
	    <br>
	    <a href=""><input type="submit" value="Connexion" name="bt_connexion" class="Connexion"></a>
	    <a href="php/recup_mdp.php" class="Recup_mdp">Mot de passe oublié ?</a>
	    <br>
	  </form>
	  <?php 
	   if(isset($erreur))
	     {
	         echo '<font color="red">'.$erreur.'</font>';
	     }
	  ?>
	</div>
  </section>
  <section class="menu2"><!---Tous ce qui va être a droite de l'écran-->
        <img src="image/sociaux/logo partager.jpg"> 
        <div class="network"> 
          <a href="https://twitter.com/primfx" rel="nofollow" target="_blank"><img src="image/sociaux/twitter.png" width="50px" class="twitter"></a> <a href="https://twitter.com/primfx" rel="nofollow" target="_blank"><img src="image/sociaux/twitch.ico" width="50px" class="twitch"></a>  <a href="https://www.facebook.com/primfxdesign" rel="nofollow" target="_blank" class="facebook"><img src="image/sociaux/facebook.png" width="50px"></a> <a href="https://www.youtube.com/c/mister1610" rel="nofollow" target="_blank"><img src="image/sociaux/youtube.png" width="50px" class="youtube"></a>
	</div>
  </section>
</div>
<div class="footer">
<?php include("./footer-view.php"); ?>
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
.Connexion {
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