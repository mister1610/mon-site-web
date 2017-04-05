<?php include('footer.php'); ?>

<?php if($showcookie) {?>
<div class="cookie-alert">
	En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies dans le but d'améliorer votre expérience utilisateur.<br><a href="accept_cookie.php">OK</a>
</div>
<?php
}
?>

<div class="wrap_footer">
	<footer id="page-footer">
		<div class="container">
			<br>
		<p class="copy-right pull-left"> Copyright 2016 © mister1610 - Tous droits réservés</p>
		</div>
	</footer>
</div>

<style type="text/css" href="style.css">

.wrap_footer {
	width: 100%;
        background-color: #000000;
       margin-top:-5px;
}

#page-footer {
	display: block;
	width: 100%;
	height: 70px;
	background: #130e0a;
	margin: 0 auto;
	color: #ffffff;
	text-align: center;
}
#page-footer p {
	margin-top: 10px;
	margin-bottom: 0px;
	padding: 0;
}
#page-footer a {
	text-decoration: none;
	color: white;
}
#page-footer a:hover {
	text-decoration: underline;
}
#copy-right_pull-left p {
	display: inline-block;
	vertical-align: middle;
}
#contact p {
	display: inline-block;
	vertical-align: middle;
}
#copy-right_pull-left {
	display: inline-block;
	vertical-align: middle;
	font-size: 18px;
}
#autre {
	display: inline-block;
	vertical-align: middle;
}
.cookie-alert {
   position: fixed;
   bottom: 20px;
   right:20px;
   border-radius: 10px;
   background:#2f2f2f;
   color:#fff;
   padding:10px 15px;
   width:280px;
   font-family: 'Arial Unicode MS';
   z-index:100;
}
.cookie-alert a { 
   display:block;
   text-align: center;
   padding:5px 10px;
   margin:8px auto 0 auto;
   border-radius: 10px;
   background:transparent;
   border: 2px solid #46A2D9;
   color:#46A2D9;
   transition: all .3s ease;
}
   .cookie-alert a:hover {
      background: #46A2D9;
      color:#2f2f2f;
   }
@media only screen and (max-width:480px) {
   .cookie-alert {
      text-align: center;
      left: 0; right: 0;;
        margin: 0 auto;
      max-width:700px;
      padding:10px 30px;
   }
}
</style>
