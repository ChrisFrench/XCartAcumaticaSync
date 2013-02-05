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


   /**
  * returns the last  sync row from the database, this is used in getting records both from Xcart and from Acumatica
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */


   function getLastSync() {
   		# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("select *  from syncs order by date desc limit 1");  
	$STH->execute();  

	$result = $STH->fetch(PDO::FETCH_OBJ);
	
	return $result;
   }

   /**
  * stores the sync after it is finished
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

   function storeSync($syncClass) {
 
   	 $sql = "INSERT INTO syncs (starttime,endtime,completed,haserrors) VALUES (:starttime,:endtime,:completed,:haserrors )";
   	 $values = array(':starttime'=>$syncClass->starttime, ':endtime'=>$syncClass->endtime , ':completed'=>$syncClass->completed , ':haserrors'=>$syncClass->haserrors)

   	$STH = $this->DBH->prepare($sql);  
	$STH->execute($values); 

   }

   /**
  * this should be used to log the item, but also log it in MYSQL under accitems
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

   function logsAccItem($sync_id) {
   	
   }
    /**
  * this should be used to log the item, but also log it in MYSQL under Xcart
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */
   function logsAXcartItem($sync_id) {
   	
   }

/**
  * stores the logs for either in the databse as a report or in the emial or both
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

   function storelogs($log) {
   	//do MYSQL store?
   	$this->logs .= $log

   }

   /**
  * Prepares all the logs from this instance for the email
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

   function email() {
   	$email = '<h1>' .$this->logsheader . '</h1>';
   	$email .= $this->logs;

   	return $email;

   }


}

?>


