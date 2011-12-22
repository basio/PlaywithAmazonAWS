<?php
require_once ('config.inc.php'); 
require 'AWS/AmazonECS.class.php';
require ("db.php");
?>
<html>
<head>
<title>Adjust Prices</title>
</head>
<body>
<center>

</center>
<br><BR><BR>

<?php

DB::Init();
?>
<table border=1> <tr> <th> sku </th> <th> Min </th> <th> Max </th> <th> Amazon price </th> <th> Our price </th> <th>Updated Price </th> </tr> 
<?php
set_time_limit(-1);
$result = mysql_query("select a.sku, min, max ,a.price ap, i.price op from inventory  i, inv_amazon a where i.sku=a.sku and a.price = (select min(price) from inv_amazon where sku=a.sku);") ;

while($row = mysql_fetch_array( $result)) {
$sku= $row['sku'];
$min= $row['min'];
$max= $row['max'];
$ap= $row['ap'];
$op= $row['op'];
$np=calc_price($min,$max,$ap);
print "<tr><td>".$sku."</td><td>".$min."</td><td>".$max."</td><td>".$ap."</td><td>".$op."</td><td>$np"."</td></tr>";
$q="update inventory set price=".$np. " where sku='".$sku."'";
print $q;
mysql_query($q);
flush();

}

DB::Close();


function calc_price($min,$max,$ap) {
$discount=0.01;
if($ap>$max)  $price=$max; 
else  if($min>$ap) $price=$min;
else 
{ /* Amazon price is between min and max */
$price=$ap*(1-discount);
$price=max($min,$price);
}

return $price;

}

?>
</body>
</html>


