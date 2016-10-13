<?php
	$rijen = 10;
	$kolommen = 10;
	$tafels = array();

	for($i = 0; $i <= $rijen; $i++) {
		array_push($tafels, array());
	}
	for($i = 0; $i <= $rijen; $i++) {
		for($j = 0; $j <= $kolommen; $j++) {
			array_push($tafels[$j], $i * $j);
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			.oneven {
				background-color: lightgreen;
			}
		</style>
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<th>Tafel</th>
					<?php for($i = 0; $i <= $rijen; $i++): ?>
						<th><?= $i ?></th>
					<?php endfor ?>
				</tr>
			</thead>
			<?php foreach($tafels as $tafel): ?>
				<tr>
					<th><?php static $i = 0; echo $i; ++$i ?></th>
					<?php foreach($tafel as $getal): ?>
						<td <?php echo ($getal) % 2 != 0 ? "class='oneven'" : "" ?>><?php echo $getal ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</table>
	</body>
</html>