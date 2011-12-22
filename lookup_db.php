
<?php
require_once ('config.inc.php'); 
require 'AWS/AmazonECS.class.php';
require ("db.php");
?>
<html>
<head>
<title>Lookup DB </title>
</head>
<body>
<center>

</center>
<br><BR><BR>

<?php

DB::Init();
set_time_limit(-1);
$result = mysql_query("SELECT distinct asin FROM inv_amazon;") ;

while($row = mysql_fetch_array( $result)) {
$list[]= $row['asin'];
} 
//var_dump($list);

for($i=0;$i<count($list);$i++) {
 $response = find_match($list[$i]);

 if (is_array($response)) {
  foreach ($response as $item) {
   print ("<div>
           <table cellspacing=4 cellpadding=4 align='left' width='500px'><tr><td align='left' width='1%'>
           <a href='$item[Detail]'><img src='$item[Image]'></a>
           </td><td align='left'>
           <a href='$item[Detail]'>$item[Title]</a><br>
           <b>$item[Price]</b>:&nbsp;$item[ASIN] </b> 
           </td>
           </tr></table>
           </div>");
  }
 print ("</div>");
flush();
 }
}
DB::Close();


function find_match($ASINs) {
 try{
   $amazonEcs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);
   //->optionalParameters(array('Condition' => 'New'))
   $response = $amazonEcs->responseGroup('Large')->lookup($ASINs);
  if (is_array($response->Items->Item) ) {
   foreach ($response->Items->Item as $item) {
   $toReturn[] =   array(
                   "Image"=>$item->MediumImage->URL,
                   "Detail"=>$item->DetailPageURL,
                   "Title"=>$item->ItemAttributes->Title,
                   "ASIN"=>$item->ASIN,
		   "Price"=>$item->OfferSummary->LowestNewPrice->FormattedPrice);
                }
     return ($toReturn);
  }elseif (is_object($response->Items->Item)) {
 $item=$response->Items->Item;
   $toReturn[] =   array(
                   "Image"=>$item->MediumImage->URL,
                   "Detail"=>$item->DetailPageURL,
                   "Title"=>$item->ItemAttributes->Title,
                   "ASIN"=>$item->ASIN,
		   "Price"=>$item->OfferSummary->LowestNewPrice->FormattedPrice);
 return($toReturn);
  } else {
  return(false);
  }
  
  }
  catch(Exception $e)
  {
   echo $e->getMessage();
  }
}
?>
</body>
</html>


