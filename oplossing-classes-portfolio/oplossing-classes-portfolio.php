<?php
	spl_autoload_register(function ($className) {
	    include "classes/" . $className . ".php";
	});

	$bodyPage = "index.partial.php";

	if(isset($_GET["page"])) {
		switch($_GET["page"]) {
			case "gallery" : $bodyPage = $_GET["page"] . ".partial.php";
				break;
			case "blog" : $bodyPage = $_GET["page"] . ".partial.php";
				break;
			case "contact" : $bodyPage = $_GET["page"] . ".partial.php";
				break;
		}
	}
	$portfolioSite = new HTMLBuilder("header.partial.php", $bodyPage, "footer.partial.php", "Rick Sanchez Portfolio", "Rick Sanchez");
?>