<html>
<?php
require_once ('config.inc.php'); 
require 'AWS/AmazonECS.class.php';
?>
<head>
<title>Lookup ASIN </title>
</head>
<body>
<center>

<form action='' method=POST>
        <input type='text' name='item' size='100'>
        <input type='submit' name='sub'>

</form>
</center>
<br><BR><BR>

<?php

if (isset($_REQUEST['sub'])) {
 print ("<div width='80%'>");
$list= split(",", $_REQUEST['item']); 
 $response = find_match($list);

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
 }

}


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


