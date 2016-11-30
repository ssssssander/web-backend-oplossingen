<?php
	try {
		$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "Ikzagtweeberenbroodjessmeren",
			array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$brewersQueryString = 	"SELECT brnaam, adres, postcode, gemeente, omzet
								FROM brouwers";

		$brewersStatement = $db->prepare($brewersQueryString);
		$brewersStatement->execute();
		$brewersTableNames = array();

		for($i = 0; $i  < $brewersStatement->columnCount(); $i++) 
		{ 
			array_push($brewersTableNames, $brewersStatement->getColumnMeta($i)["name"]);
		}

		if(isset($_POST["submit"])) {
			$insertBrewerQueryString = 	"INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
										VALUES (:brewerName, :address, :postalCode, :city, :revenue)";

			$insertBrewerStatement = $db->prepare($insertBrewerQueryString);
			$insertBrewerStatement->bindValue(":brewerName", $_POST["brnaam"]);
			$insertBrewerStatement->bindValue(":address", $_POST["adres"]);
			$insertBrewerStatement->bindValue(":postalCode", $_POST["postcode"]);
			$insertBrewerStatement->bindValue(":city", $_POST["gemeente"]);
			$insertBrewerStatement->bindValue(":revenue", $_POST["omzet"]);

			if($insertBrewerStatement->execute()) {
				$message = "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is " . $db->lastInsertId();
			}
			else {
				$message = "Er ging iets mis met het toevoegen. Probeer opnieuw.";
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
			input {
				display: block;
			}
		</style>
	</head>
	<body>
		<?php if(isset($message)): ?>
			<p><?= $message ?></p>
		<?php else: ?>
			<h1>Voeg een brouwer toe</h1>
			<form action="" method="post">
				<?php if(isset($brewersTableNames)): ?>
					<?php foreach($brewersTableNames as $brewersTableName): ?>
						<label for="<?= $brewersTableName ?>">
							<?= $brewersTableName === "brnaam" ? "brouwernaam" : $brewersTableName ?>
						</label>
						<input type="text" name="<?= $brewersTableName ?>" id="<?= $brewersTableName ?>">
					<?php endforeach ?>
					<input type="submit" name="submit">
				<?php endif ?>
			</form>
		<?php endif ?>
	</body>
</html>