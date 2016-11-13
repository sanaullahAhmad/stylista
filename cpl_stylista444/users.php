<?php include("proj_resources/inc_files/header_tag.php");
include("proj_resources/inc_files/create-thumb.php");
$sql_sel		=	"select * from tbl_user";
$res			=	mysql_query($sql_sel);
//$userData		=	mysql_fetch_array($res);

$msg="";
$msg1="";
/*echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
exit;*/
if(isset($_REQUEST['action']))
	{
		
		if($_REQUEST['action']=='delete')
			{
				mysql_query("delete from tbl_user  where pk_user_id=".$_REQUEST['id']."");
				$msg="Deleted Successfully";
			}
		header("location:".$pagename."?page=".$_GET['page']."&msg=".$msg."");
		exit();
		
	}
	



if(isset($_POST['all_delete']))
		{

	foreach($_POST['all_delete'] as $delete_id)
		{

		
			mysql_query("delete from tbl_user  where pk_user_id=".$delete_id."");
			
		}
		
		$msg="Deleted Successfully";
		header("location:".$pagename."?page=".$_GET['page']."&msg=".$msg."");
		exit();
	}

if(isset($_REQUEST['submit']))
	{
		foreach ($_POST as $k => $v) {
    $$k = $v;
}

if ($file_action == "add_user") {
  
    $sql_insert = "insert into tbl_user set
																`full_name`			=	'" . mysql_real_escape_string($_POST['full_name']) . "',
																`nic_num`			=	'" . mysql_real_escape_string($_POST['nic_num']) . "',
																`shop_name`			=	'" . mysql_real_escape_string($_POST['shop_name']) . "',
                                                                `location`      	=   '" . mysql_real_escape_string($_POST['location']) . "',
                                                                 `user_status`      	=   '" . mysql_real_escape_string($_POST['user_status']) . "'
																 `user_email`   	=   '" . mysql_real_escape_string($_POST['email']) . "',
                                                                 `user_password`    =   '" . mysql_real_escape_string($_POST['user_password']) . "',
                                                                 `user_phone`      	=   '" . mysql_real_escape_string($_POST['user_phone']) . "'";

    mysql_query($sql_insert);
    echo $insert_id = mysql_insert_id();

    if (isset($_FILES['user_img']) && $_FILES['user_img']['name'] != "") {
        $image_path = mkdir("../media/user_files/profile_pictures/" . $insert_id . "/", 0755, true);
        $thumb_path = mkdir("../media/user_files/profile_pictures/" . $insert_id . "/thumbs/", 0755, true);
        $upload_path = "../media/user_files/profile_pictures/" . $insert_id . "/";
        $upload_path = $upload_path . basename($_FILES['user_img']['name']);
        echo $upload_path;
        if (move_uploaded_file($_FILES['user_img']['tmp_name'], $upload_path)) {
            $pathToImages = '../media/user_files/profile_pictures/' . $insert_id . '/';
            $pathToThumbs = '../media/user_files/profile_pictures/' . $insert_id . '/thumbs/';

            //require_once('../resources/thumb/create_thumbs.php');

            createThumbs($pathToImages, $pathToThumbs, 150);
            $sql_upd = "update tbl_user set user_image = '" . mysql_real_escape_string($_FILES['user_img']['name']) . "' where pk_user_id	=	$insert_id";
            mysql_query($sql_upd);
        }
    }
header('location:'.$ru);
exit;
    
}




if ($_POST['file_action'] == "edit_user") {
	//echo $_POST['user_status'];
	//exit;
  
    $sql_insert = "update tbl_user set
																`full_name`			=	'" . mysql_real_escape_string($_POST['full_name']) . "',
																`nic_num`			=	'" . mysql_real_escape_string($_POST['nic_num']) . "',
																`shop_name`			=	'" . mysql_real_escape_string($_POST['shop_name']) . "',
                                                                `location`      	=   '" . mysql_real_escape_string($_POST['location']) . "',
                                                                 `user_email`   	=   '" . mysql_real_escape_string($_POST['email']) . "',
                                                                 `user_password`    =   '" . mysql_real_escape_string($_POST['user_password']) . "',
                                                                 `user_phone`      	=   '" . mysql_real_escape_string($_POST['user_phone']) . "',
																 `user_status`      	=   '" . mysql_real_escape_string($_POST['user_status']) . "'
																 
																 where pk_user_id  = '" . mysql_real_escape_string($_POST['rec_id']) . "'";

    mysql_query($sql_insert);
    

    if (isset($_FILES['user_img']) && $_FILES['user_img']['name'] != "") {
		
		//echo "sanaullah"; exit;
		
       /* $image_path = mkdir("../media/user_files/profile_pictures/" . $rec_id . "/", 0755, true);
        $thumb_path = mkdir("../media/user_files/profile_pictures/" . $rec_id . "/thumbs/", 0755, true);*/
        $upload_path = "../media/user_files/profile_pictures/" . $rec_id . "/";
        $upload_path = $upload_path . basename($_FILES['user_img']['name']);
        echo $upload_path;
        if (move_uploaded_file($_FILES['user_img']['tmp_name'], $upload_path)) {
            $pathToImages = '../media/user_files/profile_pictures/' . $rec_id . '/';
            $pathToThumbs = '../media/user_files/profile_pictures/' . $rec_id . '/thumbs/';

            //require_once('../resources/thumb/create_thumbs.php');

            createThumbs($pathToImages, $pathToThumbs, 150);
            $sql_upd = "update tbl_user set user_image = '" . mysql_real_escape_string($_FILES['user_img']['name']) . "' where pk_user_id	=	'".$_POST['rec_id']."'";
            mysql_query($sql_upd);
        }
    }
header('location:'.$ru);
exit;
    
}
}


