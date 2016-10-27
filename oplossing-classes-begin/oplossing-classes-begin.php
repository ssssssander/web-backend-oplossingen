<?php
	spl_autoload_register(function ($className) {
	    include "classes/" . $className . ".php";
	});

	$percent = new Percent(4899, 3684);
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
			}
			table, tr, td {
				border: 1px solid #000;;
			}
			td {
				padding: 20px;
			}
		</style>
	</head>
	<body>
		<table>
			<caption>Hoeveel procent is <?= $percent->new ?> van <?= $percent->unit ?>?</caption>
			<tr>
				<td>Absoluut</td>
				<td><?= $percent->absolute ?></td>
			</tr>
			<tr>
				<td>Relatief</td>
				<td><?= $percent->relative ?></td>
			</tr>
			<tr>
				<td>Geheel getal</td>
				<td><?= $percent->hundred ?>%</td>
			</tr>
			<tr>
				<td>Nominaal</td>
				<td><?= $percent->nominal ?></td>
			</tr>
	</body>
</html>