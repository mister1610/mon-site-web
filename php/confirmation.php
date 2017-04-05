<?php
require_once('config.php');

	if(isset($_GET['pseudo'], $_GET['key']) AND !empty($_GET['pseudo']) AND !empty($_GET['key']))
	{
		$pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
		$Key = htmlspecialchars($_GET ['Key']);
		$requser = $bdd->prepare('SELECT * FROM membre WHERE pseudo = ? AND confirmekey = ?');
		$requser->execute(array($pseudo, $key));
		$userexist = $requser->rowCount();

		if($userexist == 1)
		{
			$user = $requser->fetch();
			if($user['confirme'] == 0) 
			{
				$updateuser = $bdd->prepare("UPDATE membre SET confirme = 1 WHERE pseudo = ? AND confirmekey = ?");
				$updateuser->execute(array($pseudo, $key));
				echo "Votre compte à bien était confirmer !";
			}
			else
			{
				echo "Votre compte à déjà était confirmer !";
			}
		}
		else
		{
			echo "L'utilisateur n'existe pas !";
		}
	}
?>