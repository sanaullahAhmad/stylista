<?php include("proj_resources/inc_files/header_tag.php");
$sql_sel		= "SELECT s1.cat_name category, s1.pk_cat_id, s1.cat_desc, s1.cat_status, s2.cat_name parent_category 
					FROM games_category s1, games_category s2 
					WHERE s1.fk_cat_id = s2.pk_cat_id AND s1.pk_cat_id !=0";
$res			=	mysql_query($sql_sel);
//$userData		=	mysql_fetch_array($res);

$msg="";
$msg1="";
if(isset($_REQUEST['action']))
	{
		if($_REQUEST['action']=='delete')
			{
				mysql_query("delete from games_category  where pk_cat_id=".$_REQUEST['id']."");
				$msg="Deleted Successfully";
			}
		header("location:".$pagename."?page=".$_GET['page']."&msg=".$msg."");
		exit();
		
	}
	
if(isset($_POST['all_delete']))
		{

	foreach($_POST['all_delete'] as $delete_id)
		{

			//echo "delete from games_category  where pk_cat_id=".$delete_id."";
			//exit;
			mysql_query("delete from games_category  where pk_cat_id=".$delete_id."");
			
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
			$parent_cat	=	$_POST['parent_cat'];
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			//exit;
			 $sql_ins	=	"insert into games_category set
							cat_name	=	'".$_POST['cat_name']."',
							cat_desc	=	'".$_POST['description']."',
							 fk_cat_id	=	$parent_cat,
							 cat_status	=	'".$_POST['cat_status']."'";
			 mysql_query($sql_ins);
			 header("location:".$pagename."?msg=Category added Successfully");
		
			}	
		// new page code End	

		// Edit page code start
			if($_POST['file_action']=='update')
			{
				$rec_id	=	$_POST['rec_id'];
				//$upd_user = "";
				echo "<pre>";
				print_r($_POST);
				echo "</pre>";
				//exit;
				$upd_cat	=	"update games_category set 
								cat_name	=	'".$_POST['cat_name']."',
								cat_desc	=	'".$_POST['description']."',
								fk_cat_id	=	'".$_POST['parent_cat']."',
								cat_status	=	'".$_POST['cat_status']."'
								where pk_cat_id	=	$rec_id";
				
				mysql_query($upd_cat);
				header("location:".$pagename."?page=".$_POST['page_id']."&msg=Category Updated Successfully");
				exit;
				
			}	
		// Edit page code End	

	}


if(isset($_GET['msg']))
{
		$msg=$_GET['msg'];}
		
$total_record = mysql_num_rows(mysql_query("select * from games_category"));
$pagination->setTotalRecords($total_record);

// Set Target Page
$pagination->setLink("".$pagename."?page=%s");	
// now use this SQL statement to get records from your table
$sql = "SELECT * FROM games_category  ORDER BY pk_cat_id ASC " . $pagination->getLimitSql();
$query=mysql_query($sql);
$order_row=mysql_num_rows($query);

if(isset($_GET['act']))
{
$edit_page = mysql_fetch_array(mysql_query("SELECT * FROM games_category where pk_cat_id='".mysql_real_escape_string($_GET['id'])."'"));
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
	
	if(string2.test(document.getElementById("cat_name").value)==false)
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
					
					<h3>Manage Sub Categories</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" <?php if(!isset($_GET['act'])) { ?>  class="default-tab" <?php } ?>>Sub Categories</a></li> <!-- href must be unique and match the id of target div -->
						<?php if(isset($_GET['act'])) { ?>
						<li><a href="#tab2"   class="default-tab">Modify Sub Categories</a></li>
						<?php } else { ?>
						<li><a href="#tab2">Add Sub Category</a></li>
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
								   <th width="94">Category</th>
								   <th width="606">Description</th>
								   <th width="64">Parent Category</th>
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
						   while($cat=mysql_fetch_array($res)){ ?>		
								<tr>
								
									<td>
										<input type="checkbox" name="all_delete[]" value="<?php echo $cat['pk_cat_id']; ?>" />
									</td>
									<td>
										<?php 
												echo $cat['category'];		
										?>
									</td>
									<td>
										<a href="#" title="title">
											<?php echo $cat['cat_desc'];?>
										</a>
									</td>
									<td>
										<?php
										 	echo $cat['parent_category'];
										 ?>
									</td>
									<td>
										<?php
											if($cat['cat_status']==0) {
												echo "Inactive";
											} else {
												echo "Active";
											}
										?>
									</td>
																
									<td valign="top">
										<!-- Icons -->
										 <a href="<?php echo $pagename?>?act=update&id=<?php echo $cat['pk_cat_id']?>&page=<?php if(isset($_REQUEST['page'])){echo $$_REQUEST['page'];} else {echo "1";}?>"><img src="proj_resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo $pagename?>?action=delete&id=<?php echo $cat['pk_cat_id']?>&page=<?php if(isset($_REQUEST['page'])){echo $_REQUEST['page']; } else {echo "1";}?>" onClick="return confirm('Are you sure you want to delete?')"><img src="proj_resources/images/icons/cross.png" alt="Delete" /> </a>
										
									</td>
								</tr>
							<?php	$order_counter++;} ?>
								
							</tbody>						
							
						</table>
						</form>
					</div> <!-- End #tab1 -->
					
					<div class="tab-content <?php if(isset($_GET['act'])) { ?> default-tab <?php } ?>" id="tab2">
					
						<form action="#" method="post">
							<input type="hidden" name="file_action" value="<?php if(isset($_GET['act'])) {  echo "update"; } else { echo "new"; } ?>">
							<?php if(isset($_GET['act'])) { ?>
							<input type="hidden" name="page_id" value="<?php echo $_GET['page']; ?>">
							<input type="hidden" name="rec_id" value="<?php echo $edit_page['pk_cat_id']; ?>">
							<?php } ?>
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Category Name</label>
										<input class="text-input small-input" type="text" id="cat_name" name="cat_name"  value="<?php if(isset($_GET['act'])) { echo $edit_page['cat_name']; } else { echo ""; } ?>" />
								</p>
								<p>
									<label>Description:</label>
                                    
								</p>
                                 
                                    <div><textarea id="description" name="description"><?php if(isset($_GET['act'])){ echo stripslashes(urldecode($edit_page['cat_desc'])); } else { echo ""; } ?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'description' );
			</script>
								</div>
								
								<p>
								<label>Parent Category</label>
								<select name="parent_cat">
									<option value="0">Select One</option>
									<?php
										$sql_sel	=	"select * from games_category where fk_cat_id	=	0";
										$res		=	mysql_query($sql_sel);
										
										while($cat = mysql_fetch_array($res)) {
										?>
											<option value="<?php echo $cat['pk_cat_id'];?>" <?php if(isset($edit_page)){if($edit_page['fk_cat_id']==$cat['pk_cat_id']){echo "selected = selected";}}?>><?php echo $cat['cat_name'];?></option>
										<?php
										}
									?>	
								</select>
								</p>
								<p>
								<label>Status</label>
								<select name="cat_status">
									<option value="0" <?php if(isset($_GET['act'])){if($edit_page['cat_status']=='0') {echo "selected = selected";}}?>>Inactive</option>
									<option value="1" <?php if(isset($_GET['act'])){if($edit_page['cat_status']=='1') {echo "selected = selected";}}?>>Active</option>	
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