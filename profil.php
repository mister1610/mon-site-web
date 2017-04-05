<?php

require_once('php/config.php');

include_once('php/cookie_connect.php');

setcookie('pseudo', $_SESSION['pseudo'], time() + 365*24*3600, null, null, false, true);

	$requser = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? ");
	$requser->execute(array('pseudo, avatar'));
	$userinfo = $requser->fetch();

?>
<html lang="fr">
    <head>
		<title>Profil de <?php echo $_COOKIE['pseudo']; ?> - Mister1610</title>
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
<body background-color="black">
<?php $en_cour = "PROFIL" ?>
<?php include("menu_profil.php"); ?>
<br>
<div id="corps" style="height: 50%"><!--à recopier dans tout les fichier (div corps) -->
  <section class="menu1" style="height: 375px;"><!--Tous ce qui va être a gauche de l'écran-->
        <div class="menu1">
                <div class="lieu">
                        <br>
                        Vous êtes ici:  <a href="home_profil.php"><strong>Accueil</strong></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href=""><strong><?php echo $_COOKIE['pseudo']; ?></strong></a>
                        <br>
                        <br> 
                        <hr>
                </div> 
        </div>
        <div class="profil">

          <h4>Profil de <?php echo $_COOKIE['pseudo']; ?></h4>
          <br>
          <?php
          if(!empty($userinfo['avatar']))
          {
          ?>

            <img src="avatars/defaut.jpg" width="150">

          <?php
          }
          ?>
          <br>
          <a href="Edition_du_profil.php"><input type="submit" name="Editer" value="Editer mon profil" class="Edition"></a>
        </div>
	 	<?php
	 	if(isset($_SESSION['pseudo']) AND $userinfo['pseudo'] == $_SESSION['pseudo'])//condition si la personne connecter est pas sur son profil mais sur un autre, il ne pourras pas editer le profil
	 	{

	 	}
	 	?>
  </section>
  <section class="menu2"><!---Tous ce qui va être a droite de l'écran-->
        <img src="image/sociaux/logo partager.jpg"> 
        <div class="network"> 
          <a href="https://twitter.com/primfx" rel="nofollow" target="_blank"><img src="image/sociaux/twitter.png" width="50px" class="twitter"></a> <a href="https://twitter.com/primfx" rel="nofollow" target="_blank"><img src="image/sociaux/twitch.ico" width="50px" class="twitch"></a>  <a href="https://www.facebook.com/primfxdesign" rel="nofollow" target="_blank" class="facebook"><img src="image/sociaux/facebook.png" width="50px"></a> <a href="https://www.youtube.com/c/mister1610" rel="nofollow" target="_blank"><img src="image/sociaux/youtube.png" width="50px" class="youtube"></a>
	</div>
  </section>
</div>
<div class="footer">
<?php include("footer-view.php"); ?>
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
.Edition {
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