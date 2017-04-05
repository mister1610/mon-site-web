<?php

if(!isset($_SESSION['id']) AND isset($_COOKIE['pseudo'], $_COOKIE['password']) AND !empty($_COOKIE['pseudo'] AND !empty($_COOKIE['password'])))
{
	$requser = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? AND motdepasse = ? ");
	$requser->execute(array($_COOKIE['pseudo'], $_COOKIE['password']));
	$userexist = $requser->rowCount();
	if ($userexist == 1) 
	{
		$userinfo = $requser->fetch();
		$_SESSION['id'] = $userinfo['id'];
		$_SESSION['pseudo'] = $userinfo['pseudo'];
		$_SESSION['mail'] = $userinfo['mail'];
	}
}
?>