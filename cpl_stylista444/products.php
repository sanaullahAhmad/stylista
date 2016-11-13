<?php include("proj_resources/inc_files/header_tag.php");
include("proj_resources/inc_files/create-thumb.php");
$sql_sel		=	"select * from tbl_product " . $pagination->getLimitSql();
$res			=	mysql_query($sql_sel);
//$userData		=	mysql_fetch_array($res);

$msg="";
$msg1="";
if(isset($_REQUEST['action']))
	{
		
		if($_REQUEST['action']=='delete')
			{
				mysql_query("delete from tbl_product  where pk_product_id=".$_REQUEST['id']."");
				$msg="Deleted Successfully";
			}
		header("location:".$pagename."?page=".$_GET['page']."&msg=".$msg."");
		exit();
		
	}
if(isset($_POST['all_delete']))
		{

	foreach($_POST['all_delete'] as $delete_id)
		{

		
			mysql_query("delete from tbl_product  where pk_product_id=".$delete_id."");
			
		}
		
		$msg="Deleted Successfully";
		header("location:".$pagename."?page=".$_GET['page']."&msg=".$msg."");
		exit();
	}

if(isset($_REQUEST['submit']))
	{
		
		// Add new page code start
		if($_POST['file_action']=='new')
		{
			
		  
			$sql_ins	=	"insert into tbl_product(product_name, fk_cat_id, fk_store_id, product_desc, date_added)
			 values('".mysql_real_escape_string($_POST['intro_title'])."',
			 '".($_POST['product_category'])."',
			 '".($_POST['product_store'])."',
			 '".mysql_real_escape_string($_POST['description'])."',
			 '".  mysql_real_escape_string($_POST['event_date'])."')" ;
			
			mysql_query($sql_ins);
			$insert_id	=	mysql_insert_id();
			
			
		if(isset($_FILES['prd_main_image']) && $_FILES['prd_main_image']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['prd_main_image']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['prd_main_image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_main_image = '".mysql_real_escape_string($_FILES['prd_main_image']['name'])."' where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_1']) && $_FILES['thumbnail_1']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_1']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_1']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_thumb_1 = '".mysql_real_escape_string($_FILES['thumbnail_1']['name'])."' where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_2']) && $_FILES['thumbnail_2']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_2']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_2']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_thumb_2 = '".mysql_real_escape_string($_FILES['thumbnail_2']['name'])."' where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_3']) && $_FILES['thumbnail_3']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_3']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_3']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_thumb_3 = '".mysql_real_escape_string($_FILES['thumbnail_3']['name'])."' where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_4']) && $_FILES['thumbnail_4']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$insert_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$insert_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$insert_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_4']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_4']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_thumb_4 = '".mysql_real_escape_string($_FILES['thumbnail_4']['name'])."' where pk_product_id	=	$insert_id";
				mysql_query($sql_upd);
					
			}
			}
			
			 header("location:".$pagename."?msg=Store added Successfully");
		
			}	
		// new page code End	

		// Edit page code start
			if($_POST['file_action']=='update')
			{
				$rec_id	=	$_POST['rec_id'];
				//echo $_POST['important'];
				//exit;
				if(isset($_POST['important']))
				{
					//echo $_POST['important'];
				//exit;
					$upd_cat	=	"update tbl_product
					set 
					product_name		=	'".mysql_real_escape_string($_POST['intro_title'])."',
					fk_cat_id 			=  '".mysql_real_escape_string($_POST['product_category'])."',
					fk_store_id 		=  '".mysql_real_escape_string($_POST['product_store'])."',
					product_desc		=	'".mysql_real_escape_string($_POST['description'])."',
					important           =  1,
					date_added          =   '".  mysql_real_escape_string($_POST['event_date'])."'
					where pk_product_id		=	$rec_id";
				}
				else
				{
					//echo 'not set'; exit;
					$upd_cat	=	"update tbl_product
					set 
					product_name		=	'".mysql_real_escape_string($_POST['intro_title'])."',
					fk_cat_id 			=  '".mysql_real_escape_string($_POST['product_category'])."',
					fk_store_id 		=  '".mysql_real_escape_string($_POST['product_store'])."',
					product_desc		=	'".mysql_real_escape_string($_POST['description'])."',
					date_added          =   '".  mysql_real_escape_string($_POST['event_date'])."'
					where pk_product_id		=	$rec_id";
				}
				 
				//exit;
				mysql_query($upd_cat);
				
				
				
			 if(isset($_FILES['prd_main_image']) && $_FILES['prd_main_image']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$rec_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$rec_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$rec_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['prd_main_image']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['prd_main_image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$rec_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$rec_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_main_image = '".mysql_real_escape_string($_FILES['prd_main_image']['name'])."' where pk_product_id	=	$rec_id";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_1']) && $_FILES['thumbnail_1']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$rec_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$rec_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$rec_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_1']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_1']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$rec_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$rec_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_thumb_1 = '".mysql_real_escape_string($_FILES['thumbnail_1']['name'])."' where pk_product_id	=	$rec_id";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_2']) && $_FILES['thumbnail_2']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$rec_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$rec_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$rec_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_2']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_2']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$rec_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$rec_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_thumb_2 = '".mysql_real_escape_string($_FILES['thumbnail_2']['name'])."' where pk_product_id	=	$rec_id";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_3']) && $_FILES['thumbnail_3']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$rec_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$rec_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$rec_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_3']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_3']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$rec_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$rec_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_thumb_3 = '".mysql_real_escape_string($_FILES['thumbnail_3']['name'])."' where pk_product_id	=	$rec_id";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_4']) && $_FILES['thumbnail_4']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/product_images/".$rec_id."/", 0755, true);
				 $thumb_path	= mkdir("../media/product_images/".$rec_id."/thumbs/", 0755,true);
				 $upload_path	=	"../media/product_images/".$rec_id."/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_4']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_4']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/product_images/'.$rec_id.'/';
				 $pathToThumbs	=	'../media/product_images/'.$rec_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_product set prd_thumb_4 = '".mysql_real_escape_string($_FILES['thumbnail_4']['name'])."' where pk_product_id	=	$rec_id";
				mysql_query($sql_upd);
					
			}
			}
				
				
				
				header("location:".$pagename."?page=".$_POST['page_id']."&msg=Store Updated Successfully");
				exit;
				
			}	
		// Edit page code End	

	}


