<?php
require('../create-thumb.php');
require('../connection/connection.php');
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
foreach($_POST as $k=>$v)
{
	$$k		=	$v;	
}
if($action=="add_cat"){
	 	$sql_insert	=	"insert into tbl_category set
							category_name	=	'".mysql_real_escape_string($name)."',
							category_desc	=	'".mysql_real_escape_string($cat_desc)."'";
		mysql_query($sql_insert);
							
		$insert_id		=	mysql_insert_id();
		if(isset($_FILES['cat_img']) && $_FILES['cat_img']['name']!="") {
				 $image_path	=	mkdir("../media/category_images/".$insert_id."/", 0755, true);
				 $thumb_path	=	mkdir("../media/category_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/category_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['cat_img']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['cat_img']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/category_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/category_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_category set cat_image = '".mysql_real_escape_string($_FILES['cat_img']['name'])."' where pk_cat_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			header("location:../index.php");
							
	}
?>