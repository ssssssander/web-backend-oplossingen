<?php
	class Database {
		private $dbName = "";
		private $db = "";

		public function __construct($dbName) {
			$this->dbName = $dbName;

			$this->db = new PDO("mysql:host=localhost;dbname=" . $this->dbName, "root",
						"Iakzagtweeberenbroodjessmeren", array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}

		public function query($queryString, $placeholders = false) {
			$statement = $this->db->prepare($queryString);

			if($placeholders)
			{
				foreach($placeholders as $placeholderName => $placeholderValue)
				{
					$statement->bindValue($placeholderName, $placeholderValue);
				}
			}

			$statement->execute();

			$result = array();

			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				array_push($result, $row);
			}

			if(empty($result))
			{
				$result = false;
			}

			return $result;
		}
	}
?>