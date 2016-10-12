<?php
	$rijen = 10;
	$kolommen = 10;
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
			<?php for($i = 0; $i <= $rijen; $i++): ?>
				<tr>
					<?php for($j = 0; $j <= $kolommen; $j++): ?>
						<td <?php echo ($i * $j) % 2 != 0 ? "class='oneven'" : "" ?>><?php echo $i * $j ?></td>
					<?php endfor ?>
				</tr>
			<?php endfor ?>
		</table>
	</body>
</html>