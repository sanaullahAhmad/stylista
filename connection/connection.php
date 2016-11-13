<?php
$host	=	$_SERVER['HTTP_HOST'];
//if($host=="localhost" || $host=="127.0.0.1") {
	/*$username	=	"root";
	$password	=	"";
	$db			=	"neoglobal_stylista";*/
	$host = "localhost";
	$username	=	"root";
	$password	=	"";
	$db			=	"neoglobal_stylista";
	//}
	
mysql_connect($host,$username,$password);
mysql_select_db($db);
?>