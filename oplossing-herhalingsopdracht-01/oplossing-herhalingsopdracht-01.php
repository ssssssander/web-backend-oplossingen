<?php
	$h1 = "";
	$dir = "../../cursus/public/cursus/";

	if(isset($_GET["link"])) {
		switch($_GET["link"]) {
			case "cursus" : $cursusSrc = "http://web-backend.local/cursus/web-backend-cursus.pdf";
			$h1 = "Inhoud";
				break;
			case "voorbeelden" : $fileNames = showList($dir . $_GET["link"]);
			$h1 = "Index van de " . $_GET["link"];
				break;
			case "opdrachten" : $fileNames = showList($dir . $_GET["link"]);
			$h1 = "Index van de " . $_GET["link"];
				break;
		}
	}

	function showList($dir) {
		$fileNames = array();
		foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)) as $fileName) {
			if(substr($fileName, -4) == ".php") {
				array_push($fileNames, $fileName);
			}
		}
		return $fileNames;
	}

	// function searchFiles() {
	// 	if(isset($_GET["searchQuery"])) {
	// 		$dirVoorbeelden = "../../cursus/public/cursus/voorbeelden";
	// 		$dirOplossingen = "../../cursus/public/cursus/oplossingen";

	// 		foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dirVoorbeelden)) as $fileName) {
	// 			if(substr($fileName, -4) == ".php") {
	// 				preg_match("/" . $_GET["searchQuery"] . "/i", $fileName);
	// 			}
	// 		}
	// 	}
	// }
	// searchFiles();
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<h1>Indexpagina</h1>
		<ul>
			<li><a href="oplossing-herhalingsopdracht-01.php?link=cursus">Cursus</a></li>
			<li><a href="oplossing-herhalingsopdracht-01.php?link=voorbeelden">Voorbeelden</a></li>
			<li><a href="oplossing-herhalingsopdracht-01.php?link=opdrachten">Opdrachten</a></li>
		</ul>
		<form action="oplossing-herhalingsopdracht-01.php" method="get">
			<label for="search">Zoek naar:</label><input type="text" name="searchQuery" id="search" placeholder="Geef een zoekterm in">
			<input type="submit">
		</form>
		<h1><?= $h1 ?></h1>
		<?php if(isset($fileNames)): ?>
			<ul>
			<?php foreach($fileNames as $fileName): ?>
				<li>
					<a href="<?= "http://web-backend.local/" . substr($fileName, strrpos($fileName, "cursus")) ?>">
						<?= basename($fileName) ?>
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		<?php endif ?>
		<?php if(isset($cursusSrc)): ?>
			<iframe style="width:750px;height:1000px;" src="<?= $cursusSrc ?>"></iframe>
		<?php endif ?>
	</body>
</html>