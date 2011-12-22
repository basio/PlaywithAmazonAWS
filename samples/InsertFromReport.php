<?php

include_once ('config.inc.php'); 
require ("db.php");

$config = array (
  'ServiceURL' => MWS_serviceUrl,
  'ProxyHost' => null,
  'ProxyPort' => -1,
  'MaxErrorRetry' => 3,
);

 $service = new MarketplaceWebService_Client(
     AWS_ACCESS_KEY_ID, 
     AWS_SECRET_ACCESS_KEY, 
     $config,
     APPLICATION_NAME,
     APPLICATION_VERSION);
 
 $reportId = '4817826463';
 print "Inserting data from report id:$reportId <br>";
 $parameters = array (
   'Merchant' => MERCHANT_ID,
   'Report' => @fopen('php://memory', 'rw+'),
   'ReportId' => $reportId,
 );
 $request = new MarketplaceWebService_Model_GetReportRequest($parameters);
 DB::Init();
invokeGetReport($service, $request);
print ("<table border='1'>");
 $file=fopen('/tmp/abc',"r");
 while(!feof($file)) { 
$line= preg_split("/[\s,]+/", fgets($file));
$q="insert into inv_amazon(sku,asin,price) values('".$line[0]."','".$line[1]."',".$line[2].");";
//print $q;
mysql_query($q);
            echo('<tr>');
            $c=count($line);
        //  $asin_list[]=$line[1];
            for ($i=0;$i<$c;$i++)
             {
                 print '<td>'.$line[$i].'</td>';
             } 
            print '</tr>';
        }
        fclose($file);
    
print ("</table>");
DB::Close();


 function invokeGetReport(MarketplaceWebService_Interface $service, $request) 
  {
      try {
              $response = $service->getReport($request);
              $fd=fopen('/tmp/abc',"w");
              fwrite($fd, stream_get_contents($request->getReport())); 
              fclose($fd);

     } catch (MarketplaceWebService_Exception $ex) {
         echo("Caught Exception: " . $ex->getMessage() . "\n");
         echo("Response Status Code: " . $ex->getStatusCode() . "\n");
         echo("Error Code: " . $ex->getErrorCode() . "\n");
         echo("Error Type: " . $ex->getErrorType() . "\n");
         echo("Request ID: " . $ex->getRequestId() . "\n");
         echo("XML: " . $ex->getXML() . "\n");
     }
 }
                                                                                
