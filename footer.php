<?php


if(isset($_COOKIE['accept_cookie'])) {
	$showcookie = false;
}
else
{
	$showcookie = true;
}

require_once('footer-view.php');
?>