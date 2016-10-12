<?php
	$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";

	function md5Static() {
		static $md5HashKey;
		return $md5HashKey;
	}
	function md5Static() {
		global $md5HashKey;
		return $md5HashKey;
	}
	function md5Callback() {
		return $md5HashKey;
	}

	// Niet af
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>

	</body>
</html>