<div id="wrap_menu_principal">
	<div class="menu_principal">
		<div class="navigation">
			<div class="logo">
			<br>
				<a href=""><img src="../image/logo.jpg" alt="Logo Mister1610" width="130" height="26"></a>
			</div>
			<ul>
				<li><a href="../home.php" style="width: 127px"<?php if ($en_cour == "ACCUEIL") { echo "id=\"en_cour\"";}?>>ACCUEIL</a></li>
				<li><a href="#" <?php if ($en_cour == "VIDEOS") { echo "id=\"en_cour\"";}?>>VIDEOS</a></li>
				<li><a href="#" <?php if ($en_cour == "CHAT") { echo "id=\"en_cour\"";}?>>CHAT</a></li>
				<li><a href="../Se_Connecter.php" style="width: 187px"<?php if ($en_cour == "Se Connecter") { echo "id=\"en_cour\"";}?>>SE CONNECTER</a></li>
				<li><a href="../Inscription.php" style="width: 150px"<?php if ($en_cour == "S'INSCRIRE") { echo "id=\"en_cour\"";}?>>S'INSCRIRE</a></li>

			</ul>
		</div>
			<div class="info">
				<div class="bottom-header">
					<span><b>INFOS&nbsp;&nbsp&nbsp;&nbsp|&nbsp&nbsp</b></span>
						<marquee >- Déjà 50 abonnés sur la chaîne, merci !&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
						- Le site est en cours de développement</marquee>
				</div>
			</div>
	 </div>
</div>
<style type="text/css" href="style.css">
.info {
	display: block;
	position: relative;
	color: white;
	text-align: center;
	width: 100%;
}
.info ul li {
	display: inline-block;
	margin-left: 20px;
}
.info ul li a {
	display: inline-block;
	font-size: 15px;
	font-family: 'Tohoma';
	text-decoration: none;
	color: white;
	padding-bottom: -5px;
	z-index: 1;
}
.info ul li a:after {
	display: block;
	margin: auto;
	margin-top: 20px;
	height: 4px;
	width: 0px;
	background: transparent;
}
.info ul li a:hover:after {
	width: 100%;
	background: #9bd1f1;;
}
.bottom-header {
	background-color: #258DCB;
	height: 50px;
	text-align: left;
	width:100%;
}
.bottom-header ul li {
	margin-top: 5px;
}
.bottom-header b {
	font-size:16px;
}
span {
	margin-top: 16px;
	float: left;
	margin-left: 50px;
}
.logo {
	float: left;
	height: 46px;
    width: 388px;
    margin-top: 16px;
}
.navigation {
	display: block;
	position: relative;
	background-color: black;
	text-align: center;
	width: 100%;
	margin-bottom: 0px;
	height: 97px;
}
.navigation ul li {
	display: inline-block;
	margin-left: 20px;
	margin-top:30px;
}
.navigation ul li a {
	display: inline-block;
	font-size: 20px;
	font-family: 'Tohoma';
	text-decoration: none;
	color: #C0C0C0;
	padding-bottom: -5px;
	z-index: 1;
}
.navigation ul li a:after {
	content: "";
	display: block;
	margin: auto;
	margin-top: 40px;
	height: 4px;
	width: 0px;
	background: transparent;
	transition: width .5s ease, background-color .5s ease;
}
.navigation ul li a:hover:after {
	width: 100%;
	background: #9bd1f1;;
}
#separation {
	display: block;
	width: 100px;
	height: 2px;
	background-color: #46a2d9;
	z-index: 1000000000;
}
.navigation #en_cour {   
	height: 26px;
    border-radius: 10px;
    background: transparent;
    border: 2px solid #46A2D9;
    color: white;
    transition: all .3s ease;
}
marquee {
	display: inline-block;
	color:white;
	margin-top:13px;
	font-size: 20px;
	font-family: 'Tohoma';
	text-decoration: none;
	width: 1209px;
}
</style>