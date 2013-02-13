<?php	

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
	
	$namespace 		= "XCART";
	$host			= "https://rufskin.acumatica.com";
	$url 			= $host."/Soap/".$namespace.".asmx?WSDL";

	include($namespace.'/Screen.php');
        $login 			= new Login();
       	$login->name    	= "admin@Production";
	$login->password	= "admin";

	try
	{
        	$context 	= new Screen($url, array('exceptions'=>true, 'trace'=>1, 'encoding' => 'UTF-8'));
		$LoginResult	= $context->Login($login);
		if ($LoginResult->LoginResult->Code == OK)
		{
			echo('Login successful <br/>');
		}
		else
		{
			echo('Login unsuccessful: ' . $LoginResult->LoginResult->Message . '<br/>');
		}
	} 
	catch (Exception $e) 
	{	
		echo('Login error: ' . GetErrorMessage($e->getMessage()) . '<br/>');
	}
	var_dump($context);
	// get schema
	$IN202500 			= $context->IN202500GetSchema(new IN202500GetSchema());

	$IN202500Content 		= $IN202500->GetSchemaResult;
	$context->IN202500Clear(new IN202500Clear());
                                       
	// export 
	$IN202500Export			= new IN202500Export();    
	$IN202500Export->commands 	= array
					(
						$IN202500Content->StockItemSummary->ServiceCommands->EveryInventoryID,
						$IN202500Content->StockItemSummary->InventoryID,
						$IN202500Content->WarehouseDetails->Warehouse,
						$IN202500Content->WarehouseDetails->QtyOnHand   
					);    

	// get the hidden field for filter
	$field	 			= new Field();
	$field->FieldName		= "LastModifiedDateTime";
	$field->ObjectName		= $IN202500Content->StockItemSummary->InventoryID->ObjectName;

	//filter criteria
     	$filter 			= new Filter();
	$filter->Field 			= $field;
	$filter->Condition 		= FilterCondition::GreaterOrEqual;
	$filter->Value 			= new SoapVar("01/01/2013", XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
	$filter->OpenBrackets 		= 0;
	$filter->CloseBrackets 		= 0;
	$filter->Operator 		= FilterOperator::_And;	

	//set filter
	$IN202500Export->filters        = array
					(
						$filter
					);
	$IN202500Export->breakOnError   = false;
	$IN202500Export->includeHeaders = false;
	$IN202500Export->topCount       = 0;

	try
	{
        	$export 		= $context->IN202500Export($IN202500Export)->ExportResult;
		foreach ($export->ArrayOfString as $key => $item) 
		{
			echo($item->string[0] . ' ' . $item->string[1] . ' ' . $item->string[2] . '<br/>');
		}
	}
	catch(Exception $e)
	{
		echo('Login error: ' . GetErrorMessage($e->getMessage()) . '<br/>');
	}

	echo('Complete <br/>');

?>