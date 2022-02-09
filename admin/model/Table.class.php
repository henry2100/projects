<?php
	class Table{
		protected $db;

		public function __construct($db){
			$this->db = $db;
		}

		protected function executeStatement($sql, $data = NULL){
			$statement = $this->db->prepare($sql);
			try{
				$statement->execute($data);
			}catch(Exception $e){
				$errMessage = "<p>You tried to run this sql: $sql</p>
                                <p>Exception $e</p>";
			}
			return $statement;
		}
	}
?>