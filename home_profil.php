<html lang="fr">
	<head>
		<title>Mister1610</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="js/jquery.mCustomScrollbar.min.css" />
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
<?php $en_cour = "ACCUEIL" ?>
<?php include("menu_profil.php"); ?>
<br>
<div id="corps"><!--à recopier dans tout les fichier (div corps) -->
  <section class="menu1"><!--Tous ce qui va être a gauche de l'écran-->
	<div class="menu1">
		<div class="lieu">
		        <br>
		        Vous êtes ici:	<a href=""><strong>Accueil</strong></a>
			<br>
			<br>
			<hr>
		</div>
	</div>
  </section>
  <section class="menu2"><!---Tous ce qui va être a droite de l'écran-->
        <img src="image/sociaux/logo partager.jpg">
	<div class="network">
	  <a href="https://twitter.com/primfx" rel="nofollow" target="_blank"><img src="image/sociaux/twitter.png" width="50px" class="twitter"></a> <a href="https://twitter.com/primfx" rel="nofollow" target="_blank"><img src="image/sociaux/twitch.ico" width="50px" class="twitch"></a>  <a href="https://www.facebook.com/primfxdesign" rel="nofollow" target="_blank" class="facebook"><img src="image/sociaux/facebook.png" width="50px"></a> <a href="https://www.youtube.com/c/mister1610" rel="nofollow" target="_blank"><img src="image/sociaux/youtube.png" width="50px" class="youtube"></a>
	</div>
  </section>
</div>


<?php include("footer-view.php"); ?>
<style type="text/css">
strong {
  font-weight:normal;
}
a {
	text-decoration: none;
	color: black;
}
a:hover {
	color: blue;
}</style>
</body>
</html>