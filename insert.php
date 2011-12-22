<?php

include_once ('config.inc.php'); 
require ("db.php");
DB::Init();
print("Inserting selected items to inv_amazon"); flush();
$ss = count($_POST['selected']) ? $_POST['selected'] : array();
echo "<BR>";
foreach ($ss as $ls) {
print $ls;
$ls= preg_replace('/[\$]/', '', $ls);
$fields=preg_split("/,/",$ls);
$q="insert into inv_amazon(sku,asin,price) values('".$fields[0]."','".$fields[1]."',".$fields[2].");";
print "Insert ".$fields[0]."','".$fields[1]."',".$fields[2];
mysql_query($q);
//print $ls.
print "<br>";
}
DB:Close();
?>
