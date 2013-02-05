<?php 

class Xcart {
	
	var $db = 'rufskin2';
	var $username = 'root';
	var $password = 'chris01';
	var $host = 'localhost';
	var $DBH = null;
	var $logs = null;

	function __construct() {
    try {   
 		 # MySQL with PDO_MYSQL  
  		$this->DBH = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);  
  		$this->DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
  		
	}  
	catch(PDOException $e) {  
	    echo $e->getMessage();  
	}  

   }


   function increaseInventory($sku, $amount) {
   	echo 'doing increase';
   	# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("update xcart_products set avail = avail+{$amount} where productcode = '$sku';");  
	$STH->execute();  
   }

   function decreaseInventory($sku, $amount) {
   		# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("update xcart_products set avail = avail-{$amount} where productcode = '$sku';");  
	$STH->execute();  
   }

   function setInventory($sku, $amount) {
   		# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("update xcart_products set avail = {$amount} where productcode = '$sku';");  
	$STH->execute();  
   }
   function takeProductOffline($sku, $amount) {
   		# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("update xcart_products set forsale = 'N' where productcode = '$sku';");  
	$STH->execute();  
   }

   function getInventory() {

   }

   function doLogs($action, $sku, $amount) {

   }
   function doIncreaseLog($sku, $amount){

   }
   function doDecreaseLog($sku, $amount){

   }
   function doSetLog($sku, $amount){

   }

   function doFailure() {

   }
   
}


$do = New Xcart();
$do->increaseInventory('AS7702','100');


?>