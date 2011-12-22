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
       <!-- <input type="checkbox" name="insert" value="insert"> Insert all into DB -->
        <input type='submit' value="Search Keyword" name='sub'>


</form>
</center>
<br><BR><BR>

<?php

if (isset($_REQUEST['sub'])) {

 $response = find_match($_REQUEST['item']);
}


function find_match($keywords) {
 try{
   $amazonEcs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);
   $pid=1;
   print ("<div><center><form action='insert.php' method=POST> <input type='submit' value='insert selected';name='sub'>");
   for(;;) {   
   //->optionalParameters(array('Condition' => 'New'))
        if ($pid>1) print("</table>");
        print("<table>");

	   $response = $amazonEcs->responseGroup('Large')->page($pid)->category('All')->search($keywords);
	  if (is_array($response->Items->Item) ) {
	   foreach ($response->Items->Item as $item) {
 	   //print $item->ASIN.",".$item->ItemAttributes->Title.",".$item->ItemAttributes->SKU."\n".'\n';
           $id= $item->ItemAttributes->SKU. ",".$item->ASIN.",".$item->OfferSummary->LowestNewPrice->FormattedPrice;
           print ("<tr><div> 
           <table cellspacing=4 cellpadding=4 align='left' width='500px'>
           <tr>
            <td align='left' width='1%'>
           <a href='".$item->DetailPageURL."'><img src='".$item->MediumImage->URL."'></a>
           </td><td align='left'>
           <table> <tr><td>
            <a href='".$item->DetailPageURL."'>".$item->ItemAttributes->Title."</a></td></tr><tr> <td>
           <b>".$item->OfferSummary->LowestNewPrice->FormattedPrice."</td></tr><tr>ASIN".$item->ASIN." </tr>
          <tr>SKU".  $item->ItemAttributes->SKU."
           </tr> <tr> <td> <input type='checkbox' name='selected[]' value='".$id."'> </td></tr>
           </table></td></tr></table></div></tr>")  ;      flush();
         	        }

	  }elseif (is_object($response->Items->Item)) {
	   $item=$response->Items->Item;
 	   $id= $item->ItemAttributes->SKU. ",".$item->ASIN.",".$item->OfferSummary->LowestNewPrice->FormattedPrice;
           print ("<tr><div> 
           <table cellspacing=4 cellpadding=4 align='left' width='500px'>
           <tr>
            <td align='left' width='1%'>
           <a href='".$item->DetailPageURL."'><img src='".$item->MediumImage->URL."'></a>
           </td><td align='left'>
           <table> <tr><td>
            <a href='".$item->DetailPageURL."'>".$item->ItemAttributes->Title."</a></td></tr><tr> <td>
           <b>".$item->OfferSummary->LowestNewPrice->FormattedPrice."</td></tr><tr>ASIN".$item->ASIN." </tr>
          <tr>SKU".  $item->ItemAttributes->SKU."
           </tr> <tr> <td> <input type='checkbox' name='selected[]' value='".$id."'> </td></tr>
           </table></td>  </tr></table>        </div></tr>")  ;      flush();
         
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
 print(" </form></center></div>");

}

?>
</body>
</html>


