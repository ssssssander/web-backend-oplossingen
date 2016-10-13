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
			<?php foreach($tafels as $tafel): ?>
				<tr>
					<?php foreach($tafel as $getal): ?>
						<td <?php echo ($getal) % 2 != 0 ? "class='oneven'" : "" ?>><?php echo $getal ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</table>
		<pre><?php var_dump($tafels) ?></pre>
	</body>
</html>