if(isset($_GET['msg']))
{
		$msg=$_GET['msg'];}
		
$total_record = mysql_num_rows(mysql_query("select * from tbl_product"));
$pagination->setTotalRecords($total_record);

// Set Target Page
$pagination->setLink("".$pagename."?page=%s");	
// now use this SQL statement to get records from your table
$sql = "SELECT * FROM tbl_product  ORDER BY pk_product_id ASC " . $pagination->getLimitSql();
$query=mysql_query($sql);
$order_row=mysql_num_rows($query);

if(isset($_GET['act']))
{
$edit_page = mysql_fetch_array(mysql_query("SELECT * FROM tbl_product where pk_product_id='".mysql_real_escape_string($_GET['id'])."'"));
}
 ?>
<script language="javascript">

	var string=/^[a-zA-Z ]+$/;
	var string2=/^[a-zA-Z0-9._-]+$/;
	var string3=/^[a-zA-Z0-9_]+$/;
	var numbr=/^[0-9]+$/;
	var email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z0-9.]{2,6}$/;
function valid()
	{
	
	if(string2.test(document.getElementById("cat_name").value)==false)
		{
	 
		inlineMsg('cat_name','Please!  Enter Console Name ',2);
		return false;
		 
		}
	
}
</script>
<body>
<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
<?php include("proj_resources/inc_files/left_sidebar.php"); ?>	
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome <?php echo $_SESSION['adm']; ?>!</h2>
	
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Manage Products</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" <?php if(!isset($_GET['act'])) { ?>  class="default-tab" <?php } ?>>Products</a></li> <!-- href must be unique and match the id of target div -->
						<?php if(isset($_GET['act'])) { ?>
						<li><a href="#tab2"   class="default-tab">Modify Products</a></li>
						<?php } else { ?>
						<li><a href="#tab2">Add Product</a></li>
						<?php } ?>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content<?php if(!isset($_GET['act'])) { ?> default-tab <?php } ?>" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
					<?php if($msg!="") { ?>	
									<div class="notification success png_bg">
				<a href="#" class="close"><img src="proj_resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div><?php echo $msg; ?></div>
			</div>
			<?php } ?>
            <?php if($msg1!="") { ?>	
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="proj_resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					<?php echo $msg1; ?>
				</div>
			</div>
            <?php } ?>
							<form method="post" action="<?php echo $pagename; ?>" enctype="multipart/form-data">	
						<table>
							
							<thead>
								<tr>
								   <th width="20"><input class="check-all" id="allbox" name="allbox" type="checkbox" /></th>
								   <th width="94">Title</th>
                                    <th width="94">Image</th>
								   <th width="300">Description</th>
                                   <th width="206">Category</th>
								   
								  
								   <th width="104">Action</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
                                        
											<select name="dropdown" id="dropdown">
												<option value="">Choose an action...</option>
												<option value="option3">Delete</option>
											</select>
                                            <input type="submit" class="button" value="Apply to selected" onClick="return submit_validation();">
									
										</div>
										
									
									<?php
