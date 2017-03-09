<div id="wrap_menu_principal">
	<div id="menu_principal">
		<div id="navigation">
			<div id="logo">
			<br>
				<a href=""><img src="image/logo.jpg" alt="Logo Mister1610" width="130" height="26"></a>
			</div>
			<ul>
				<li><a href="#" <?php if ($en_cour == "Accueil") { echo "id=\"en_cour\"";}?>>Accueil</a></li>
				<li><a href="#" <?php if ($en_cour == "Videos") { echo "id=\"en_cour\"";}?>>Vidéos</a></li>
				<li><a href="#" <?php if ($en_cour == "Se connecter") { echo "id=\"en_cour\"";}?>>Se connecter</a></li>
				<li><a href="#" <?php if ($en_cour == "S'incrire") { echo "id=\"en_cour\"";}?>>S'incrire</a></li>

			</ul>
		</div>
			<div id="info">
				<div class="bottom-header">
					<!--<div class="container">
						<div class="top-news pull-left">-->
						<span>INFOS</span>
							<!--<div class="list_carousel">-->
							<ul>
								<li><a href="#">- Déjà 50 abonnés sur la chaîne, merci !</a></li>
								<li><a href="#">- Le site est en cour développement</a></li>
							</ul>
						<!--</div>
					</div>-->
				</div>
			</div>
	</div>
</div>

<style type="text/css" href="style.css">
#info {
	display: block;
	margin-top: 0px;
	position: relative;
	background-color: black;
	text-align: center;
	width: 1350px;
}
#info ul li {
	display: inline-block;
	margin-left: 20px;
}
#info ul li a {
	display: inline-block;
	font-size: 20px;
	font-family: 'Tohoma';
	text-decoration: none;
	color: white;
	padding-bottom: -5px;
	z-index: 1;
}
#info ul li a:after {
	display: block;
	margin: auto;
	margin-top: 40px;
	height: 4px;
	width: 0px;
	background: transparent;
	transition: width .5s ease, background-color .5s ease;
}
#info ul li a:hover:after {
	width: 100%;
	background: #9bd1f1;;
}
.bottom-header {
	background-color: #258DCB;
	height: 50px;
	text-align: left;
}
.bottom-header ul li {
	margin-top: 13px;
}
span {
	margin-top: 15px;
	float: left;
	margin-left: 50px;
}
#logo {
	float: left;
	margin-left: 20px;
}
#navigation {
	display: block;
	position: relative;
	background-color: black;
	text-align: center;
	width: 1350px;
}
#navigation ul li {
	display: inline-block;
	margin-left: 20px;
}
#navigation ul li a {
	display: inline-block;
	font-size: 20px;
	font-family: 'Tohoma';
	text-decoration: none;
	color: white;
	padding-bottom: -5px;
	z-index: 1;
}
#navigation ul li a:after {
	content: "";
	display: block;
	margin: auto;
	margin-top: 40px;
	height: 4px;
	width: 0px;
	background: transparent;
	transition: width .5s ease, background-color .5s ease;
}
#navigation ul li a:hover:after {
	width: 100%;
	background: #9bd1f1;;
}
/*#menu ul li a:hover {
	border-bottom: 3px solid #9bd1f1;
	z-index: 1;
}*/
#separation {
	display: block;
	width: 100px;
	height: 2px;
	background-color: #46a2d9;
	z-index: 1000000000;
}
#navigation #en_cour {
	border-bottom: 4px solid #9bd1f1;
	margin-bottom: -150px;
}
</style>