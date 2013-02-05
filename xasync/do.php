<?php 


require_once('acumatica.php');
require_once('xcart.php');
require_once('Mandrill.php');
require_once('logs.php');


class Xasync { 

 var $acumatica = null;
 var $acumaticaItems = null;
 var $xcart = null;
 var $Mandrill = null;
 var $to = array(array('chris@ammonitenetworks.com', 'Chris French'));
 var $MandrillAPIKEY = null;
 var $emailParams = null;
 var $logs = null;
 var $acumaticaInventory = null;
 var $starttime = null;
 var $endtime = null;

 function __construct() {
    try {
        $date = new DateTime();
        $this->starttime = $date->format('Y-m-d H:i:s');
 		$this->acumatica = New Acumatica();
		$this->xcart = New Xcart();
		$this->Mandrill = new Mandrill($this->MandrillAPIKEY);
        $this->logs = new Logs();
	}  
	catch(PDOException $e) {  
	    echo $e->getMessage();  
	}  


   }



    function sendEmail() {
    $date = new DateTime();
    $result = $date->format('Y-m-d H:i:s');
    $params = array(
       
            "html" => $this->logs->email(),
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


        function sync() {
            //get the last sync information
            $lastSync = $this->logs->getLastSync();

            //we get the sales orders from XCART 
            $salesOrders = $this->xcart->getSaleOrders($lastSync->endtime);

            // once we have the sale orders we need to update the inventory of  Acumatica
            foreach ($salesOrders as $order) {
                //Update the inventory on acutmatica
                foreach ($orders->items as $item) {
                    $this->acumatica->updateItem($item->sku, $item->qty);
                    //TODO Add logs
                }
                
            }

            //after Acumatica is updated with the most recent orders from XCART we update Xcart inventory levels
            //TODO NOTE, I have no idea what format the acumentica information will be in so this could change
            $acumaticaInventory = $this->acumatica->getItems();

            foreach ($acumaticaInventory  as $product) {
                $this->xcart->setInventory($product->sku, $product->onhand);
                //TODO Do logs
            }

            //we are done lets store the time
            $date = new DateTime();
            $this->endtime = $date->format('Y-m-d H:i:s');

            // OK so the Item syncing is complete  lets update the logs database and than send an email 
            $this->logs->storeSync($this);

            $this->sendEmail();

        }

}
?>


<?php 

$Xasync = New Xasync();
$Xasync->sync();