$navigation = $pagination->create_links();
echo $navigation; // will draw our page navigation
?>
									 <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 	<tbody>
						
						  <?php
						  
						   $order_counter=1;
						   while($intro=mysql_fetch_array($res)){ ?>		
								<tr valign="middle" style="vertical-align:middle;">
								
									<td style="vertical-align:middle;">
										<input type="checkbox" name="all_delete[]" value="<?php echo $intro['pk_product_id']; ?>" />
									</td>
									<td style="vertical-align:middle;">
										<?php 
												echo $intro['product_name'];		
										?>
									</td>
                                    
                                    <td>
										<img src="../media/product_images/<?php echo $intro['pk_product_id']; ?>/thumbs/<?php echo $intro['prd_main_image']?>"/>
									</td>
                                    
									<td style="vertical-align:middle;">
										<a href="#" title="title">
											<?php echo substr($intro['product_desc'],0,50);?>...
										</a>
									</td>
                                    
									<td style="vertical-align:middle;">
										
											<?php $cat7 = $intro['fk_cat_id'];
											$new3 = "select * from tbl_category where pk_cat_id = $cat7";
											$na3 = mysql_query($new3);
											$gh4 = mysql_fetch_array($na3);
											echo $gh4['category_name'];
											
											?>
										
									</td>
									
																
									<td style="vertical-align:middle;">
										<!-- Icons -->
										 <a href="<?php echo $pagename?>?act=update&id=<?php echo $intro['pk_product_id']?>&page=<?php if(isset($_REQUEST['page'])){echo $_REQUEST['page'];} else {echo "1";}?>"><img src="proj_resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo $pagename?>?action=delete&id=<?php echo $intro['pk_product_id']?>&page=<?php if(isset($_REQUEST['page'])){echo $_REQUEST['page']; } else {echo "1";}?>" onClick="return confirm('Are you sure you want to delete?')"><img src="proj_resources/images/icons/cross.png" alt="Delete" /> </a>
										
									</td>
								</tr>
							<?php	$order_counter++;} ?>
								
							</tbody>						
							
						</table>
						</form>
					</div> <!-- End #tab1 -->
					
					<div class="tab-content <?php if(isset($_GET['act'])) { ?> default-tab <?php } ?>" id="tab2">
					
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" name="file_action" value="<?php if(isset($_GET['act'])) {  echo "update"; } else { echo "new"; } ?>">
							<?php if(isset($_GET['act'])) { ?>
							<input type="hidden" name="page_id" value="<?php echo $_GET['page']; ?>">
							<input type="hidden" name="rec_id" value="<?php echo $edit_page['pk_product_id']; ?>">
							<?php } ?>
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Title</label>
										<input class="text-input small-input" type="text" id="intro_title" name="intro_title"  value="<?php if(isset($_GET['act'])) { echo $edit_page['product_name']; } else { echo ""; } ?>" />
								</p>
                                <p>
									<label>Date</label>
										<input class="text-input small-input" type="text" id="intro_date" name="event_date"  value="<?php if(isset($_GET['act'])) { echo $edit_page['date_added']; } else { echo ""; } ?>" />
								</p>
                                
                                
                                <p>
									<label>Choose Product Category:</label>
                                    
								</p>
                                <p>
                                <select name="product_category" id="dropdown">
                                        <option value="">Choose Product Category...</option>
                                        <?php $sqq = mysql_query("select * from tbl_category");
										while($nnp = mysql_fetch_array($sqq)){
                                         ?>
                                         <option value="<?php echo $nnp['pk_cat_id']; ?>">
										 <?php echo $nnp['category_name']; ?>
                                         </option>
                                         <?php } ?>
								</select>
                                </p>
                                
                                
                                 <p>
									<label>Choose Product Store:</label>
                                    
								</p>
                                <p>
                                <select name="product_store" id="dropdown">
                                        <option value="">Choose Product Store...</option>
                                        <?php $sqq = mysql_query("select * from tbl_store");
										while($nnp = mysql_fetch_array($sqq)){
                                         ?>
                                         <option value="<?php echo $nnp['pk_store_id']; ?>">
										 <?php echo $nnp['store_name']; ?>
                                         </option>
                                         <?php } ?>
								</select>
                                </p>
                                  
                                
								<p>
									<label>Description:</label>
                                    
								</p>
                                 
                                    <div><textarea id="description" name="description"><?php if(isset($_GET['act'])){ echo stripslashes(urldecode($edit_page['product_desc'])); } else { echo ""; } ?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'description' );
			</script>
								</div>
								
								<p>
									<label>Upload Product Main Image</label>
										<input type="file" id="slider" name="prd_main_image" />
								</p>
                                <?php if(isset($_GET['act']))
										 {
								  ?>
                                       <img src="../media/product_images/<?php echo $edit_page['pk_product_id']; ?>/thumbs/<?php echo $edit_page['prd_main_image']?>"/> 
								<?php
                                           
                                        }
								?>
                                <p>
									<label>Upload Product Thumbnail 1</label>
										<input type="file" id="slider" name="thumbnail_1" />
								</p>
                                </p>
                                <?php if(isset($_GET['act']))
										 {
								  ?>
                                       <img src="../media/product_images/<?php echo $edit_page['pk_product_id']; ?>/thumbs/<?php echo $edit_page['prd_thumb_1']?>"/> 
								<?php
                                           
                                        }
								?>
                                <p>
                                <p>
									<label>Upload Product Thumbnail 2</label>
										<input type="file" id="slider" name="thumbnail_2" />
								</p>
                                </p>
                                <?php if(isset($_GET['act']))
										 {
								  ?>
                                       <img src="../media/product_images/<?php echo $edit_page['pk_product_id']; ?>/thumbs/<?php echo $edit_page['prd_thumb_2']?>"/> 
								<?php
                                           
                                        }
								?>
                                <p>
                                <p>
									<label>Upload Product Thumbnail 3</label>
										<input type="file" id="slider" name="thumbnail_3" />
								</p>
                                </p>
                                <?php if(isset($_GET['act']))
										 {
								  ?>
                                       <img src="../media/product_images/<?php echo $edit_page['pk_product_id']; ?>/thumbs/<?php echo $edit_page['prd_thumb_3']?>"/> 
								<?php
                                           
                                        }
								?>
                                <p>
                                <p>
									<label>Upload Product Thumbnail 4</label>
										<input type="file" id="slider" name="thumbnail_4" />
								</p>
                                </p>
                                <?php if(isset($_GET['act']))
										 {
								  ?>
                                       <img src="../media/product_images/<?php echo $edit_page['pk_product_id']; ?>/thumbs/<?php echo $edit_page['prd_thumb_4']?>"/> 
								<?php
                                           
                                        }
								?>
                                <p>
								
								
								<p>
									<label>Recommend</label>
                                    
										<input class="text-input small-input"  type="checkbox" id="intro_date" name="important"  <?php if(isset($_GET['act']) && $edit_page['important']==1) { echo 'checked' ?>   <?php }?>  />
								</p>
								
								
                                 
                                    
								
								<p>
									<input class="button" type="submit" name="submit" value="Submit"  onclick="return valid();" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
	
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			
			
			
			<?php include("proj_resources/inc_files/footer_inc.php"); ?>	
			

			
			<!-- End Notifications -->
			
			<!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div>
</body>
</html>