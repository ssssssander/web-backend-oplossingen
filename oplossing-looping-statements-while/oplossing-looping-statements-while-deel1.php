<?php
	$getallen = range(1, 101);
	$i = 0;
	$resultaat1 = "";
	$resultaat2 = "";

	while($getallen[$i] <= 100){
		$resultaat1 .= $getallen[$i] . ", ";
		if($getallen[$i] % 3 == 0 && $getallen[$i] > 40 && $getallen[$i] < 80) {
			$resultaat2 .= $getallen[$i] . ", ";
		}
		$i++;
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p><?= $resultaat1  ?></p>
		<p><?= $resultaat2  ?></p>
	</body>
</html>