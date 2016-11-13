<?php
require('../create-thumb.php');
require('../connection/connection.php');

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
foreach ($_POST as $k => $v) {
    $$k = $v;
}
if ($action == 'add_product') {
    $date = date('Y-m-d H:i:s');

echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
//exit;

    $sql_insert = "insert into tbl_product set
                    product_name    =   '" . mysql_real_escape_string($prd_name) . "',
                    product_num     =   '" . mysql_real_escape_string($prd_num) . "',
                    product_desc    =   '" . addslashes(urlencode($prd_desc)) . "',
                    date_added      =   '$date',
                    fk_cat_id       =   $cat_id";
    mysql_query($sql_insert);
    echo $insert_id	=	mysql_insert_id();
	
	if(isset($_FILES['prd_main']) && $_FILES['prd_main']['name']!="") {
				 $image_path	=	mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	=	mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['prd_main']['name']);
			
			if(move_uploaded_file($_FILES['prd_main']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
			echo	$sql_upd	=	"update tbl_product set prd_main_image = '".mysql_real_escape_string($_FILES['prd_main']['name'])."' where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			//header('location: index.php');
	exit;

}
if($action=="update_prd") {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    $sql_upd = "update tbl_product set
                product_name    =   '" . mysql_real_escape_string($name) . "',
                product_num     =   '" . mysql_real_escape_string($prd_num) . "',
                product_desc    =   '" . urlencode($prd_desc) . "',
                fk_cat_id       =   '" . $cat_id . "'
                where pk_product_id =   $pid";
    mysql_query($sql_upd);
	
    
    ?>
<script type="text/javascript">
    window.location='../manage_product.php';
</script>

<?php
}
?>
