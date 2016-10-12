<?php
	$getallen = array(8, 7, 8, 7, 3, 2, 1, 2, 4);
	$uniekeGetallen = array_unique($getallen);
	rsort($uniekeGetallen);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><pre><?= var_dump($uniekeGetallen) ?></pre></p>
	</body>
</html>