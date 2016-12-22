<?php
	class Notification {
		private $type = "";
		private $text = "";

		public function __construct($type, $text, $redirectUrl = "") {
			$this->type	= $type;
			$this->text	= $text;
			$_SESSION["notification"] = array("type" => $this->type, "text" => $this->text);
			if(!empty($redirectUrl)) header("Location: " . $redirectUrl);
		}

		public static function exists() {
			return isset($_SESSION["notification"]);
		}

		public static function get() {
			return $_SESSION["notification"];
		}

		public static function remove() {
			unset($_SESSION["notification"]);
		}
	}
?>