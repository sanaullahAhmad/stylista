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


if (isset($_POST['deal_submit'])) {
  
    $sql_ins	=	"insert into tbl_deals(deal_name, deal_description, date_added, fk_user_id) 
			 values('".mysql_real_escape_string($_POST['deal_name'])."',
			  '".mysql_real_escape_string($_POST['deal_description'])."',
			   '". $_POST['date']."',
			   '".  mysql_real_escape_string($_SESSION['user']['uid'])."')" ;
			//echo $sql_ins;	
			//exit;
							 
			 mysql_query($sql_ins);
			//exit;
			$insert_id	=	mysql_insert_id();
			

   if(isset($_FILES['deals_image']) && $_FILES['deals_image']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/deals_image/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/deals_image/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/deals_image/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['deals_image']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['deals_image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/deals_image/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/deals_image/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_deals set
				 deal_image = '".mysql_real_escape_string($_FILES['deals_image']['name'])."'
				 where pk_deal_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			
			 echo 'Store added Successfully';
			 header('location:'.$ru);
			  exit;
			}

    
	
	
	
	
	if (isset($_POST['deal_update'])) {
		//echo "sanaullah"; exit;
  
    $sql_insert = "update tbl_deals set
																`deal_name`			=	'" . mysql_real_escape_string($_POST['deal_name']) . "',
																`deal_description`			=	'" . mysql_real_escape_string($_POST['deal_description']) . "'
																 
																 where pk_deal_id  = '" . $_POST['deal_id'] . "'";
																// echo $sql_insert;
																// exit;
	$str_id = $_POST['deal_id'];

    mysql_query($sql_insert);
    

    if (isset($_FILES['deals_image']) && $_FILES['deals_image']['name'] != "") {
        $image_path = mkdir("../media/deals_image/" . $str_id . "/", 0755, true);
        $thumb_path = mkdir("../media/deals_image/" . $str_id . "/thumbs/", 0755, true);
        $upload_path = "../media/deals_image/" . $str_id . "/";
        $upload_path = $upload_path . basename($_FILES['deals_image']['name']);
        echo $upload_path;
        if (move_uploaded_file($_FILES['deals_image']['tmp_name'], $upload_path)) {
            $pathToImages = '../media/deals_image/' . $str_id . '/';
            $pathToThumbs = '../media/deals_image/' . $str_id . '/thumbs/';

            //require_once('../resources/thumb/create_thumbs.php');

            createThumbs($pathToImages, $pathToThumbs, 150);
            $sql_upd = "update tbl_deals set deal_image = '" . mysql_real_escape_string($_FILES['deals_image']['name']) . "' where pk_deal_id	=	$str_id";
			//echo $sql_upd;
			//exit;
            mysql_query($sql_upd);
        }
    }
header('location:'.$ru);
exit;
    
}
if(isset($_REQUEST['act']) && $_REQUEST['act']=="del") {
	
	$deal_id = $_REQUEST['id'];
	$nno = "delete from tbl_deals where pk_deal_id = $deal_id";
	$delll = mysql_query($nno);
	//echo "eleting";
	//exit;
	header('location:'.$ru.'/manage_shops');
	exit;
	}

?>