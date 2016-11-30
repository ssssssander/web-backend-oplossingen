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

		if(isset($_POST["delete"])) {
			$deleteBrewerQueryString =	"DELETE FROM brouwers
										WHERE brouwernr = :brewerNr";

			$deleteBrewerStatement = $db->prepare($deleteBrewerQueryString);
			$deleteBrewerStatement->bindValue(":brewerNr", $_POST["delete"]);

			if($deleteBrewerStatement->execute()) {
				$message = "De datarij werd goed verwijderd.";
			}
			else {
				$message = "De datarij kon niet verwijderd worden. Probeer opnieuw.";
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
			input[type=submit] {
				background: url("images/icon-delete.png") no-repeat;
				color: transparent;
				border: none;
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<?php if(isset($message)): ?>
			<p><?= $message ?></p>
		<?php else: ?>
			<h1>Overzicht van de brouwers</h1>
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
						<tr>
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