<?php
	try {
		$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "Ikzagtweeberenbroodjessmeren",
			array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$queryString = "SELECT *
						FROM bieren
						JOIN brouwers
						ON bieren.brouwernr = brouwers.brouwernr
						WHERE bieren.naam LIKE 'du%' AND brouwers.brnaam LIKE '%a%'";

		$statement = $db->prepare($queryString);
		$statement->execute();
		$fetchAssoc = array();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			array_push($fetchAssoc, $row);
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
				<table>
					<thead>
						<tr>
							<th>#</th>
							<th>biernr (PK)</th>
							<th>naam</th>
							<th>brouwernr</th>
							<th>soortnr</th>
							<th>alcohol</th>
							<th>brnaam</th>
							<th>adres</th>
							<th>postcode</th>
							<th>gemeente</th>
							<th>omzet</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($fetchAssoc as $row): ?>
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
	</body>
</html>