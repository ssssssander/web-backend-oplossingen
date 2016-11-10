<?php
	class Message {
		public $message = array();

		public function createMessage($message) {
			$_SESSION["message"]["type"] = $message["type"];
			$_SESSION["message"]["text"] = $message["text"];
		}

		public function showMessage() {
			if(isset($_SESSION["message"])) {
				$this->message["type"] = $_SESSION["message"]["type"];
				$this->message["text"] = $_SESSION["message"]["text"];
				unset($_SESSION["message"]);
				return $this->message;
			}
			else {
				return false;
			}
		}
	}
?>