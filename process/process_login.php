<?php
require('../config/config.php');
require('../connection/connection.php');
session_start();

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

foreach ($_POST as $k => $v) {
    $$k = $v;
}

$sql_login = "select * from tbl_user where `shop_name`	=	'" . mysql_real_escape_string($shop_name) . "' AND `user_password`	=	'" . mysql_real_escape_string($user_password) . "'";
$res = mysql_query($sql_login);
$num_rows = mysql_num_rows($res);
if ($num_rows > 0) {
    $user_data = mysql_fetch_array($res);

    $shop = $user_data['shop_name'];
    $uid = $user_data['pk_user_id'];
	$user_type = $user_data['user_type'];

    $_SESSION['user']['uid'] = $uid;
    $_SESSION['user']['shop'] = $shop;
	$_SESSION['user']['user_type'] = $user_type;
	
	if ($user_type ==1)
	{
		header("location:" . $ru."/shopkeeper");
	}
	else
	{
		header("location:" . $ru);
	}

    
    exit;
}
else
{
	header("location:" . $ru);
    exit;
}
?>