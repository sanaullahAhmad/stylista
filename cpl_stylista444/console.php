<?php include("proj_resources/inc_files/header_tag.php");
include("proj_resources/inc_files/create-thumb.php");
$sql_sel		=	"select * from games_consoles";
$res			=	mysql_query($sql_sel);
//$userData		=	mysql_fetch_array($res);

$msg="";
$msg1="";
if(isset($_REQUEST['action']))
	{
		
		if($_REQUEST['action']=='delete')
			{
				mysql_query("delete from games_consoles  where pk_console_id=".$_REQUEST['id']."");
				$msg="Deleted Successfully";
			}
		header("location:".$pagename."?page=".$_GET['page']."&msg=".$msg."");
		exit();
		
	}
if(isset($_POST['all_delete']))
		{

	foreach($_POST['all_delete'] as $delete_id)
		{

		
			mysql_query("delete from games_consoles  where pk_console_id=".$delete_id."");
			
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
			//echo "<pre>";
			//print_r($_POST);
			//echo "</pre>";
			//exit;
			 $sql_ins	=	"insert into games_consoles set
							console_name	=	'".$_POST['cat_name']."',
							console_desc	=	'".$_POST['description']."',
							console_status	=	'".$_POST['cat_status']."',
							date			=	now(),
							console_price	=	'".$_POST['price']."'";
							 
			 mysql_query($sql_ins);
			 $insert_id	=	mysql_insert_id();
			 	if(isset($_FILES['con_image']['name'])) {
				$image_name		=	$_FILES['con_image']['name'];
				 $image_path	=	mkdir("../media/console_images/".$insert_id, 0755);
				 $thumb_path	=	mkdir("../media/console_images/".$insert_id."/thumbs/", 0755);
				 $upload_path	=	"../media/console_images/".$insert_id.'/';
				
			$upload_path	=	$upload_path . basename($_FILES['con_image']['name']);
			if(move_uploaded_file($_FILES['con_image']['tmp_name'],$upload_path))
			{
				$pathToImages	=	'../media/console_images/'.$insert_id.'/';
			 	$pathToThumbs	=	'../media/console_images/'.$insert_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				
				$upd_acc	=	"update games_consoles set con_image = '".$image_name."' where pk_console_id	=	$insert_id";
				mysql_query($upd_acc);	
			}
				}
			 header("location:".$pagename."?msg=Console added Successfully");
		
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
				$upd_cat	=	"update games_consoles set 
								console_name	=	'".$_POST['cat_name']."',
								console_desc	=	'".$_POST['description']."',
								
								console_status	=	'".$_POST['cat_status']."',
								console_price	=	'".$_POST['price']."'
								where pk_console_id	=	$rec_id";
				mysql_query($upd_cat);
				if(isset($_FILES['con_image']['name'])) {
				$image_name		=	$_FILES['con_image']['name'];
				 $image_path	=	mkdir("../media/console_images/".$rec_id, 0755);
				 $thumb_path	=	mkdir("../media/console_images/".$rec_id."/thumbs/", 0755);
				 $upload_path	=	"../media/console_images/".$rec_id.'/';
				
			$upload_path	=	$upload_path . basename($_FILES['con_image']['name']);
			if(move_uploaded_file($_FILES['con_image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/console_images/'.$rec_id.'/';
				 $pathToThumbs	=	'../media/console_images/'.$rec_id.'/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				
				$upd_acc	=	"update games_consoles set con_image = '".$image_name."' where pk_console_id	=	$rec_id";
				mysql_query($upd_acc);	
			}
				}
				
				mysql_query($upd_cat);
				header("location:".$pagename."?page=".$_POST['page_id']."&msg=Console Updated Successfully");
				exit;
				
			}	
		// Edit page code End	

	}


if(isset($_GET['msg']))
{
		$msg=$_GET['msg'];}
		
$total_record = mysql_num_rows(mysql_query("select * from games_consoles"));
$pagination->setTotalRecords($total_record);

// Set Target Page
$pagination->setLink("".$pagename."?page=%s");	
// now use this SQL statement to get records from your table
$sql = "SELECT * FROM games_consoles  ORDER BY pk_console_id ASC " . $pagination->getLimitSql();
$query=mysql_query($sql);
$order_row=mysql_num_rows($query);

if(isset($_GET['act']))
{
$edit_page = mysql_fetch_array(mysql_query("SELECT * FROM games_consoles where pk_console_id='".mysql_real_escape_string($_GET['id'])."'"));
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
	
	if(document.getElementById("cat_name").value=="")
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
					
					<h3>Manage Consoles</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" <?php if(!isset($_GET['act'])) { ?>  class="default-tab" <?php } ?>>Consoles</a></li> <!-- href must be unique and match the id of target div -->
						<?php if(isset($_GET['act'])) { ?>
						<li><a href="#tab2"   class="default-tab">Modify Console</a></li>
						<?php } else { ?>
						<li><a href="#tab2">Add Console</a></li>
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
								   <th width="94">Console</th>
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
						   while($cat=mysql_fetch_array($res)){ ?>		
								<tr>
								
									<td>
										<input type="checkbox" name="all_delete[]" value="<?php echo $cat['pk_console_id']; ?>" />
									</td>
									<td>
										<?php 
												echo $cat['console_name'];		
										?>
									</td>
									<td>
										<a href="#" title="title">
											<?php echo $cat['console_desc'];?>
										</a>
									</td>
                                    <td>
										<?php echo $cat['console_price'];?>
									</td>
									
									<td>
										<?php
											if($cat['console_status']==0) {
												echo "Inactive";
											} else if($cat['console_status']==1){
												echo "Active";
											}
											else {
												echo "Menu";
												}
										?>
									</td>
                                    <td>
                                    <img src="../media/console_images/<?php echo $cat['pk_console_id']?>/thumbs/<?php echo $cat['con_image']?>" />
                                    </td>
																
									<td valign="top">
										<!-- Icons -->
										 <a href="<?php echo $pagename?>?act=update&id=<?php echo $cat['pk_console_id']?>&page=<?php if(isset($_REQUEST['page'])){echo $_REQUEST['page'];} else {echo "1";}?>"><img src="proj_resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo $pagename?>?action=delete&id=<?php echo $cat['pk_console_id']?>&page=<?php if(isset($_REQUEST['page'])){echo $_REQUEST['page']; } else {echo "1";}?>" onClick="return confirm('Are you sure you want to delete?')"><img src="proj_resources/images/icons/cross.png" alt="Delete" /> </a>
										
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
							<input type="hidden" name="rec_id" value="<?php echo $edit_page['pk_console_id']; ?>">
							<?php } ?>
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Console Name</label>
										<input class="text-input small-input" type="text" id="cat_name" name="cat_name"  value="<?php if(isset($_GET['act'])) { echo $edit_page['console_name']; } else { echo ""; } ?>" />
								</p>
								<p>
									<label>Description:</label>
                                    
								</p>
                                 
                                    <div><textarea id="description" name="description"><?php if(isset($_GET['act'])){ echo stripslashes(urldecode($edit_page['console_desc'])); } else { echo ""; } ?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'description' );
			</script>
								</div>
								<p>
									<label>Price</label>
										<input class="text-input small-input" type="text" id="price" name="price"  value="<?php if(isset($_GET['act'])) { echo $edit_page['console_price']; } else { echo ""; } ?>" />
								</p>
								
								<p>
								<label>Status</label>
								<select name="cat_status">
									<option value="0" <?php if(isset($_GET['act'])){if($edit_page['console_status']=='0') {echo "selected = selected";}}?>>Inactive</option>
									<option value="1" <?php if(isset($_GET['act'])){if($edit_page['console_status']=='1') {echo "selected = selected";}}?>>Active</option>
                                    <option value="2" <?php if(isset($_GET['act'])){if($edit_page['console_status']=='2') {echo "selected = selected";}}?>>Menu</option>	
								</select>
								</p>
                                <p>
								<label>Image</label>
								<input type="file" name="con_image" id="con_image" />
								</p>
								<?php
                                if(isset($_REQUEST['act'])) {
									?>
                                    <img src="../media/console_images/<?php echo $edit_page['pk_console_id']?>/thumbs/<?php echo $edit_page['con_image']?>">
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