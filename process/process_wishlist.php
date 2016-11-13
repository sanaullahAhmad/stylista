<?php

require('../config/config.php');
require('../connection/connection.php');
require("../classes/create-thumb.php");
session_start();
//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//print_r($_REQUEST);
//echo "</pre>";
//exit;

foreach ($_POST as $k => $v) {
    $$k = $v;
}
if(isset($_REQUEST['act']) && $_REQUEST['act']=="wish") {
	
	$prd_id = $_REQUEST['prd_id'];
	$user_id = $_REQUEST['user_id'];
	$dt = date('y-m-d h:m:s');	
	$nno = "INSERT INTO `tbl_wishlist` (
	`fk_product_id` ,
	`time` ,
	`fk_user_id`
	)
	VALUES (
	'$prd_id', '$dt', '$user_id'
	);";
	$delll = mysql_query($nno);
	//echo "eleting";
	//exit;
	$updcount = "select * from tbl_product where pk_product_id = $prd_id";
	$upcountsql= mysql_query($updcount);
	$upcuountfetch = mysql_fetch_array($upcountsql);
	$value = $upcuountfetch['liks_count'];
	
	$value++;
	
	
	$updatprd = "update tbl_product set liks_count = $value where pk_product_id = $prd_id";
	//echo $updatprd; exit;
	$updatprdsql = mysql_query($updatprd);
	
	header('location:'.$ru);
	//echo 'sana';
	exit;
	}

?>