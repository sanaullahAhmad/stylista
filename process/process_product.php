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


if (isset($_POST['produt_submit'])) {
	//echo "hi";
	//exit;
  
    $sql_ins	=	"insert into tbl_product(product_name, price, available_till, product_desc, date_added, fk_cat_id, fk_store_id, fk_user_id) 
			 values('".mysql_real_escape_string($_POST['product_name'])."',
			 '".mysql_real_escape_string($_POST['price'])."',
			 '".mysql_real_escape_string($_POST['available_till'])."',
			  '".mysql_real_escape_string($_POST['product_description'])."',
			   '". $_POST['date']."',
			   '".mysql_real_escape_string($_POST['product_category'])."',
			   '".mysql_real_escape_string($_POST['product_store'])."',
			   '".  mysql_real_escape_string($_SESSION['user']['uid'])."')" ;
			//echo $sql_ins;	
			//exit;
							 
			 mysql_query($sql_ins);
			//exit;
			$insert_id	=	mysql_insert_id();
			

   if(isset($_FILES['produt_Image']) && $_FILES['produt_Image']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['produt_Image']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['produt_Image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_main_image = '".mysql_real_escape_string($_FILES['produt_Image']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			
			  if(isset($_FILES['product_thumbanil_1']) && $_FILES['product_thumbanil_1']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['product_thumbanil_1']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['product_thumbanil_1']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_thumb_1 = '".mysql_real_escape_string($_FILES['product_thumbanil_1']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			 if(isset($_FILES['product_thumbanil_2']) && $_FILES['product_thumbanil_2']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['product_thumbanil_2']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['product_thumbanil_2']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_thumb_2 = '".mysql_real_escape_string($_FILES['product_thumbanil_2']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			 if(isset($_FILES['product_thumbanil_3']) && $_FILES['product_thumbanil_3']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['product_thumbanil_3']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['product_thumbanil_3']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_thumb_3 = '".mysql_real_escape_string($_FILES['product_thumbanil_3']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			 if(isset($_FILES['product_thumbanil_4']) && $_FILES['product_thumbanil_4']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['product_thumbanil_4']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['product_thumbanil_4']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_thumb_4 = '".mysql_real_escape_string($_FILES['product_thumbanil_4']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			
			 echo 'Store added Successfully';
			 header('location:'.$ru);
			  exit;
			}
if (isset($_POST['produt_updat'])) {
	//echo "hi";
	//exit;
  
    $sql_ins	=	"update tbl_product set 
	product_name = '".$_POST['product_name']."',
	price = '".$_POST['price']."',
	available_till = '".$_POST['available_till']."',
	product_desc = '".$_POST['product_description']."',
	fk_cat_id = '".$_POST['product_category']."',
	fk_store_id = '".$_POST['product_store']."',
	
	date_added = '".$_POST['date']."'
	where pk_product_id = '".$_POST['product_id']."'";
	//echo $sql_ins;
	//exit;
	$nnnn = mysql_query($sql_ins);
	$insert_id = $_POST['product_id'];
			

   if(isset($_FILES['produt_Image']) && $_FILES['produt_Image']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['produt_Image']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['produt_Image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_main_image = '".mysql_real_escape_string($_FILES['produt_Image']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			
			  if(isset($_FILES['product_thumbanil_1']) && $_FILES['product_thumbanil_1']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['product_thumbanil_1']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['product_thumbanil_1']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_thumb_1 = '".mysql_real_escape_string($_FILES['product_thumbanil_1']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			 if(isset($_FILES['product_thumbanil_2']) && $_FILES['product_thumbanil_2']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['product_thumbanil_2']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['product_thumbanil_2']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_thumb_2 = '".mysql_real_escape_string($_FILES['product_thumbanil_2']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			 if(isset($_FILES['product_thumbanil_3']) && $_FILES['product_thumbanil_3']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['product_thumbanil_3']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['product_thumbanil_3']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_thumb_3 = '".mysql_real_escape_string($_FILES['product_thumbanil_3']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			 if(isset($_FILES['product_thumbanil_4']) && $_FILES['product_thumbanil_4']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['product_thumbanil_4']['name']);
			//echo $upload_path;
			if(move_uploaded_file($_FILES['product_thumbanil_4']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set
				 prd_thumb_4 = '".mysql_real_escape_string($_FILES['product_thumbanil_4']['name'])."'
				 where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			
			 echo 'Store added Successfully';
			 header('location:'.$ru);
			  exit;
			}
if(isset($_REQUEST['act']) && $_REQUEST['act']=="del") {
	
	$product_id = $_REQUEST['id'];
	$nno = "delete from tbl_product where pk_product_id = $product_id";
	$delll = mysql_query($nno);
	//echo "eleting";
	//exit;
	header('location:'.$ru.'/manage_product');
	exit;
	}

?>