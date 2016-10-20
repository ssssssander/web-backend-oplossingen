<?php
	setlocale(LC_ALL, "nld_nld");
	$timestamp = mktime(22, 35, 25, 1, 21, 1904);
	$datum = strftime("%d %B %Y, %H:%M:%S" , $timestamp);
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $timestamp ?></p>
		<p><?= $datum ?></p>
	</body>
</html>