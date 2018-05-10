<?php

class mysqldatabase {
	public $connection;
	public $db;
	private $last_query;
	private $magic_quotes_active;
	private $new_enough_php;

	function __construct($d){
		$this->db = $d;
		$this->open_connection();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->new_enough_php = function_exists("mysql_real_escape_string");
	}

	public function open_connection(){
		$this->connection= mysqli_connect(DB_SERVE,DB_USER,DB_PASS,$this->db);
		if(! $this->connection)
		die("User do not match!".mysqli_connect_error());
		//selecting database
		$select=mysqli_select_db($this->connection,$this->db);
		if(! $select)
		die("Database do not match!".mysqli_connect_error());
	}

	public function close_connection(){
		if(isset($this->connection)){
		mysqli_close($this->connection);
		unset($this->connection);
		}
	}


	public function query($sql){
		$this->last_query = $sql;
		$result = mysqli_query($this->connection,$sql);
		$this->comfirm($result);
		    return $result;   
	}


	public function fetch_array($query){
		return mysqli_fetch_array($query);
	}
	

	public function num_rows($result){
		return mysqli_num_rows($result);
	}


	public function inset_id(){
		return mysqli_insert_id($this->connection);
	}



	public function affected_rows(){
		return mysqli_affected_rows($this->connection);
	}


	public function escape_value($value){

		if($this->new_enough_php){
		if($this->magic_quotes_active){$value = stripslashes($value);}
		$value = mysqli_real_escape_string($this->connection,$value);
		}
		else{
		if(! $this->magic_quotes_active){$value = addslashes($value);}
		}
		return $value;

	}


	private function comfirm($result){
		if(! $result){
		$output = "Query Failed.  ".mysqli_error($this->connection);
		$output .= $this->last_query;
		 die($output);
			   }
	}

	public function count_all($table){
		$sql = "SELECT COUNT(*) FROM {$table}";
		$result = $this->query($sql);
		$this->comfirm($result);
		$number = $this->fetch_array($result);
		return array_shift($number);
	}

	public function count_alls($table){
		$sql = "SELECT SUM(1) AS total FROM {$table}";
		$result = $this->query($sql);
		$this->comfirm($result);
		$number = $this->fetch_array($result);
		return $number['total'];
	}

	function get_item($table,$column,$value,$answer)
		{
			$st =$this->query("SELECT * from $table where $column='$value'");
			$row = $this->fetch_array($st);
			return $row[$answer];
		}
    public function insert($table,$data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $i = 0;
            if(!array_key_exists('date_created',$data)){
                $data['date_created'] = date("Y-m-d H:i:s");
            }

            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $columns .= $pre.$key;
                $values  .= $pre."'".$val."'";
                $i++;
            }
            $query = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
            $insert = $this->query($query);
            $this->comfirm($insert);
            return $this->inset_id();
        }else{
            return false;
        }
    }


	}
	 
function getLocation($p,$d,$c)
	 {
	 	$location = "";
	 	if ($p !=="") {
	 		$location = $location . $p;
	 	}
	 	if ($d!=="") {
	 		if ($location==="") {
	 			$location = $location . $d;
	 		}else{
	 			$location = $location .", ". $d;
	 		}
	 		
	 	}
	 	if ($c!=="") {
	 		if ($location==="") {
	 			$location = $location . $c;
	 		}else{
	 			$location = $location .", ". $c;
	 		}
	 	}
	 	if ($location==="") {
	 		return "unset";
	 	}
	 	else
	 		return $location;
	 }


$database = new mysqldatabase(DB_NAME);

?>