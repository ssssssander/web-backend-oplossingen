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

	function searchFiles($dir) {
		if(isset($_GET["searchQuery"]) && !empty($_GET["searchQuery"])) {
			$fileNames = showList($dir);
			$searchResults = array();

			foreach($fileNames as $fileName) {
				if(preg_match("/" . $_GET["searchQuery"] . "/i", basename($fileName))) {
						array_push($searchResults, $fileName);
					}
			}
			if(count($searchResults) > 0) {
				return $searchResults;
			}
			else {
				return "Spijtig, geen zoekresultaten gevonden voor " . $_GET["searchQuery"];
			}
			
		}
	}

	$searchResults = searchFiles($dir);
	if(isset($_GET["searchQuery"])) {
		$h1 = "Zoekresultaat voor " . $_GET["searchQuery"];
	}
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
		<?php elseif(isset($searchResults)): ?>
			<?php if(is_array($searchResults)): ?>
				<ul>
				<?php foreach($searchResults as $searchResult): ?>
					<li>
						<a href="<?= "http://web-backend.local/" . substr($searchResult, strrpos($searchResult, "cursus")) ?>">
							<?= basename($searchResult) ?>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
			<?php else: ?>
				<?= $searchResults ?>
			<?php endif ?>
		<?php endif ?>
		<?php if(isset($cursusSrc)): ?>
			<iframe style="width:750px;height:1000px;" src="<?= $cursusSrc ?>"></iframe>
		<?php endif ?>
	</body>
</html>