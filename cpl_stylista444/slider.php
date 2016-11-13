<?php include("proj_resources/inc_files/header_tag.php");
include("proj_resources/inc_files/create-thumb.php");

$sql_sel		=	"select * from tbl_slider";
$res			=	mysql_query($sql_sel);
//$userData		=	mysql_fetch_array($res);

$msg="";
$msg1="";
if(isset($_REQUEST['action']))
	{
		
		if($_REQUEST['action']=='delete')
			{
				mysql_query("delete from tbl_slider  where pk_slider_id=".$_REQUEST['id']."");
				$msg="Deleted Successfully";
			}
		header("location:".$pagename."?page=".$_GET['page']."&msg=".$msg."");
		exit();
		
	}
	



if(isset($_POST['all_delete']))
		{

	foreach($_POST['all_delete'] as $delete_id)
		{

		
			mysql_query("delete from tbl_slider  where pk_slider_id=".$delete_id."");
			
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
			//echo "<pre>";
			//print_r($_POST);
			//print_r($_FILES);
			//echo "</pre>";
			//exit;
			 $ins_query	=	"insert into tbl_slider
							set 
								slider_name		=	'".$_POST['image_name']."',
								slider_status	=	'".$_POST['slider_status']."',
								image_name		=	'".$_FILES['slider']['name']."'";
			mysql_query($ins_query);
			if(isset($_FILES['slider']['name'])) {
				 $image_path	=	mkdir("../media/slider_images/", 0755, true);
				 $thumb_path	=	mkdir("../media/slider_images/thumbs/", 0755,true);
				 $upload_path	=	"../media/slider_images/";
				
			$upload_path	=	$upload_path . basename($_FILES['slider']['name']);
			if(move_uploaded_file($_FILES['slider']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/slider_images/';
				 $pathToThumbs	=	'../media/slider_images/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
					
			}
				}
			header("location:".$pagename."?page=".$_POST['page_id']."&msg=Image Uploaded Successfully");
			}	
		// new page code End	

		// Edit page code start
			if($_POST['file_action']=='update')
			{
				$slider_id	=	$_REQUEST['id'];
				 $upd_query	=	"update tbl_slider
							set 
								slider_name		=	'".$_POST['image_name']."',
								slider_status	=	'".$_POST['slider_status']."',
								image_name		=	'".$_FILES['slider']['name']."'
								where pk_slider_id	=	$slider_id";
			mysql_query($upd_query);
			if(isset($_FILES['slider']['name'])) {
				 $image_path	=	mkdir("../media/slider_images/", 0755,true);
				 $thumb_path	=	mkdir("../media/slider_images/thumbs/", 0755,true);
				 $upload_path	=	"../media/slider_images/";
				
			$upload_path	=	$upload_path . basename($_FILES['slider']['name']);
			if(move_uploaded_file($_FILES['slider']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/slider_images/';
				 $pathToThumbs	=	'../media/slider_images/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
					
			}
				}
				
				
				header("location:".$pagename."?page=".$_POST['page_id']."&msg=Slider Image Updated Successfully");
				//exit;
				
			}	
		// Edit page code End	

	}


if(isset($_GET['msg']))
{
		$msg=$_GET['msg'];}
		
$total_record = mysql_num_rows(mysql_query("select * from tbl_slider"));
$pagination->setTotalRecords($total_record);

// Set Target Page
$pagination->setLink("".$pagename."?page=%s");	
// now use this SQL statement to get records from your table
$sql = "SELECT * FROM tbl_slider  ORDER BY pk_slider_id ASC " . $pagination->getLimitSql();
$query=mysql_query($sql);
$order_row=mysql_num_rows($query);

if(isset($_GET['act']))
{
$edit_page = mysql_fetch_array(mysql_query("SELECT * FROM tbl_slider where pk_slider_id='".mysql_real_escape_string($_GET['id'])."'"));
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
	
	if(string2.test(document.getElementById("first_name").value)==false)
		{
	 
		inlineMsg('first_name','Please!  Enter First Name',2);
		return false;
		 
		}
	if(string2.test(document.getElementById("last_name").value)==false)
		{
	 
		inlineMsg('last_name','Please!  Enter Last Name',2);
		return false;
		 
		}
	if(string2.test(document.getElementById("user_name").value)==false)
		{
	 
		inlineMsg('user_name','Please!  Enter User Name',2);
		return false;
		 
		}
	if(email.test(document.getElementById("email").value)==false)
		{
	 
		inlineMsg('email','Please ! Enter Valid Email Address',2);
		return false;
		 
		}
	if(document.getElementById("password").value!=document.getElementById("c_pass").value)
		{
	 
		inlineMsg('password','Password Miss Match',2);
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
					
					<h3>Manage Slider</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" <?php if(!isset($_GET['act'])) { ?>  class="default-tab" <?php } ?>>Slider</a></li> <!-- href must be unique and match the id of target div -->
						<?php if(isset($_GET['act'])) { ?>
						<li><a href="#tab2"   class="default-tab">Modify Slider</a></li>
						<?php } else if($order_row<10) { ?>
						<li><a href="#tab2">Add Slider</a></li>
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
								   <th width="94">Name</th>
								   <th width="606">Image</th>
								   
								   <th width="42">Status</th>
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
						   while($img=mysql_fetch_array($res)){ ?>		
								<tr>
								
									<td>
										<input type="checkbox" name="all_delete[]" value="<?php echo $img['pk_slider_id']; ?>" />
									</td>
									<td>
										<?php 
											echo $img['slider_name'];
										?>
									</td>
									<td>
										<img src="../media/slider_images/thumbs/<?php echo $img['image_name']?>"/>
									</td>
									
									<td>
										<?php
											if($img['slider_status']==0) {
												echo "Inactive";
											} else {
												echo "Active";
											}
										?>
									</td>
																
									<td valign="top">
										<!-- Icons -->
										 <a href="<?php echo $pagename;?>?act=update&id=<?php echo $img['pk_slider_id']?>&page=<?php if(isset($_REQUEST['page'])) {echo $_REQUEST['page'];} else {echo "1";}?>"><img src="proj_resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo $pagename;?>?action=delete&id=<?php echo $img['pk_slider_id']?>&page=<?php if(isset($_REQUEST['page'])){ echo $_REQUEST['page'];} else {echo "1";}?>" onClick="return confirm('Are you sure you want to delete?')"><img src="proj_resources/images/icons/cross.png" alt="Delete" /> </a>
										
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
							<input type="hidden" name="rec_id" value="<?php echo $edit_page['pk_slider_id']; ?>">
							<?php } ?>
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Image Name</label>
										<input class="text-input small-input" type="text" id="image_name" name="image_name"  value="<?php if(isset($_GET['act'])) { echo $edit_page['slider_name']; } else { echo ""; } ?>" />
								</p>
                                <p>
									<label>Upload Image</label>
										<input type="file" id="slider" name="slider" />
								</p>
								
								<p>
								<label>Status</label>
								<select name="slider_status">
									<option value="0" <?php if(isset($_GET['act']) && $edit_page['slider_status']=='0') {echo "selected = selected";}?>>Inactive</option>
									<option value="1" <?php if(isset($_GET['act']) && $edit_page['slider_status']=='1') {echo "selected = selected";}?>>Active</option>	
								</select>
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