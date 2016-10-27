<?php
	class Percent {
		public $absolute, $relative, $hundred, $nominal, $new, $unit;

		public function __construct($new, $unit) {
			$this->new = $new;
			$this->unit = $unit;

			$this->absolute = $new / $unit;
			$this->relative = $this->absolute - 1;
			$this->hundred = $this->absolute * 100;

			if($this->absolute > 1) {
				$this->nominal = "positive";
			}
			elseif($this->absolute == 1) {
				$this->nominal = "status-quo";
			}
			else {
				$this->nominal = "negative";
			}

			$this->absolute = $this->formatNumber($this->absolute);
			$this->relative = $this->formatNumber($this->relative);
			$this->hundred = $this->formatNumber($this->hundred);
		}

		public function formatNumber($number) {
			$number = number_format($number, 2);
			return $number;
		}
	}
?>