<?php
	session_start();

	spl_autoload_register(function ($class) {
		include "classes/" . $class . ".php";
	});

	try {
		if(isset($_POST["submit"])) {
			try {
				$db = new Database("opdracht-mod-rewrite-blog");
			}
			catch(PDOException $e) {
				new InputSaver(["title", "article", "keywords", "date"]);
				new Notification("error", "Kan geen verbinding maken met de databank: " . $e->getMessage(),
					"artikel-toevoegen-form.php");
			}
		}
	}
	catch(Exception $e) {
		new InputSaver(["title", "article", "keywords", "date"]);
		new Notification("error", $e->getMessage(), "artikel-toevoegen-form.php");
	}
?>