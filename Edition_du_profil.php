<?php

require_once('php/config.php');
include_once('php/cookie_connect.php');


if(isset($_SESSION['pseudo']) AND $_SESSION['mail']) 
{
	$requser = $bdd->prepare("SELECT * FROM membre WHERE id = ?");
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch();

	if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $_SESSION['pseudo'])
	{
		$newpseudo = htmlspecialchars($_POST['newpseudo']);
		$insertpseudo = $bdd->prepare("UPDATE membre SET pseudo = ? WHERE id = ?");
		$insertpseudo->execute(array($newpseudo, $_SESSION['id'])); 

		if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $_SESSION['mail']) // faire verif si mail pas deja utilisé
		{
			$newmail = htmlspecialchars($_POST['newmail']);
			$insertmail = $bdd->prepare("UPDATE membre SET mail = ? WHERE id = ?");
			$insertmail->execute(array($newmail, $_SESSION['id']));

			if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
			{
				$mdp1 = sha1($_POST['newmdp1']);
				$mdp2 = sha1($_POST['newmdp2']);

				if ($mdp1 == $mdp2) 
				{
					$insertmdp = $bdd->prepare("UPDATE membre SET motdepasse = ? WHERE id = ?");
					$insertmdp->execute(array($mdp1, $_SESSION['id']));
					header('Location: profil.php?'.$_SESSION['pseudo']);
				}
				else
				{
					$erreur = "Mot de passe différent!";
				}
			}
			else
			{
				$erreur ="Un des champs du mot de passe est vide!";
			}
		}
		else
		{
			$erreur = "Adresse mail déjà utilisée!";
		}
	}
}				

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) 
{
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

   if($_FILES['avatar']['size'] <= $tailleMax) 
   {
    	$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

	    if(in_array($extensionUpload, $extensionsValides)) 
	    {
	        $chemin = "avatars/".$_SESSION['pseudo'].".".$extensionUpload;
	        $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

	        if($resultat) 
	        {
	            $updateavatar = $bdd->prepare('UPDATE membre SET avatar = :avatar WHERE pseudo = :pseudo');
	            $updateavatar->execute(array(
	               'avatar' => $_SESSION['pseudo'].".".$extensionUpload,
	               'pseudo' => $_SESSION['pseudo']));
            	header('Location: profil.php?'.$_SESSION['pseudo']);

         	}
         	else 
         	{
            	$msg = "Erreur durant l'importation de votre photo de profil";
         	}
      	} 
      	else 
      	{
         	$msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      	}
   	} 
   	else 
   	{
      	$msg = "Votre photo de profil ne doit pas dépasser 2Mo";
   	}
}

if (isset($_POST['newpseudo']) AND $_POST['newpseudo'] == $_SESSION['pseudo']) 
{
  header('Location: profil.php?'.$_SESSION['pseudo']);
}


?>
<html lang="fr">
    <head>
  		<title>Profil de <?php echo $_SESSION['pseudo']; ?> - Mister1610</title>
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
  <section class="menu1" style="height: 570px;"><!--Tous ce qui va être a gauche de l'écran-->
        <div class="menu1">
                <div class="lieu">
                        <br>
                        Vous êtes ici:  <a href="home_profil.php"><strong>Accueil</strong></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href=""><strong><?php echo $_SESSION['pseudo']; ?></strong></a>
                        <br>
                        <br> 
                        <hr>
                </div> 
        </div>
        <div class="edition">
        <h2 style="margin-left: 15px">Edition du profil de <?php echo $_SESSION['pseudo']; ?></h2>
          <form method="POST" action="" class="Edition_Profil" enctype="multipart/form-data">
            <label>Avatar</label><br>
            <input type="file" name="avatar" class="avatar">
            <br>
            <label>Pseudo</label><br>
            <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $_SESSION['pseudo']; ?>">
            <br><br>
            <label>Adresse mail</label><br>
            <input type="email" name="newmail" placeholder="Adresse mail" value="<?php echo $_SESSION['mail']; ?>">
            <br><br>
            <label>Nouveau mot de passe</label><br>
            <input type="password" name="newmdp1" placeholder="Mot de passe">
            <br><br>
            <label>Confirmation du mot de passe</label><br>
            <input type="password" name="newmdp2" placeholder="Mot de passe">
            <br><br>
            <input type="submit" name="Enregistrer" value="Enregistrer" class="bt_enregistre">
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
<?php include("footer-view.php"); ?>
</div>
</body>
</html>
<style type="text/css">
.footer {
	margin-top: 265px;
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
.Edition_Profil {
  margin-left: 15px;
}
.Edition_Profil input {
  height: 30px;
}
.bt_enregistre {
  display: block;
  text-align: center;
  padding: 5px 10px;
  margin: 8px auto 0 14px;
  background: black;
  border: 2px solid black;
  color: white;
  transition: all .3s ease;
}
.avatar {
  outline: none;
  padding: 3px 5px;
  margin-bottom: 10px;
  box-shadow: none;
  border: 1px solid #A9A9A9;
}
</style>