if(isset($_GET['msg']))
{
		$msg=$_GET['msg'];}
		
$total_record = mysql_num_rows(mysql_query("select * from tbl_user"));
$pagination->setTotalRecords($total_record);

// Set Target Page
$pagination->setLink("".$pagename."?page=%s");	
// now use this SQL statement to get records from your table
$sql = "SELECT * FROM tbl_user  ORDER BY pk_user_id ASC " . $pagination->getLimitSql();
$query=mysql_query($sql);
$order_row=mysql_num_rows($query);

if(isset($_GET['act']))
{
$edit_page = mysql_fetch_array(mysql_query("SELECT * FROM tbl_user where pk_user_id='".mysql_real_escape_string($_GET['id'])."'"));
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
					
					<h3>Manage Users</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" <?php if(!isset($_GET['act'])) { ?>  class="default-tab" <?php } ?>>Users</a></li> <!-- href must be unique and match the id of target div -->
						<?php if(isset($_GET['act'])) { ?>
						<li><a href="#tab2"   class="default-tab">Modify Users</a></li>
						<?php } /*else { ?>
						<li><a href="#tab2">Add Page</a></li>
						<?php }*/ ?>
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
								   <th width="606">User Name</th>
								   <th width="64">Email</th>
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
						   while($user=mysql_fetch_array($res)){ ?>		
								<tr>
								
									<td>
										<input type="checkbox" name="all_delete[]" value="<?php echo $user['pk_user_id']; ?>" />
									</td>
									<td>
										<?php 
											$name	=	$user['full_name']; 
											echo $name;
										?>
									</td>
									<td>
										<a href="#" title="title">
											<?php echo $user['full_name']; ?>
										</a>
									</td>
									<td>
										<?php echo $user['user_email'];?>
									</td>
									<td>
										<?php
											if($user['user_status']==0) {
												echo "Inactive";
											} else {
												echo "Active";
											}
										?>
									</td>
																
									<td valign="top">
										<!-- Icons -->
										 <a href="<?php echo $pagename;?>?act=update&id=<?php echo $user['pk_user_id']?>&page=<?php if(isset($_REQUEST['page'])) {echo $_REQUEST['page'];} else {echo "1";}?>"><img src="proj_resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo $pagename;?>?action=delete&id=<?php echo $user['pk_user_id']?>&page=<?php if(isset($_REQUEST['page'])){ echo $_REQUEST['page'];} else {echo "1";}?>" onClick="return confirm('Are you sure you want to delete?')"><img src="proj_resources/images/icons/cross.png" alt="Delete" /> </a>
										
									</td>
								</tr>
							<?php	$order_counter++;} ?>
								
								
								
								
								
								
								
								
								
								
								
							</tbody>						
							
						</table>
						</form>
					</div> <!-- End #tab1 -->
					
					<div class="tab-content <?php if(isset($_GET['act'])) { ?> default-tab <?php } ?>" id="tab2">
					
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" name="file_action" value="<?php if(isset($_GET['act'])) {  echo "edit_user"; } else { echo "add_user"; } ?>">
							<?php if(isset($_GET['act'])) { ?>
							<input type="hidden" name="page_id" value="<?php echo $_GET['page']; ?>">
							<input type="hidden" name="rec_id" value="<?php echo $edit_page['pk_user_id']; ?>">
							<?php } ?>
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Full Name</label>
										<input class="text-input small-input" type="text" id="full_name" name="full_name"  value="<?php if(isset($_GET['act'])) { echo $edit_page['full_name']; } else { echo ""; } ?>" />
								</p>
                                <p>
									<label>NIC Number</label>
										<input class="text-input small-input" type="text" id="full_name" name="nic_num"  value="<?php if(isset($_GET['act'])) { echo $edit_page['nic_num']; } else { echo ""; } ?>" />
								</p>
								
								<p>
									<label>Shop Name</label>
										<input class="text-input small-input" type="text" id="shop_name" name="shop_name"  value="<?php if(isset($_GET['act'])) { echo $edit_page['shop_name']; } else { echo ""; } ?>" />
								</p>
                                	<p>
									<label>Email</label>
										<input class="text-input small-input" type="text" id="email" name="email"  value="<?php if(isset($_GET['act']))
{ echo $edit_page['user_email']; } else { echo ""; } ?>" />
								</p>
								<p>
									<label>Address</label>
										<input class="text-input small-input" type="text" id="location" name="location"  value="<?php if(isset($_GET['act']))
{ echo $edit_page['location']; } else { echo ""; } ?>" />
								</p>
								<p>
									<label>Password</label>
										<input class="text-input small-input" type="password" id="password" name="user_password" value="<?php if(isset($_GET['act']))
{ echo $edit_page['user_password']; } else { echo ""; } ?>"/>
								</p>
                                <p>
									<label>User Phone</label>
										<input class="text-input small-input" type="text" id="password" name="user_phone" value="<?php if(isset($_GET['act']))
{ echo $edit_page['user_phone']; } else { echo ""; } ?>"/>
								</p>
                                
								<p>
									<label>Confirm Password</label>
									<input class="text-input small-input" type="password" id="c_pass" name="c_pass" value="<?php if(isset($_GET['act']))
{ echo $edit_page['user_password']; } else { echo ""; } ?>" />
								</p>
                                <p>
									<label>Upload Image</label>
                                    
										<input type="file" id="slider" name="user_img" />
								</p>
                                <p>
                                  <?php if(isset($_GET['act']))
										 {
								  ?>
                                       <img src="../media/user_files/profile_pictures/<?php echo $edit_page['pk_user_id']; ?>/thumbs/<?php echo $edit_page['user_image']?>"/> 
								<?php
                                           
                                        }
								?>
                                </p>
								<p>
								<label>Status</label>
								<select name="user_status">
									<option value="0" <?php if($edit_page['user_status']=='0') {echo "selected = selected";}?>>Inactive</option>
									<option value="1" <?php if($edit_page['user_status']=='1') {echo "selected = selected";}?>>Active</option>	
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