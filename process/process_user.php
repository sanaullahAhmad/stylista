<?php

require('../config/config.php');
require('../connection/connection.php');
require("../classes/create-thumb.php");
session_start();
/*echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";*/

foreach ($_POST as $k => $v) {
    $$k = $v;
}


if ($action == "add_user") 
{
	

    $sql_insert = "insert into tbl_user set
																`full_name`			=	'" . mysql_real_escape_string($full_name) . "',
																`nic_num`			=	'" . mysql_real_escape_string($nic_num) . "',
																`shop_name`			=	'" . mysql_real_escape_string($shop_name) . "',
                                                                `location`      	=   '" . mysql_real_escape_string($location) . "',
                                                                 `user_email`   	=   '" . mysql_real_escape_string($email) . "',
                                                                 `user_password`    =   '" . mysql_real_escape_string($user_password) . "',
																 `user_type`    =   '" . mysql_real_escape_string($user_role) . "',
                                                                 `user_phone`      	=   '" . mysql_real_escape_string($user_phone) . "'";

    mysql_query($sql_insert);
     $insert_id = mysql_insert_id();
	 $_SESSION['user']['uid'] = mysql_insert_id();
	

    if (isset($_FILES['user_img']) && $_FILES['user_img']['name'] != "") {
        $image_path = mkdir("../media/user_files/profile_pictures/" . $insert_id . "/", 0755, true);
        $thumb_path = mkdir("../media/user_files/profile_pictures/" . $insert_id . "/thumbs/", 0755, true);
        $upload_path = "../media/user_files/profile_pictures/" . $insert_id . "/";
        $upload_path = $upload_path . basename($_FILES['user_img']['name']);
       // echo $upload_path;
        if (move_uploaded_file($_FILES['user_img']['tmp_name'], $upload_path)) {
            $pathToImages = '../media/user_files/profile_pictures/' . $insert_id . '/';
            $pathToThumbs = '../media/user_files/profile_pictures/' . $insert_id . '/thumbs/';

            //require_once('../resources/thumb/create_thumbs.php');

            createThumbs($pathToImages, $pathToThumbs, 150);
            $sql_upd = "update tbl_user set user_image = '" . mysql_real_escape_string($_FILES['user_img']['name']) . "' where pk_user_id	=	$insert_id";
            mysql_query($sql_upd);
        }
    }
    header('location:' . $ru.'followstyle/'.$insert_id);
    exit;
}

if ($action == "style_addition") 
{
	  $useid = $_SESSION['user']['uid'];
	 $followstyle = $_POST['styles'];
//echo $userid;
//exit;

	 foreach ($followstyle as $style)
	 {
	 $sql_insert = "insert into tbl_style_follow (fk_style_id, fk_user_id) values($style, $useid)";
		//echo $sql_insert;
	//exit;
	mysql_query($sql_insert);
	 }
	header('location:' . $ru.'followpeople/'.$userid);
    exit;
}




if ($action == "edit_user") {

    $sql_insert = "update tbl_user set
																`full_name`			=	'" . mysql_real_escape_string($full_name) . "',
																`nic_num`			=	'" . mysql_real_escape_string($nic_num) . "',
																`shop_name`			=	'" . mysql_real_escape_string($shop_name) . "',
                                                                `location`      	=   '" . mysql_real_escape_string($location) . "',
                                                                 `user_email`   	=   '" . mysql_real_escape_string($email) . "',
                                                                 `user_password`    =   '" . mysql_real_escape_string($user_password) . "',
																  `user_type`    =   '" . mysql_real_escape_string($user_role) . "',
                                                                 `user_phone`      	=   '" . mysql_real_escape_string($user_phone) . "'
																 
																 where pk_user_id  = '" . mysql_real_escape_string($user_id) . "'";

    //echo $sql_insert;
    //exit;
    mysql_query($sql_insert);
   // echo $insert_id = mysql_insert_id();

    if (isset($_FILES['user_img']) && $_FILES['user_img']['name'] != "") {
        $image_path = mkdir("../media/user_files/profile_pictures/" . $user_id . "/", 0755, true);
        $thumb_path = mkdir("../media/user_files/profile_pictures/" . $user_id . "/thumbs/", 0755, true);
        $upload_path = "../media/user_files/profile_pictures/" . $user_id . "/";
        $upload_path = $upload_path . basename($_FILES['user_img']['name']);
       // echo $upload_path;
        if (move_uploaded_file($_FILES['user_img']['tmp_name'], $upload_path)) {
            $pathToImages = '../media/user_files/profile_pictures/' . $user_id . '/';
            $pathToThumbs = '../media/user_files/profile_pictures/' . $user_id . '/thumbs/';

            //require_once('../resources/thumb/create_thumbs.php');

            createThumbs($pathToImages, $pathToThumbs, 150);
            $sql_upd = "update tbl_user set user_image = '" . mysql_real_escape_string($_FILES['user_img']['name']) . "' where pk_user_id	=	$user_id";
            mysql_query($sql_upd);
        }
    }
    header('location:' . $ru);
    exit;
}
?>