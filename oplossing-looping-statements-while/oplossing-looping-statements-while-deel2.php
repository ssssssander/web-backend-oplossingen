<?php
	$boodschappenlijstje = array("Bananen", "Plat water", "Chips", "Broccoli", "Rode bonen");
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<ul>
			<?php for($i = 0; $i < count($boodschappenlijstje); $i++): ?>
			<li><?php echo $boodschappenlijstje[$i] ?></li>
			<?php endfor ?>
		</ul>
	</body>
</html>