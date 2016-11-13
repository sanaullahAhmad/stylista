<?php

require('../config/config.php');
require('../connection/connection.php');
require("../classes/create-thumb.php");
session_start();
//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//echo "</pre>";
//exit;

foreach ($_POST as $k => $v) {
    $$k = $v;
}
if(isset($_REQUEST['act']) && $_REQUEST['act']=="follow") {
	
	$follower = $_SESSION['user']['uid'];
	$followee = $_REQUEST['user_id'];
	$dt = date('y-m-d h:m:s');	
	$nno = "INSERT INTO `tbl_follow` (
	`fk_follower_id` ,
	`fk_followee_id`
	)
	VALUES (
	'$follower', '$followee'
	);";
	$delll = mysql_query($nno);
	//echo $nno;
	//exit;
	header('location:'.$ru.'find_user');
	exit;
	}
if(isset($_REQUEST['act']) && $_REQUEST['act']=="unfollow") {
	
	$follower = $_SESSION['user']['uid'];
	$followee = $_REQUEST['user_id'];
	$dt = date('y-m-d h:m:s');	
	$nno = "delete from `tbl_follow` where fk_follower_id = $follower and fk_followee_id = $followee ";
	$delll = mysql_query($nno);
	//echo $nno;
	//exit;
	header('location:'.$ru.'find_user');
	exit;
	}
?>