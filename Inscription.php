<?php

require_once('php/config.php');

if(isset($_POST['bt_inscription']))
{

   	$pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $motdepasse = sha1($_POST['motdepasse']);
    $motdepasse2 = sha1($_POST['motdepasse2']);


	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['motdepasse']) AND !empty($_POST['motdepasse2']))
	{

	   	$pseudolenght = strlen($pseudo);
	   	if($pseudolenght <= 255)
	   	{
	   		$reqpseudo = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ?");
	   		$reqpseudo->execute(array($pseudo));
	   		$pseudoexist = $reqpseudo->rowCount();

	   		if($pseudoexist == 0)
	   		{
		      	if($mail == $mail2)
		      	{
		         	if(filter_var($mail, FILTER_VALIDATE_EMAIL))
		         	{         
			            $reqmail = $bdd->prepare("SELECT * FROM membre   WHERE mail = ?"); //<!--Vérification si l'adresse mail existe déjà-->
			            $reqmail->execute(array($mail));
			            $mailexist = $reqmail->rowCount();
			            if($mailexist == 0)
			            {
			                if($motdepasse == $motdepasse2)
			                {
			                	$longueurKey = 20;
			                	$key = "";
			                	for ($i=1; $i <$longueurKey ; $i++) 
			                	{ 
			                		$key .= mt_rand(0,9);
			                	}

			                    $insertmbr = $bdd->prepare("INSERT INTO membre(pseudo, mail, motdepasse, confirmekey) VALUES(?, ?, ?, ?)");
			                    $insertmbr->execute(array($pseudo, $mail, $motdepasse, $key));

			                    $header="MIME-Version: 1.0\r\n";
								$header.='From:"PrimFX.com"<support@primfx.com>'."\n";
								$header.='Content-Type:text/html; charset="uft-8"'."\n";
								$header.='Content-Transfer-Encoding: 8bit';

								$message='
								<html>
									<body>
										<div align="center">
											<a href="http://127.0.0.1/mister1610/php/confirmation.php?'.urlencode($pseudo).'$key'.$key.'">Confirmez votre compte</a>
										</div>
									</body>
								</html>
								';

								mail($mail, "Confirmation du compte", $message, $header);

				                header('Location: Profil.php?'.$pseudo);
				            }
				            else
				            {
				                $erreur ="Vos mot de passe sont différent!";
				            }
				        }
				        else
				        {
				            $erreur = "Adresse mail déjà utilisé !";
				        }
				    }
				    else
				    {
				        $erreur = "Votre Adresse mail n'est pas valide!";
				    }
				}
				else
				{
				    $erreur ="Vos Adresse mail sont différente!";
				}
			}
			else
			{
				$erreur = "Pseudo déjà utilisé";
			}
		}
		else
		{
			$erreur = "Votre pseudo est trop long!";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent être complétés!";
	} 
}

?>
<html lang="fr">
      <head>
		<title>Inscription - Mister1610</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="js/jquery.mCustomScrollbar.css" />
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	    <script>
		    (function($){
		        $(window).load(function(){
		            $("body").mCustomScrollbar({
		            	theme:'minimal'
		            });
		        });
		    })(jQuery);
		</script>
       </head>
<body>
<?php $en_cour = "Accueil" ?>
<?php include("menu.php"); ?>
<br>
<div id="corps" style="height: 50%"><!--à recopier dans tout les fichier (div corps) -->
  <section class="menu1" style="height: 430px;"><!--Tous ce qui va être a gauche de l'écran-->
        <div class="menu1">
                <div class="lieu">
                        <br>
                        Vous êtes ici:  <a href=""><u>Accueil</u></a>
                        <br>
                        <br> 
                        <hr>
                </div> 
        </div>
	<div class="espace_inscription"><!--espace d'inscription --><!-- configurer php et php my admin-->
	  <h4>INSCRIPTION&nbsp;</h4>
	  <a href="" class="account">Déjà Inscrit ? Connectez-vous ICI.</a>
	  <br><br>
	  <form class="forminscription" method="post" action="">
	    <input type="text" placeholder="Pseudo" name="pseudo" class="remplir" style="
										margin-left: 15px; height: 35px" width="250px" value="<?php if(isset($pseudo)) {echo $pseudo; } ?>">
	    <br>
	    <input type="email" placeholder="Adresse mail" name="mail" class="remplir" style="
										margin-left: 15px; height: 35px" width="250px" value="<?php if(isset($pseudo)) { echo $mail; } ?>">
	    <br>
	    <input type="email" placeholder="Confimer votre Adresse mail" name="mail2"  class="remplir"style="
										margin-left: 15px; height: 35px" width="250px"value=" <?php if(isset($mail2)) { echo $mail2; }?>">
	    <br>
	    <input type="password" placeholder="Mot de passe" name="motdepasse"  class="remplir"style="
										       margin-left: 14px; height: 35px" width="250px">
	    <br>
	    <input type="password" placeholder="Confirmer votre Mot de passe" name="motdepasse2"  class="remplir"style="
										margin-left: 15px; height: 35px" width="250px">
	    <br>
	    <input type="submit" name="bt_inscription" value="Inscription" style="
    margin-left: 14px" width="30px">
	    &nbsp;&nbsp;
	    <br><br>
	  </form>
	  <?php
	     if(isset($erreur))
	     {
	         echo '<font color="red">'.$erreur."</font>";
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
<br>
<br>
<?php include("footer.php"); ?>
</body>
</html>
