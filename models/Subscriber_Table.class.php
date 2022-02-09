<?php
	include_once "admin/model/Table.class.php";

	class Subscriber_Table extends Table{
		public function saveClientEmails($email){
			$this->checkEmail ($email);
			$sql = "INSERT INTO subscribers (email) VALUES (?)";
			$data = array($email);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		private function checkEmail ($email) {
			$sql = "SELECT email FROM subscribers WHERE email = ?";
			$data = array($email);
			$statement = $this->executeStatement( $sql, $data );
			if ( $statement->rowCount() === 1 ) {
				$emailErr = new Exception("Error:'$email' already subscribed to our news letter, please use a different email address.");
				throw $emailErr;
			}
		}
		public function getNumOfPages(){
			$sql = "SELECT COUNT(*) AS numRecords FROM users";
			$statement = $this->executeStatement($sql);
			$model = $statement->fetchObject();
			return $model;
		}
		public function getSubscribers(){
			if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	    	$page_no = $_GET['page_no'];
		    } else {
		        $page_no = 1;
		    }
		    $total_records_per_page = 10;
		    $offset = ($page_no-1) * $total_records_per_page;
			$adjacents = "2";

			$sql = "SELECT * FROM subscribers ORDER BY id DESC LIMIT $offset, $total_records_per_page";
			$statement = $this->executeStatement($sql);
			return $statement;
		}
		/*public function getSubscribers(){
			$sql = "SELECT * FROM subscribers";
			$statement = $this->executeStatement($sql);
			return $statement;
		}*/
		public function deleteSubscriber($id){
			$sql = "DELETE FROM subscribers WHERE id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		public function getSubscriberCount(){
			$sql = "SELECT COUNT(*) AS subscriberCount FROM subscribers";
			$statement = $this->executeStatement($sql);
			$model = $statement->fetchObject();
			return $model;
		}
		public function searchSubscriber($searchTerm){
			$sql = "SELECT * FROM users WHERE email LIKE ? OR sub_date LIKE ?";
			$data = array("%$searchTerm%", "%$searchTerm%");
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
	}
?>