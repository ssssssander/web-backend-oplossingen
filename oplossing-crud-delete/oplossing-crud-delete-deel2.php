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
		</style>
	</head>
	<body>
		<?php if(isset($message)): ?>
			<p><?= $message ?></p>
		<?php else: ?>
			<h1>Overzicht van de brouwers</h1>
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
						<th></th>
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
									<input type="submit" name="delete" value="<?= $row['brouwernr'] ?>">
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