<?php

class DB {
static public $user="shop_manager";
static public $password="Pl5BXYj1";
static public $db="shop";
static public $host=localhost;

static function Init() {
 mysql_connect(DB::$host,DB::$user,DB::$password);
$c_db="create database if not exists shop";
mysql_query($c_db);
 @mysql_select_db(DB::$db) or die( "Unable to select database");
 
$c_inv ="CREATE TABLE if not exists shop.inventory (".
	"sku VARCHAR(80) NOT NULL, ".
        "qty INT(5) NOT NULL,".
        "item VARCHAR(150) NOT NULL,".
        "variant VARCHAR(80) NOT NULL,".
        "weight INT(3) NOT NULL,".
        "package VARCHAR(50) NOT NULL,".
        "wholesale DECIMAL(8,2) NOT NULL,".
        "retail DECIMAL(8,2) NOT NULL,".
        "price DECIMAL(8,2) NOT NULL,".
        "min DECIMAL(8,2) NOT NULL,".
        "max DECIMAL(8,2) NOT NULL,".
        "category VARCHAR(80) NOT NULL,".
        "`sub-category` VARCHAR(80) NOT NULL". 
        ") ENGINE=MYISAM";

$c_amazon="CREATE TABLE if not exists shop.inv_amazon (".
          "sku VARCHAR(80) NOT NULL,".
          "asin VARCHAR(80) NOT NULL,".
          "price DECIMAL(8,2) NOT NULL".
          ") ENGINE=MYISAM";

mysql_query($c_inv);
mysql_query($c_amazon);

}

static function Drop() {
print "Dropping the database!!";
 mysql_connect(DB::$host,DB::$user,DB::$password);
 @mysql_select_db(DB::$db) or die( "Unable to select database");
 $d_inv="drop table shop.inventory;";
 $d_amazon="drop table shop.inv_amazon";

mysql_query($d_inv);
mysql_query($d_amazon); 
mysql_close();
}

static function Close(){
	mysql_close();
}

}
?>
