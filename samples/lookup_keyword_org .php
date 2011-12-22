<?php
require ('config.inc.php'); 
require ('AWS/AmazonECS.class.php');
?>
<html>
<head>
<title>Lookup Keyword</title>
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
 $response = find_match($_REQUEST['item']);

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


function find_match($keywords) {
 try{
   $amazonEcs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);
   $pid=1;
   
   for(;;) {   
   //->optionalParameters(array('Condition' => 'New'))
	   $response = $amazonEcs->responseGroup('Large')->page($pid)->category('All')->search($keywords);
	  if (is_array($response->Items->Item) ) {
	   foreach ($response->Items->Item as $item) {
	   $toReturn[] =   array(
        	           "Image"=>$item->MediumImage->URL,
        	           "Detail"=>$item->DetailPageURL,
        	           "Title"=>$item->ItemAttributes->Title,
        	           "ASIN"=>$item->ASIN,
			   "Price"=>$item->OfferSummary->LowestNewPrice->FormattedPrice);
        	        }

	  }elseif (is_object($response->Items->Item)) {
	   $item=$response->Items->Item;
	   $toReturn[] =   array(
        	           "Image"=>$item->MediumImage->URL,
        	           "Detail"=>$item->DetailPageURL,
        	           "Title"=>$item->ItemAttributes->Title,
        	           "ASIN"=>$item->ASIN,
			   "Price"=>$item->OfferSummary->LowestNewPrice->FormattedPrice);
	  } else {
           break;
	  }
    $pid=$pid+1;
   }  
  }
  catch(Exception $e)
  {
   echo $e->getMessage();
  }
 return ($toReturn);
}

?>
</body>
</html>


