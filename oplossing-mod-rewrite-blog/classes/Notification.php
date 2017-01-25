<?php
	class Notification {
		private $type = "";
		private $text = "";

		public function __construct($type, $text, $redirectUrl = false) {
			$this->type	= $type;
			$this->text	= $text;
			$_SESSION["notification"] = array("type" => $this->type, "text" => $this->text);
			if($redirectUrl) header("Location: " . $redirectUrl);
		}

		public static function exists() {
			return isset($_SESSION["notification"]);
		}

		public static function get($key) {
			if(Notification::exists()) {
				static $counter = 0;
				$session = $_SESSION["notification"][$key];
				$counter++;
				if($counter > 1) {
					Notification::remove();
				}
				return $session;
			}
		}

		public static function remove() {
			unset($_SESSION["notification"]);
		}
	}
?>