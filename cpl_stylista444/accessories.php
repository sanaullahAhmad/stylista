<?php
function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir); 
   } 
 }
include("proj_resources/inc_files/header_tag.php");
include("proj_resources/inc_files/create-thumb.php");
$sql_sel		=	"select * from tbl_accessories";
$res			=	mysql_query($sql_sel);
//$userData		=	mysql_fetch_array($res);

$msg="";
$msg1="";
if(isset($_REQUEST['action']))
	{
		
		if($_REQUEST['action']=='delete')
			{
				mysql_query("delete from tbl_accessories  where acc_id=".$_REQUEST['id']."");
				$msg="Deleted Successfully";
			}
		header("location:".$pagename."?page=".$_GET['page']."&msg=".$msg."");
		exit();
		
	}
if(isset($_POST['all_delete']))
		{

	foreach($_POST['all_delete'] as $delete_id)
		{

		
			mysql_query("delete from tbl_accessories  where acc_id=".$delete_id."");
			
		}
		
		$msg="Deleted Successfully";
		header("location:".$pagename."?page=".$_GET['page']."&msg=".$msg."");
		exit();
	}

if(isset($_REQUEST['submit']))
	{
		/*$page_title= mysql_real_escape_string($_POST['page_title']);
		$page_name= mysql_real_escape_string($_POST['page_name']);
		$keywords =  mysql_real_escape_string(str_replace("'","&#8217;", $_POST['keywords']));
		$metatags =  mysql_real_escape_string(str_replace("'","&#8217;", $_POST['metatags']));
		$description= addslashes(urlencode($_POST['description']));*/
		
		// Add new page code start
		if($_POST['file_action']=='new')
		{
			//$parent_cat	=	$_POST['parent_cat'];
			echo "<pre>";
			print_r($_POST);
			print_r($_FILES);
			echo "</pre>";
			//exit;
			  $sql_ins	=	"insert into tbl_accessories set
					acc_name	=	'".mysql_real_escape_string($_POST['acc_name'])."',
					acc_description	=	'".mysql_real_escape_string($_POST['description'])."',
					acc_status	=	'".$_POST['acc_status']."',
					acc_price	=	'".mysql_real_escape_string($_POST['acc_price'])."',
					fk_console_id	=	'".$_POST['acc_console']."'";
				mysql_query($sql_ins);
				$insert_id	=	mysql_insert_id();
			if(isset($_FILES['acc_image']['name'])) {
				$image_name		=	$_FILES['acc_image']['name'];
				 $image_path	=	mkdir("../media/acc_images/".$insert_id, 0755);
				 $thumb_path	=	mkdir("../media/acc_images/".$insert_id."/thumbs/", 0755);
				 $upload_path	=	"../media/acc_images/".$insert_id.'/';
				
			$upload_path	=	$upload_path . basename($_FILES['acc_image']['name']);
			if(move_uploaded_file($_FILES['acc_image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/acc_images/'.$insert_id.'/';
				 $pathToThumbs	=	'../media/acc_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				
				$upd_acc	=	"update tbl_accessories set acc_image = '".$image_name."' where acc_id	=	$insert_id";
				mysql_query($upd_acc);	
			}
				}
			 
			 header("location:".$pagename."?msg=Accessry added Successfully");
		
			}	
		// new page code End	

		// Edit page code start
			if($_POST['file_action']=='update')
			{
				$rec_id	=	$_POST['rec_id'];
				//$upd_user = "";
				//echo "<pre>";
				//print_r($_POST);
				//echo "</pre>";
				//exit;
				 $upd_cat	=	"insert into tbl_accessories set
					acc_name	=	'".mysql_real_escape_string($_POST['acc_name'])."',
					acc_description	=	'".mysql_real_escape_string($_POST['description'])."',
					acc_status	=	'".$_POST['acc_status']."',
					acc_price	=	'".mysql_real_escape_string($_POST['acc_price'])."',
					fk_console_id	=	'".$_POST['acc_console']."'
					where acc_id = $rec_id";
							
				mysql_query($upd_cat);
				if(isset($_FILES['acc_image']['name'])) {
				$image_name		=	$_FILES['acc_image']['name'];
				rrmdir("../media/acc_images/".$rec_id);
				 $image_path	=	mkdir("../media/acc_images/".$rec_id, 0755);
				 $thumb_path	=	mkdir("../media/acc_images/".$rec_id."/thumbs/", 0755);
				 $upload_path	=	"../media/acc_images/".$rec_id.'/';
				
			$upload_path	=	$upload_path . basename($_FILES['acc_image']['name']);
			if(move_uploaded_file($_FILES['acc_image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/acc_images/'.$rec_id.'/';
				 $pathToThumbs	=	'../media/acc_images/'.$rec_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				
				$upd_acc	=	"update tbl_accessories set acc_image = '".$image_name."' where acc_id	=	$rec_id";
				mysql_query($upd_acc);	
			}
				}
				header("location:".$pagename."?page=".$_POST['page_id']."&msg=Accessory Updated Successfully");
				exit;
				
			}	
		// Edit page code End	

	}


if(isset($_GET['msg']))
{
		$msg=$_GET['msg'];}
		
$total_record = mysql_num_rows(mysql_query("select * from tbl_accessories"));
$pagination->setTotalRecords($total_record);

// Set Target Page
$pagination->setLink("".$pagename."?page=%s");	
// now use this SQL statement to get records from your table
$sql = "SELECT * FROM tbl_accessories  ORDER BY acc_id ASC " . $pagination->getLimitSql();
$query=mysql_query($sql);
$order_row=mysql_num_rows($query);

if(isset($_GET['act']))
{
$edit_page = mysql_fetch_array(mysql_query("SELECT * FROM tbl_accessories where acc_id='".mysql_real_escape_string($_GET['id'])."'"));
}
 ?>
<script language="javascript">

	var string=/^[a-zA-Z ]+$/;
	var string2=/^[a-zA-Z0-9._ ]+$/;
	var string3=/^[a-zA-Z0-9_]+$/;
	var numbr=/^[0-9]+$/;
	var email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z0-9.]{2,6}$/;
function valid()
	{
	
	if(string2.test(document.getElementById("acc_name").value)==false)
		{
	 
		inlineMsg('cat_name','Please!  Enter Category Name ',2);
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
					
					<h3>Manage Categories</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" <?php if(!isset($_GET['act'])) { ?>  class="default-tab" <?php } ?>>Accessories</a></li> <!-- href must be unique and match the id of target div -->
						<?php if(isset($_GET['act'])) { ?>
						<li><a href="#tab2"   class="default-tab">Modify Accessories</a></li>
						<?php } else { ?>
						<li><a href="#tab2">Add Accessories</a></li>
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
							<form method="post" action="<?php echo $pagename; ?>">	
						<table>
							
							<thead>
								<tr>
								   <th width="20"><input class="check-all" id="allbox" name="allbox" type="checkbox" /></th>
								   <th width="94">Accessories</th>
								   <th width="606">Description</th>
								   <th width="42">Price</th>
								   <th width="42">Status</th>
                                   <th width="42">Image</th>
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
						   while($acc=mysql_fetch_array($res)){ ?>		
								<tr>
								
									<td>
										<input type="checkbox" name="all_delete[]" value="<?php echo $acc['acc_id']; ?>" />
									</td>
									<td>
										<?php 
												echo $acc['acc_name'];		
										?>
									</td>
									<td>
										<a href="#" title="title">
											<?php echo $acc['acc_description'];?>
										</a>
									</td>
									<td>
										<?php echo $acc['acc_price'];?>
									</td>
                                    
									<td>
										<?php
											if($acc['acc_status']==0) {
												echo "Inactive";
											} else {
												echo "Active";
											}
										?>
									</td>
                                    <td>
                                    	<img src="../media/acc_images/<?php echo $acc['acc_id']?>/thumbs/<?php echo $acc['acc_image']?>" />
                                    </td>
																
									<td valign="top">
										<!-- Icons -->
										 <a href="<?php echo $pagename?>?act=update&id=<?php echo $acc['acc_id']?>&page=<?php if(isset($_REQUEST['page'])){echo $_REQUEST['page'];} else {echo "1";}?>"><img src="proj_resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo $pagename?>?action=delete&id=<?php echo $acc['acc_id']?>&page=<?php if(isset($_REQUEST['page'])){echo $_REQUEST['page']; } else {echo "1";}?>" onClick="return confirm('Are you sure you want to delete?')"><img src="proj_resources/images/icons/cross.png" alt="Delete" /> </a>
										
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
							<input type="hidden" name="rec_id" value="<?php echo $edit_page['acc_id']; ?>">
							<?php } ?>
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Accessory Name</label>
										<input class="text-input small-input" type="text" id="acc_name" name="acc_name"  value="<?php if(isset($_GET['act'])) { echo $edit_page['acc_name']; } else { echo ""; } ?>" />
								</p>
								<p>
									<label>Description:</label>
                                    
								</p>
                                 
                                    <div><textarea id="description" name="description"><?php if(isset($_GET['act'])){ echo stripslashes(urldecode($edit_page['acc_description'])); } else { echo ""; } ?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'description' );
			</script>
								</div>
								
								
								<p>
								<label>Status</label>
								<select name="acc_status">
									<option value="0" <?php if(isset($_GET['act'])){if($edit_page['acc_status']=='0') {echo "selected = selected";}}?>>Inactive</option>
									<option value="1" <?php if(isset($_GET['act'])){if($edit_page['acc_status']=='1') {echo "selected = selected";}}?>>Active</option>	
								</select>
								</p>
                                <p>
								<label>Console</label>
								<select name="acc_console">
									<?php
                                    $sel_con	=	"select * from games_consoles where console_status	=	1";
									$con_data	=	mysql_query($sel_con);
									while($con	=	mysql_fetch_array($con_data)) {
										?>
                                        <option value="<?php echo $con['pk_console_id']?>"><?php echo $con['console_name']?></option>
										<?php
										}
									?>	
								</select>
								</p>
                                <p>
									<label>Price</label>
										<input class="text-input small-input" type="text" id="product_price" name="acc_price"  value="<?php if(isset($_GET['act'])) { echo $edit_page['acc_price']; } else { echo ""; } ?>" />
								</p>
								<p>
                                <label>Image</label>
                                <input type="file" name="acc_image" id="acc_image" />
                                </p>
                                <?php
                                if(isset($_GET['act'])) {
									?>
                                   <img src="../media/acc_images/<?php echo $edit_page['acc_id']?>/thumbs/<?php echo $edit_page['acc_image']?>" />
								   <?php
									}
								?>
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