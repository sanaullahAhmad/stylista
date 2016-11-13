<?php include("proj_resources/inc_files/header_tag.php");
include("proj_resources/inc_files/create-thumb.php");
$sql_sel		=	"select * from tbl_image_slider " . $pagination->getLimitSql();
$res			=	mysql_query($sql_sel);
//$userData		=	mysql_fetch_array($res);

$msg="";
$msg1="";



if(isset($_REQUEST['submit']))
	{
		if($_POST['file_action']=='update')
			{
						
				echo "<pre>";
				print_r($_POST);
				print_r($_FILES);
				echo "<pre>";
				//exit;
				
			 if(isset($_FILES['prd_main_image']) && $_FILES['prd_main_image']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/slider_images", 0755, true);
				 $thumb_path	= mkdir("../media/slider_images/thumbs/", 0755,true);
				 $upload_path	=	"../media/slider_images/";
				 $upload_path	=	$upload_path . basename($_FILES['prd_main_image']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['prd_main_image']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/slider_images/';
				 $pathToThumbs	=	'../media/slider_images/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_image_slider set prd_main_image = '".mysql_real_escape_string($_FILES['prd_main_image']['name'])."'";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_1']) && $_FILES['thumbnail_1']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/slider_images", 0755, true);
				 $thumb_path	= mkdir("../media/slider_images/thumbs/", 0755,true);
				 $upload_path	=	"../media/slider_images/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_1']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_1']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/slider_images/';
				 $pathToThumbs	=	'../media/slider_images/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_image_slider set prd_thumb_1 = '".mysql_real_escape_string($_FILES['thumbnail_1']['name'])."'";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_2']) && $_FILES['thumbnail_2']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/slider_images", 0755, true);
				 $thumb_path	= mkdir("../media/slider_images/thumbs/", 0755,true);
				 $upload_path	=	"../media/slider_images/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_2']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_2']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/slider_images/';
				 $pathToThumbs	=	'../media/slider_images/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_image_slider set prd_thumb_2 = '".mysql_real_escape_string($_FILES['thumbnail_2']['name'])."'";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_3']) && $_FILES['thumbnail_3']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/slider_images/", 0755, true);
				 $thumb_path	= mkdir("../media/slider_images/thumbs/", 0755,true);
				 $upload_path	=	"../media/slider_images/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_3']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_3']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/slider_images/';
				 $pathToThumbs	=	'../media/slider_images/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_image_slider set prd_thumb_3 = '".mysql_real_escape_string($_FILES['thumbnail_3']['name'])."'";
				mysql_query($sql_upd);
					
			}
			}
			if(isset($_FILES['thumbnail_4']) && $_FILES['thumbnail_4']['name']!="") {
			//echo 'sanaullah'; exit;
				 $image_path	= mkdir("../media/slider_images", 0755, true);
				 $thumb_path	= mkdir("../media/slider_images/thumbs/", 0755,true);
				 $upload_path	=	"../media/slider_images/";
				 $upload_path	=	$upload_path . basename($_FILES['thumbnail_4']['name']);
			echo $upload_path;
			if(move_uploaded_file($_FILES['thumbnail_4']['tmp_name'],$upload_path))
			{
				 $pathToImages	=	'../media/slider_images/';
				 $pathToThumbs	=	'../media/slider_images/thumbs/';
				
				//require_once('../resources/thumb/create_thumbs.php');
				
				createThumbs($pathToImages,$pathToThumbs,150);
				$sql_upd	=	"update tbl_image_slider set prd_thumb_4 = '".mysql_real_escape_string($_FILES['thumbnail_4']['name'])."'";
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
		
$total_record = mysql_num_rows(mysql_query("select * from tbl_image_slider"));
$pagination->setTotalRecords($total_record);

// Set Target Page
$pagination->setLink("".$pagename."?page=%s");	
// now use this SQL statement to get records from your table
$sql = "SELECT * FROM tbl_image_slider  ORDER BY pk_product_id ASC " . $pagination->getLimitSql();
$query = mysql_query($sql);
$order_row = mysql_num_rows($query);


$edit_page = mysql_fetch_array(mysql_query("SELECT * FROM tbl_image_slider"));

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
					
					<h3>Manage Slider Images</h3>
					
					
					
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
							
					</div> <!-- End #tab1 -->
					
					<div class="tab-content  default-tab" id="tab2">
					
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" name="file_action" value="<?php   echo "update";  ?>">
							<?php if(isset($_GET['act'])) { ?>
							<input type="hidden" name="page_id" value="<?php echo $_GET['page']; ?>">
							<input type="hidden" name="rec_id" value="">
							<?php } ?>
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
																	
								<p>
									<label>Upload Slider Central Image</label>
										<input type="file" id="slider" name="prd_main_image" />
								</p>
                                
                                       <img src="../media/slider_images/thumbs/<?php echo $edit_page['prd_main_image']?>"/> 
								
                                <p>
									<label>Upload Left slider Uper Image</label>
										<input type="file" id="slider" name="thumbnail_1" />
								</p>
                                </p>
                                
                                       <img src="../media/slider_images/thumbs/<?php echo $edit_page['prd_thumb_1']?>"/> 
								
                                <p>
                                <p>
									<label>Upload Left slider Lower Image</label>
										<input type="file" id="slider" name="thumbnail_2" />
								</p>
                                </p>
                                
                                       <img src="../media/slider_images/thumbs/<?php echo $edit_page['prd_thumb_2']?>"/> 
								
                                <p>
                                <p>
									<label>Upload Right Slider Uppar Image</label>
										<input type="file" id="slider" name="thumbnail_3" />
								</p>
                                </p>
                                
                                       <img src="../media/slider_images/thumbs/<?php echo $edit_page['prd_thumb_3']?>"/> 
								
                                <p>
                                <p>
									<label>Upload Right Slider Lower Image</label>
										<input type="file" id="slider" name="thumbnail_4" />
								</p>
                                </p>
                                
                                       <img src="../media/slider_images/thumbs/<?php echo $edit_page['prd_thumb_4']?>"/> 
								
                                
								
								
								
								
								
                                 
                                    
								
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