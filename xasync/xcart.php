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

 /**
  * increases the inventory by amount 
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */
   function increaseInventory($sku, $amount) {
  
   	# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("update xcart_products set avail = avail+{$amount} where productcode = '$sku';");  
	$STH->execute();  
   }

   /**
  * decreases the inventory by amount
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

   function decreaseInventory($sku, $amount) {
   		# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("update xcart_products set avail = avail-{$amount} where productcode = '$sku';");  
	$STH->execute();  
   }

/**
  * disregards the current inventory and sets it to a value
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

   function setInventory($sku, $amount) {
   		# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("update xcart_products set avail = {$amount} where productcode = '$sku';");  
	$STH->execute();  
   }

   /**
  * if a products inventory is too low  this method will take it off line
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

   function takeProductOffline($sku, $amount) {
   		# STH means "Statement Handle"  
	$STH = $this->DBH->prepare("update xcart_products set forsale = 'N' where productcode = '$sku';");  
	$STH->execute();  
   }

    /**
  * get all the products and their inventory
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

   function getInventory() {

   }

   /**
  * Gets the sales orders  so they can be processed
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */
   function getSaleOrders($datetime) {

   }
/**
  * wrapper for logs class
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

   function doLogs($action, $sku, $amount) {

   }
/**
  * wrapper for logs class
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */
   function doIncreaseLog($sku, $amount){

   }
/**
  * wrapper for logs class
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */
   function doDecreaseLog($sku, $amount){

   }
   /**
  * wrapper for logs class
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */
   function doSetLog($sku, $amount){

   }

/**
  * do something the update failes
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */
   function doFailure() {

   }
   
}



?>