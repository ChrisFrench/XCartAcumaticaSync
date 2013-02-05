
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
	
	
	function getItems() {
		/*$AR303000 = $client->AR303000GetSchema(new AR303000GetSchema());
	$client->CR303000Clear;
	$AR303000content = $AR303000->GetSchemaResult;
	
	$customer         	= $AR303000content->CustomerSummary->CustomerID;
	$customer_name    	= $AR303000content->CustomerSummary->CustomerName;
	$country			= $AR303000content->GeneralInfoMainAddress->Country;
	$customer_class		= $AR303000content->GeneralInfoAccountSettings->CustomerClass;

    $command = array();
	array_push($command, PrepareValue('TEST12345',     	$customer));
	array_push($command, PrepareValue('Abce Customer', 	$customer_name));
	array_push($command, PrepareValue('US',            	$country));
	array_push($command, PrepareValue('DEFAULT',       	$customer_class));	
	array_push($command, $AR303000content->Actions->Save);
	// we want to get customer data after saving
	array_push($command, clone $customer); // we use clone - objects that occur in commands more than one time need to be cloned  [SoapClient PHP BUG #50675]

	$submit = new AR303000Submit();
	$submit->commands = $command;
	
	try
	{
		$submit_result = $client->AR303000Submit($submit);
	}
	catch(Exception $e)
	{
		print_r($e);
	}
	
	echo(var_dump($submit_result));*/


	}
	
	function updateItem() {
	$IN202500 = $this->client->IN202500GetSchema(new IN202500GetSchema());


	}

	

}

?>