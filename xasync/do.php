<?php 


require_once('acumatica.php');
require_once('xcart.php');
require_once('Mandrill.php');



class Xasync { 

 var $acumatica = null;
 var $acumaticaItems = null;
 var $xcart = null;
 var $Mandrill = null;
 var $to = array(array('chris@ammonitenetworks.com', 'Chris French'));
 var $MandrillAPIKEY = null;
 var $emailParams = null;
 function __construct() {
    try {   
 		$this->acumatica = New Acumatica();
		$this->xcart = New Xcart();
		$this->Mandrill = new Mandrill($this->MandrillAPIKEY);
  
	}  
	catch(PDOException $e) {  
	    echo $e->getMessage();  
	}  


   }

function getAcumaticaItems() {

}


function updateXcart() {
$acumaticaItems = $this->acumatica->getItems();

}
function updateAcumatica() {


}



function sendEmail() {
date = new DateTime();
$result = $date->format('Y-m-d H:i:s');
$params = array(
   
        "html" => $this->xcart->logs,
        "text" => null,
        "from_email" => 'chris@ammonitenetworks.com',
        "from_name" => 'Chris French',
        "subject" => 'Acumatica  To XCart Sync' . $date->format('Y-m-d H:i:s');,
     //   "to" => array($to),
        "to" => $this->to,
        "track_opens" => true,
        "track_clicks" => true,
        "auto_text" => true 
    );
}


}
?>


<?php 

$Xasync = New Xasync();

$Xasync->sync();