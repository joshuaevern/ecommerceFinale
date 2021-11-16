<?php 

require('db_cred.php');

class Dbconnection{

	// db connection
	public $db = null;
	// query results
	public $results = null;



	// method used to connect to the database
	function connection(){

		// connect to the database
		$this->db = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

		// if there are errors, return false
		if(mysqli_connect_errno()){
			return false;
		}

		// else return true
		return true;

	}

	// execute database sql statements (insert, update, and delete)
	function query($query){

		// check if the connection was successful
		if($this->connection() == false){
			return false;
		}

		// else execute the query
		$this->results = mysqli_query($this->db, $query);

		// check if results is returning false
		if($this->results !=true){
			return false;
		}

		// else return true
		return true;

	}

	function fetch(){
        //check if result was set
        if ($this->results == null) {
            return false;
        }
        elseif ($this->results == false) {
            return false;
        }
        //return a record
        return mysqli_fetch_assoc($this->results);

    }


	// method to fetch one row from database (select)
	function fetchOne($query){
		// if query executes successfully
		if($this->query($query)) {
			// return one row
			return mysqli_fetch_assoc($this->results);
		}
		// else return false
		return false;
	}

	function count(){
		
	}


}



?>