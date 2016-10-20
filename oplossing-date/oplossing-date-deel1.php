<?php
	$timestamp = mktime(22, 35, 25, 1, 21, 1904);
	$datum = date("j F Y, g:i:s a" , $timestamp);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $timestamp ?></p>
		<p><?= $datum ?></p>
	</body>
</html>