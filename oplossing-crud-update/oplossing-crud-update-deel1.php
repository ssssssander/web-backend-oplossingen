<?php
	try {
		$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "Ikzagtweeberenbroodjessmeren",
			array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$brewersQueryString = 	"SELECT *
								FROM brouwers";

		$brewersStatement = $db->prepare($brewersQueryString);
		$brewersStatement->execute();
		$brewers = array();

		while($row = $brewersStatement->fetch(PDO::FETCH_ASSOC)) {
			array_push($brewers, $row);
		}
		$brewerNrs = array_column($brewers, "brouwernr");

		if(isset($_POST["confirmDelete"])) {
			$deleteBrewerQueryString =	"DELETE FROM brouwers
										WHERE brouwernr = :brewerNr";

			$deleteBrewerStatement = $db->prepare($deleteBrewerQueryString);
			$deleteBrewerStatement->bindValue(":brewerNr", $_POST["brewerNr"]);

			if($deleteBrewerStatement->execute()) {
				$message = "De datarij werd goed verwijderd.";
			}
			else {
				$message = "De datarij kon niet verwijderd worden. Probeer opnieuw.";
			}
		}

		if(isset($_POST["cancelDelete"])) {
			unset($_POST["delete"]);
		}

		if(isset($_POST["edit"])) {
			$editBrewerQueryString = 	"SELECT brnaam, adres, postcode, gemeente, omzet
										FROM brouwers
										WHERE brouwernr = :brewerNr";

			$editBrewerStatement = $db->prepare($editBrewerQueryString);
			$editBrewerStatement->bindValue(":brewerNr", $_POST["edit"]);

			if(in_array($_POST["edit"], $brewerNrs, true) && $editBrewerStatement->execute()) {
				$brewersTableNames = array();
				$brewer = array();

				for($i = 0; $i  < $editBrewerStatement->columnCount(); $i++) { 
					array_push($brewersTableNames, $editBrewerStatement->getColumnMeta($i)["name"]);
				}

				$brewer = $editBrewerStatement->fetch();
			}
			else {
				$message = "Deze brouwerij werd niet gevonden.";
			}
		}

		if(isset($_POST["wijzigen"]) && isset($_POST["brewerNr"])) {
			$updateBrewerQueryString = 	"UPDATE brouwers
										SET brnaam=:brewerName, adres=:address, postcode=:postalCode,
										gemeente=:city, omzet=:revenue
										WHERE brouwernr = :brewerNr";

			$updateBrewerStatement = $db->prepare($updateBrewerQueryString);
			$updateBrewerStatement->bindValue(":brewerNr", $_POST["brewerNr"]);
			$updateBrewerStatement->bindValue(":brewerName", $_POST["brnaam"]);
			$updateBrewerStatement->bindValue(":address", $_POST["adres"]);
			$updateBrewerStatement->bindValue(":postalCode", $_POST["postcode"]);
			$updateBrewerStatement->bindValue(":city", $_POST["gemeente"]);
			$updateBrewerStatement->bindValue(":revenue", $_POST["omzet"]);

			if(in_array($_POST["brewerNr"], $brewerNrs, true) && $updateBrewerStatement->execute()) {
				$updateSuccess = True;
				header("Location: " . $_SERVER["PHP_SELF"] . "?updateSuccess=1");
			}
			else {
				$updateSuccess = False;
				header("Location: " . $_SERVER["PHP_SELF"] . "?updateSuccess=0");
			}
		}
	}
	catch (PDOException $e) {
		$message = "Kan geen verbinding maken met de databank. " . $e->getMessage();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
			}
			thead > tr {
				background-color: #848484;
			}
			tbody > tr:nth-child(even) {
				background-color: #b1b1b1;
			}
			tbody > tr:nth-child(odd) {
				background-color: #dedede;
			}
			tr, td, th {
				border: 1px solid #000;
			}
			td, th {
				padding: 5px;
			}
			input[name=delete] {
				background: url("images/icon-delete.png") no-repeat;
			}
			input[name=edit] {
				background: url("images/icon-edit.png") no-repeat;
			}
			.image-button {
				color: transparent;
				border: none;
				cursor: pointer;
			}
			.confirmation-message {
				background-color: #f06f6f;
				border-radius: 5px;
				padding: 5px;
				margin: 5px 0;
			}
			.confirmation-message > p {
				margin: 0;
			}
			.selected {
				background-color: #f06f6f !important;
			}
			label+input {
				display: block;
			}
			.overlay {
				width: 100%;
				height: 100%;
				position: fixed;
				left: 0;
				top: 0;
				background-color: rgba(0, 0, 0, 0.7);
				z-index: 1;
			}
			.modal-message {
				padding: 5px;
				border-radius: 5px;
				position: fixed;
				z-index: 2;
				background-color: #fff;
				top: 50%;
    			left: 50%;
				-webkit-transform: translate(-50%, -50%);
				-moz-transform: translate(-50%, -50%);
				-ms-transform: translate(-50%, -50%);
				-o-transform: translate(-50%, -50%);
			 	transform: translate(-50%, -50%);
			}
		</style>
	</head>
	<body>
		<?php if(isset($message)): ?>
			<p><?= $message ?></p>
		<?php else: ?>
			<?php if(isset($brewer)): ?>
				<h1>Brouwerij <?= $brewer["brnaam"] ?> (# <?= $_POST["edit"] ?>) wijzigen</h1>
				<form action="" method="post">
					<?php foreach($brewersTableNames as $brewersTableName): ?>
						<label for="<?= $brewersTableName ?>">
							<?= $brewersTableName === "brnaam" ? "brouwernaam" : $brewersTableName ?>
						</label>
						<input type="text" name="<?= $brewersTableName ?>" id="<?= $brewersTableName ?>"
						value="<?= $brewer[$brewersTableName] ?>">
						<input type="hidden" name="brewerNr" value="<?= $_POST["edit"] ?>">
					<?php endforeach ?>
					<input type="submit" name="wijzigen">
				</form>
			<?php endif ?>
			<h1>Overzicht van de brouwers</h1>
			<?php if(isset($_GET["updateSuccess"])): ?>
				<div class="overlay"></div>
				<div class="modal-message">
				<?php if($_GET["updateSuccess"] == 1): ?>
					<p>Aanpassing succesvol doorgevoerd.</p>
				<?php else: ?>
					<p>Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de <a href="mailto:admin@site.com">systeembeheerder</a> wanneer deze fout blijft aanhouden.</p>
				<?php endif ?>
				<a href="oplossing-crud-update-deel1.php">OK</a>
				</div>
			<?php endif ?>
			<?php if(isset($_POST["delete"])): ?>
				<div class="confirmation-message">
					<p>Bent u zeker dat u deze datarij wil verwijderen?</p>
					<form action="" method="post">
						<input type="submit" name="confirmDelete" value="Ja!">
						<input type="submit" name="cancelDelete" value="Nee!">
						<input type="hidden" name="brewerNr" value="<?= $_POST['delete'] ?>">
					</form>
				</div>
			<?php endif ?>
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>brouwernr</th>
						<th>brnaam</th>
						<th>adres</th>
						<th>postcode</th>
						<th>gemeente</th>
						<th>omzet</th>
						<th colspan="2"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($brewers as $row): ?>
						<?php static $resultNumber = 0; ++$resultNumber ?>
						<tr class="<?= isset($_POST['delete']) && $_POST['delete'] === $row['brouwernr'] ? 'selected' : '' ?>">
							<td><?= $resultNumber ?></td>
							<?php foreach($row as $value): ?>
								<td><?= $value ?></td>
							<?php endforeach ?>
							<td>
								<form action="" method="post">
									<input type="submit" name="delete" class="image-button" value="<?= $row['brouwernr'] ?>">
								</form>
							</td>
							<td>
								<form action="" method="post">
									<input type="submit" name="edit" class="image-button" value="<?= $row['brouwernr'] ?>">
								</form>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot></tfoot>
			</table>
		<?php endif ?>
	</body>
</html>