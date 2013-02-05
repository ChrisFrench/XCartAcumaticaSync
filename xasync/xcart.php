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
  * Gets the sales orders  so they can be processed, this should return an array of sale order objects that each object has an items value will of an array of product objects
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */
   function getSaleOrders($datetime) {
    $date = new DateTime($datetime);
     $timestamp = $date->getTimestamp();

     //Query to select sales orders 
     //select * from `rufskin2`.`xcart_orders` where `date` >= '1228348659'  limit 0,1000
 
  $saleorders = $this->DBH->query("select * from xcart_orders where date >= '$timestamp'");

$results = array('orders' => array());

foreach($saleorders as $order) {
  (object) $order
  $items = array();
  $oid = $order['orderid'];
  $ordereditems = $db->query("select * from `rufskin2`.`xcart_order_details` where `orderid` = '$oid' ");
  foreach($ordereditems as $orderitem){
    $items[] = (object) $orderitem;
  }
  $order->items = $items;

  $results['orders'][] = $order;
}


return $results;


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