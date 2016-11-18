<?php
class ExceptionImproved extends Exception {
	private $messageArray;

	public function __construct($messageArray = array()) {
		$this->messageArray = $messageArray;
    }

    public function getMessageArray() {
    	return $this->messageArray;
    }
}
?>