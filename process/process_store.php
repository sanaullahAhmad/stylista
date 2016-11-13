<?php

require('../config/config.php');
require('../connection/connection.php');
require("../classes/create-thumb.php");
session_start();
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
//exit;

foreach ($_POST as $k => $v) {
    $$k = $v;
}


if (isset($_POST['store_submit'])) {
  
    $sql_ins	=	"insert into tbl_store(store_name, store_description, store_address, date_added, fk_user_id) 
			 values('".mysql_real_escape_string($_POST['store_name'])."',
			  '".mysql_real_escape_string($_POST['store_description'])."',
			  '".mysql_real_escape_string($_POST['store_Address'])."',
			   '". $_POST['date']."',
			   '".  mysql_real_escape_string($_SESSION['user']['uid'])."')" ;
			//echo $sql_ins;	
			//exit;
							 
			 mysql_query($sql_ins);
			//exit;
			$insert_id	=	mysql_insert_id();
			

   if(isset($_FILES['store_image']) && $_FILES['store_image']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/store_image/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/store_image/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/store_image/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['store_image']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['store_image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/store_image/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/store_image/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_store set
				 store_image = '".mysql_real_escape_string($_FILES['store_image']['name'])."'
				 where pk_store_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			
			 echo 'Store added Successfully';
			 header('location:'.$ru.'add_edit_product');
			  exit;
			}

    
	
	
	
	
	if (isset($_POST['store_update'])) {
		//echo "sanaullah"; exit;
  
    $sql_insert = "update tbl_store set
																`store_name`			=	'" . mysql_real_escape_string($_POST['store_name']) . "',
																`store_description`			=	'" . mysql_real_escape_string($_POST['store_description']) . "',
																
																`store_address`			=	'" . mysql_real_escape_string($_POST['store_Address']) . "'
																 
																 where pk_store_id  = '" . $_POST['store_id'] . "'";
																// echo $sql_insert;
																// exit;
	$str_id = $_POST['store_id'];

    mysql_query($sql_insert);
    

    if (isset($_FILES['store_image']) && $_FILES['store_image']['name'] != "") {
        $image_path = mkdir("../media/store_image/" . $str_id . "/", 0755, true);
        $thumb_path = mkdir("../media/store_image/" . $str_id . "/thumbs/", 0755, true);
        $upload_path = "../media/store_image/" . $str_id . "/";
        $upload_path = $upload_path . basename($_FILES['store_image']['name']);
        echo $upload_path;
        if (move_uploaded_file($_FILES['store_image']['tmp_name'], $upload_path)) {
            $pathToImages = '../media/store_image/' . $str_id . '/';
            $pathToThumbs = '../media/store_image/' . $str_id . '/thumbs/';

            //require_once('../resources/thumb/create_thumbs.php');

            createThumbs($pathToImages, $pathToThumbs, 150);
            $sql_upd = "update tbl_store set store_image = '" . mysql_real_escape_string($_FILES['store_image']['name']) . "' where pk_store_id	=	$str_id";
            mysql_query($sql_upd);
        }
    }
header('location:'.$ru);
exit;
    
}
if(isset($_REQUEST['act']) && $_REQUEST['act']=="del") {
	
	$store_id = $_REQUEST['id'];
	$nno = "delete from tbl_store where pk_store_id = $store_id";
	$delll = mysql_query($nno);
	//echo "eleting";
	//exit;
	header('location:'.$ru.'/manage_shops');
	exit;
	}

?>