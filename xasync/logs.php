<?php 

class Logs {
	
	var $db = 'xcartsync';
	var $username = 'root';
	var $password = 'chris01';
	var $host = 'localhost';
	var $DBH = null;
	var $logs = '';
    var $logheader = '';
	function __construct() {
    try {   
 		 # MySQL with PDO_MYSQL  
  		$this->DBH = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);  
  		$this->DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
  		

	}  
	catch(PDOException $e) {  
	    echo $e->getMessage();  
	}  
	$date = new DateTime();
	$this->logheader = 'Log of Sync Starting at: ' . $date->format('Y-m-d H:i:s');
	$this->logs = '===============================================================';
   }


   function getLastSync() {
   		# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("select *  from syncs order by date desc limit 1");  
	$STH->execute();  

	$result = $STH->fetch(PDO::FETCH_OBJ);
	
	return $result;
   }

   function storeSync($syncClass) {
 
   	 $sql = "INSERT INTO syncs (starttime,endtime,completed,haserrors) VALUES (:starttime,:endtime,:completed,:haserrors )";
   	 $values = array(':starttime'=>$syncClass->starttime, ':endtime'=>$syncClass->endtime , ':completed'=>$syncClass->completed , ':haserrors'=>$syncClass->haserrors)

   	$STH = $this->DBH->prepare($sql);  
	$STH->execute($values); 

   }

   function logsAccItem($sync_id) {
   	
   }
   function logsAXcartItem($sync_id) {
   	
   }


   function storelogs($log) {
   	//do MYSQL store?
   	$this->logs .= $log

   }

   function email() {
   	$email = '<h1>' .$this->logsheader . '</h1>';
   	$email .= $this->logs;

   	return $email;

   }


}

?>


