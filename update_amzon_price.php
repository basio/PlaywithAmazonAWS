<?php
require_once ('config.inc.php'); 
require 'AWS/AmazonECS.class.php';
require ("db.php");

print "<html> <head> <title>Update amazon price</title></head> <body> ";

DB::Init();
set_time_limit(-1);
$result = mysql_query("SELECT distinct asin FROM inv_amazon;") ;
print "Updating price form amazon <br>";
while($row = mysql_fetch_array( $result)) {
$list[]= $row['asin'];
} 

update_prices($list);
DB::Close();


function update_prices($list) {
 try{
   $amazonEcs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);
  for($i=0;$i<count($list);$i++) {
	  $asin=$list[$i];    
	  $response = $amazonEcs->responseGroup('Large')->lookup($asin);
	  if (is_array($response->Items->Item) ) {
	   foreach ($response->Items->Item as $item) {
	      $q= "update inv_amazon set price=".$item->OfferSummary->LowestNewPrice->Amount." where asin='".$asin."'";    
	      mysql_query($q);
              print " Updated price for ASIN=".$asin." @ ".$item->OfferSummary->LowestNewPrice->Amount."<br>";  flush();
	    } 
 	  }elseif (is_object($response->Items->Item)) {
	   $item=$response->Items->Item;
           $q= "update inv_amazon set price=".$item->OfferSummary->LowestNewPrice->Amount." where asin='".$asin."'";    
           mysql_query($q);
            print "Updated price for ASIN=".$asin. " @ ".$item->OfferSummary->LowestNewPrice->Amount."<br>"; flush();  
         } 
  }/*for*/
  }/*try*/
  catch(Exception $e)
  {
   echo $e->getMessage();
  }
}
?>
</body>
</html>


