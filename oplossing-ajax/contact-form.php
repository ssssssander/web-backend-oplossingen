<?php
	session_start();

	spl_autoload_register(function ($class) {
		include "classes/" . $class . ".php";
	});

	$email = isset($_SESSION["remember"]["email"]) ? $_SESSION["remember"]["email"] : "";
	$message = isset($_SESSION["remember"]["message"]) ? $_SESSION["remember"]["message"] : "";
	$sendCopy = isset($_SESSION["remember"]["sendCopy"]) ? $_SESSION["remember"]["sendCopy"] : "";
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<h1>Contacteer ons</h1>
		<?php if(Notification::exists()): ?>
			<p class=<?= Notification::get()["type"] ?>><?= Notification::get()["text"] ?></p>
		<?php endif ?>
		<form action="contact.php" method="post" id="contact-form">
			<label for="email">E-mailadres</label>
			<input type="email" name="email" id="email" value=<?= $email ?>>
			<label for="message">Boodschap</label>
			<textarea name="message" id="message"><?= $message ?></textarea>
			<input type="checkbox" name="sendCopy" id="send-copy" <?= $sendCopy ?>>
			<label for="send-copy">Stuur een kopie naar mezelf</label>
			<input type="submit" name="submit">
		</form>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			$(function(){
				$("#contact-form").submit(function(){
					var formData = $("#contact-form").serialize();

					$.ajax({
						type: "POST",
						url: "contact-API.php",
						data: formData,
						success: function(data) {
							var parsedData = JSON.stringify(data);

							if(parsedData["type"] === "success") {
								$("#contact-form").fadeOut(function() {
									$("body").append($("<p class='" + parsedData["type"] + "'>" + parsedData["text"] + "</p>").hide().fadeIn());
								});
							}
							else if(parsedData["type"] === "error") {
								$("#contact-form").prepend($("<p class='" + parsedData["type"] + "'>" + parsedData["text"] + "</p>").hide().fadeIn());
							}
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>
<?php
	session_unset();
?>