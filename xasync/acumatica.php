
<?php 
include('XCART/Screen.php');

class Acumatica {

	var $name		= "admin@Production";
	var $password	= "admin";
	var $namespace 	= "XCART";
	var $host		= "https://rufskin.acumatica.com";
	var $url 		= '';
	var $login     = null;
	var $client     = null;
	var $client     = null;
	var $client     = null;


	function __construct() {
  	$this->url = $this->host."/Soap/".$this->namespace.".asmx?WSDL";
  	 try
	{
        	$this->client 			= new Screen($this->url, array('exceptions'=>true, 'trace'=>1, 'encoding' => 'UTF-8'));
	        $this->login 				= new Login();
        	$this->login->name    	= $this->name;
			$this->login->password 	= $this->password;
			$this->client->Login($login);
	} 
	catch (Exception $e) 
	{	
		 echo $e->getMessage();
	}

   	}


	function PrepareValue($value, $command, $needcommit=false, $ignore=false)
	{
    	$value_command = new Value();
        $value_command->Value = $value;
    	$value_command->LinkedCommand = $command;
		// $value_command->IgnoreError = $ignore;
		if($needcommit) $value_command->Commit = true;
		return($value_command);
	};

	function PrepareSimpleFilter($command, $condition, $value)
	{
        $filter_command = new Filter();
		$filter_command->Value =  new SoapVar($value, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");;
		$filter_command->Field = $command;
		$filter_command->Condition = $condition;
		$filter_command->CloseBrackets = 0;
		$filter_command->OpenBrackets = 0;
		$filter_command->Operator = FilterOperator::_And;
		return($filter_command);
	}

	function GetErrorMessage($message)
	{
 		$error = $message;
    	$idx = strpos($error, "--->");
    	if(!($idx === false))
    	{
        		$error = substr($error, $idx + 7);
    	}
    	$idx = strpos($error, "Exception:");
    	if(!($idx === false))
    	{
        		$error = substr($error, $idx + 10);
    	}
    	$idx = strpos($error, "\r\n");
    	if(!($idx === false))
    	{
        		$error = substr($error, 0, $idx);
    	}
    	$idx = strpos($error, "at ScreenApi.ScreenGate");
    	if(!($idx === false))
    	{
        		$error = substr($error, 0, $idx);
    	}
    	$idx = strpos($error, "---> PX.Data.PXOuterException");
    	if(!($idx === false))
    	{
        		$error = substr($error, 0, $idx);
    	}
		return $error;
	}
	
	function doUpdatelog() {

	}


	/**
  * This method is intended to be the only way to get ALL the inventory from Acutmata to our sync system for  syncing to  xcart. 
  * it will only be called after the items have been updated via the updateItem method. 
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

	function getItems() {
		/* NOT sure what SCREEN this is going to use yet.  */


	}
	
	
	/**
  * this method is for update each  item on actumatica. 
  *
  * @todo 
  * @example  
  * @param 
  * @since 0.1
  * 
  */

	function updateItem($SKU, $QTY) {
	//$IN202500 = $this->client->IN202500GetSchema(new IN202500GetSchema());
	//$IN202500Content 	

		// make the post of the sku and warehouse and stuff


		//do the submit to change the inventory
	try
	{
		$result = $client->IN202500Submit($submit);
	}
	catch(Exception $e)
	{
		print_r($e);
	}

	//if we are good do a log?

	$this->doUpdatelog();

	

	

}

?>