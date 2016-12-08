<?php
	session_start();

	setcookie("login", "", 1);
	setcookie("login", false);
	unset($_COOKIE["login"]);
	$_SESSION["notification"]["type"] = "message";
	$_SESSION["notification"]["message"] = "U bent uitgelogd. Tot de volgende keer";
	header("Location: login-form.php");
?>