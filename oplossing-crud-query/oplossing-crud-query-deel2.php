<?php
	try {
		$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "Ikzagtweeberenbroodjessmeren",
			array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$brewersQueryString = 	"SELECT brouwernr, brnaam
								FROM brouwers";

		$brewersStatement = $db->prepare($brewersQueryString);
		$brewersStatement->execute();
		$brewers = array();

		while($row = $brewersStatement->fetch(PDO::FETCH_ASSOC))
		{
			array_push($brewers, $row);
		}

		if(isset($_GET["brewerNr"])) {
			$beersQueryString = "SELECT bieren.naam
								FROM bieren
								WHERE brouwernr = :brewerNr";

			$beersStatement = $db->prepare($beersQueryString);
			$beersStatement->bindValue(":brewerNr", $_GET["brewerNr"] );
			$beersStatement->execute();
			$beers = array();

			while($row = $beersStatement->fetch(PDO::FETCH_ASSOC))
			{
				array_push($beers, $row);
			}
		}
	}
	catch (PDOException $e)
	{
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
		</style>
	</head>
	<body>
		<?php if(isset($message)): ?>
			<p><?= $message ?></p>
		<?php else: ?>
			<form action="" method="get">
				<select name="brewerNr">
					<?php foreach($brewers as $row): ?>
						<?php if(isset($_GET["brewerNr"]) && $_GET["brewerNr"] === $row["brouwernr"]): ?>
							<option value="<?= $row['brouwernr'] ?>" selected><?= $row["brnaam"] ?></option>
						<?php else: ?>
							<option value="<?= $row['brouwernr'] ?>"><?= $row["brnaam"] ?></option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
				<input type="submit" value="Geef mij alle bieren van deze brouwerij">
			</form>
			<?php if(isset($_GET["brewerNr"])): ?>
				<table>
					<thead>
						<tr>
							<th>#</th>
							<th>naam</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($beers as $row): ?>
							<?php static $resultNumber = 0; ++$resultNumber ?>
							<tr>
								<td><?= $resultNumber ?></td>
								<?php foreach($row as $value): ?>
									<td><?= $value ?></td>
								<?php endforeach ?>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		<?php endif ?>
	</body>
</html>