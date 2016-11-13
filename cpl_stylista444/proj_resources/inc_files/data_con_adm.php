<?php
$host="localhost";
$user="root";
$pass="";
$db="neoglobal_stylista";

//$host="localhost";
//$user="neotjans_stylis2";
//$pass="stylista123";
//$db="neotjans_stylista";

$protocol		=	"http://";
$server     	=	$_SERVER['SERVER_NAME'];
$dir			=	"/stylista/cpl_stylista444/";
$ruadmin	=	$protocol.$server.$dir;
$link=mysql_connect($host,$user,$pass)or die("couldnt connect to my sql".mysql_error());
mysql_select_db($db,$link)or die("couldnt select database".mysql_error());
 
?>
