<?php

require_once('config.php');

if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1) { // condition pour pas que tous le monde puisse aller sur l'admin
	exit();
}

if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) { //condition pour la confirmation par mail
	$confirme = (int) $_GET['confirme'];

	$req = $bdd->prepare('UPDATE membre SET confirme = 1 WHERE id = ?');
	$req->execute(array($confirme));
}

if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) { // condition pour supprimer un membre
	$supprime = (int) $_GET['supprime'];

	$req = $bdd->prepare('DELETE FROM membre WHERE id = ?');
	$req->execute(array($supprime));
}

$membres = $bdd->query('SELECT * FROM membre ORDER BY id DESC LIMIT 0,10');

?>

<html lang="fr">
      <head>
	<title>Admin - Mister1610</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css">
       </head>
<body>


<br>
<ul>
	<?php while($m = $membres->fetch()) { ?>
	<li><?= $m['id'] ?> : <?= $m['pseudo'] ?> , <?= $m['mail']?> <?php if($m['confirme'] == 0) { ?> - <a href="admin.php?confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="admin.php?supprime=<?= $m['id'] ?>">Supprimer</a></li>	
	<?php } ?>
</ul>



</body>
</html>
