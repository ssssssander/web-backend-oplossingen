<?php
	$rijen = 10;
	$kolommen = 10;
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<table>
			<?php for($i = 0; $i < $rijen; $i++): ?>
				<tr>
					<?php for($j = 0; $j < $kolommen; $j++): ?>
						<td>kolom</td>
					<?php endfor ?>
				</tr>
			<?php endfor ?>
		</table>
	</body>
</html>