<?php
	class InputSaver {
		private $inputs = array();

		public function __construct($inputs, $redirect = false) {
			$this->inputs = $inputs;
			$inputsCount = count($this->inputs);

			for($i = 0; $i < $inputsCount; $i++) {
				$_SESSION["inputSaver"][$this->inputs[$i]] = $_POST[$this->inputs[$i]];
			}

			if($redirect) {
				header("Location: " . $_SERVER["PHP_SELF"]);
			}
		}

		public static function exists() {
			return isset($_SESSION["inputSaver"]);
		}

		public static function get() {
			if(InputSaver::exists()) {
				static $counter = 0;
				
				$input = array_keys($_SESSION["inputSaver"])[$counter];
				$counter++;

				if($counter >= count($_SESSION["inputSaver"])) {
					$counter = 0;
				}
				return $_SESSION["inputSaver"][$input];
			}
			else {
				return "";
			}
		}

		public static function remove() {
			unset($_SESSION["inputSaver"]);
		}
	}
?>