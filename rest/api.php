<?php
/*
Author: Abhijeet Shekhar

*/
 	require_once("Rest.inc.php");
 	require("config.php");
	//echo "test";die();
	class API extends REST {
	
		public $data = "";
		private $db = NULL;
		private $mysqli = NULL;
		public function __construct(){
			parent::__construct();				// Init parent contructor
			$this->dbConnect();					// Init Database connection
		}
		
		/*
		 *  Connect to Database
		*/
		private function dbConnect(){
			$this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB);
		}
		
		/*
		 * Dynmically call the method based on the query string
		 */
		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['x'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404); // If the method does not exist "Page not found".
		}
				
		/*
		Get list of team 
		*/
		private function team(){
		try {
				
			if($this->get_request_method() == "GET"){
							
			$query="SELECT * from soccer_team";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			if($r->num_rows > 0){
				$result = array();
				while($row = $r->fetch_assoc()){
					$result[] = $row;
				}
				$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If there is no record.
}
			if($this->get_request_method() == "DELETE"){
			$id = (int)$this->_request['id'];

			if($id > 0){				
				$query="DELETE FROM soccer_team WHERE identifier = $id";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "Successfully deleted one record.");
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	// If there is no record.
		}
		} catch (Exception $e) {
		//log to text file		
			}
		}
		
		/*
		 *	Encode array into JSON
		*/
		private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}
	
	// Init Library
	
	$api = new API;
	$api->processApi();
?>