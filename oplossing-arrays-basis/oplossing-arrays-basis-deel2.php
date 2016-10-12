<?php
	$getallen1Tot5 = array(1, 2, 3, 4, 5);
	$getallen5Tot1 = array(5, 4, 3, 2, 1);
	$onevenGetallen = [];
	$sommen = [];

	$product = $getallen1Tot5[0] * $getallen1Tot5[1] * $getallen1Tot5[2] * $getallen1Tot5[3] * $getallen1Tot5[4];

	for($i = 0; $i < count($getallen1Tot5); $i++) {
		if($getallen1Tot5[$i] % 2 != 0) {
			$onevenGetallen[] = $getallen1Tot5[$i];
		}
		$sommen[] = $getallen1Tot5[$i] + $getallen5Tot1[$i];
	}
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<p>Product getallen 1 tot 5: <?= $product ?></p>
		<p><pre><?= var_dump($onevenGetallen) ?></pre></p>
		<p><pre><?= var_dump($sommen) ?></pre></p>
	</body>
</html>