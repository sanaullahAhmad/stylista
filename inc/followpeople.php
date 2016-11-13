<?php
$nno = $_SESSION['user']['uid'];
//echo $nno.'sanaullah';
//exit;
$query_select = "SELECT * FROM `tbl_user` WHERE `pk_user_id`= $nno";
//echo $query_select;
//exit;
$query_res = mysql_query($query_select);
$query_row = mysql_fetch_assoc($query_res);
//print_r($query_res);
//exit;
?>
<script type="text/javascript">
function passwordmathch()
	{
		var a = document.getElementById('con_password').value;
		var b = document.getElementById('password').value;
		if( a == b)
			{
				
				return true;
			}
		else
			{
				alert("Password Deos not Match");
				return false;
			}
	
	}
</script>
<?php
include("left.php");
?>

<div id="items">
    <div id="items-in">
    
    
 <ul class="followul">   
    
<?php
$row = mysql_fetch_array(mysql_query('select * from tbl_user where pk_user_id = "'.$_GET['s'].'"'));
$styles = explode(",",$row['followstyle']);
//echo "<pre>"; print_r($styles); echo "</pre>";
foreach($styles as $style)
				{
					$qry	=	"select * from tbl_user where pk_user_id !='".$_REQUEST['s']."'";
					//echo $qry ."<br />"; echo $style."<br />";
					$res_follow	=	mysql_query($qry);
					while($user	=	mysql_fetch_array($res_follow)){
						$follow	=	$user['followstyle'];
						$follow	=	explode(",",$follow);
						//echo "<pre>"; rint_r($follow);echo "</pre>";
						
						if(in_array($style,$follow)){
							//echo "ok <br />User:".$user['full_name']."is following this style <br />";
							
							
							
							$follower = $_REQUEST['s'];
							$followee = $user['pk_user_id'];
							$dt = date('y-m-d h:m:s');	
							$nno = "INSERT INTO `tbl_follow` (
							`fk_follower_id` ,
							`fk_followee_id`
							)
							VALUES (
							'$follower', '$followee'
							);";
							//echo $nno; exit;
							$delll = mysql_query($nno);
							
							
							
							
							
							?>
							
							<li style="padding: 7px 7px 7px 95px; margin-top: 10px;">
                                                <img class="user_image" width="78" height="78" title="Oana Emerich" src="<?php echo $ru;?>media/user_files/profile_pictures/<?php echo $user['pk_user_id']; ?>/thumbs/<?php echo $user['user_image']; ?>" alt="Oana Emerich" style="border: 1px solid #f5f5f5; top: 7px; left: 7px;">
                                                <div style="margin-top:-2px;">
                                                <div class="user_name" style="height: 14px; font-size: 15px;"> <?php echo $user['full_name'];?> </div>
                                                <div class="user_location" style="height: 10px; margin-bottom: 1px;"> </div>
                                                </div>
                                                <div class="actions" style="top: 12px; right: 7px;">
                                                <form id="follow_user_1209989" class="follow_user" onclick="fashiolista.follower.follow(this, 1209989, 'first_style_completed'); return false;" action="/style/oanaemerich/unfollow/" method="post">
                                                <input class="image" type="image" src="http://u.fashiocdn.com/images/ico_heart_16.png">
                                                
                                                 <?php
													$follower = $_GET['s'];
													$followee = $user['pk_user_id'];
													 $tyu = "select * from tbl_follow where fk_followee_id = $followee and fk_follower_id = $follower";
													 $nbv = mysql_query($tyu);
													 $rty = mysql_num_rows($nbv);
													 if($rty > 0)
														 { ?>
															 
                                                             <span class="label" style="cursor:pointer;" onclick="window.location='<?php echo $ru ?>process/process_follow.php?act=unfollow&flage=yes&user_id=<?php echo $user['pk_user_id'] ?>'">unfollow</span>
															
													<?php }
													else
														{
															?>
															
                                                             <span class="label" style="cursor:pointer;" onclick="window.location='<?php echo $ru ?>process/process_follow.php?act=follow&flage=yes&user_id=<?php echo $user['pk_user_id'] ?>'">follow</span>
														
														<?php
														}
													
													?>
                                                
                                                <input type="hidden" name="next" value="/first_style_completed/">
                                                </form>
                                                </div>
                                                <div class="recent_items">
                                                <?php
												$query = 'select * from  tbl_product where fk_user_id = "'.$user['pk_user_id'].'" LIMIT 5';
												//echo $query; exit;
												$sgquery = mysql_query($query);
												while($row_prd = mysql_fetch_array($sgquery))
												{//echo '1';
												?>
                                                <img width="50" height="50" title="latest loves by Oana Emerich" alt="latest loves by Oana Emerich" src="<?php echo $ru;?>media/product_images/<?php echo $row_prd['pk_product_id']; ?>/thumbs/<?php echo $row_prd['prd_main_image']; ?>">
										  <?php } //echo 'ended';?>
                                                
                                                </div>
                               </li>
							<?php
							}
						}
					/*while($row_inn = mysql_fetch_array(mysql_query('select * from tbl_user where pk_user_id != "'.$_GET['s'].'"')))
					{
						$styles_inn = explode(",",$row_inn['followstyle']);
						foreach($styles_inn as $style_inn)
							{
								if($style_inn== $style)
									  {
										  //echo $style_inn;exit;
										  ?>
                                              
                                                <li style="padding: 7px 7px 7px 95px; margin-top: 10px;">
                                                <img class="user_image" width="78" height="78" title="Oana Emerich" src="<?php echo $ru;?>media/user_files/profile_pictures/<?php echo $row_inn['pk_user_id']; ?>/thumbs/<?php echo $row_inn['user_image']; ?>" alt="Oana Emerich" style="border: 1px solid #f5f5f5; top: 7px; left: 7px;">
                                                <div style="margin-top:-2px;">
                                                <div class="user_name" style="height: 14px; font-size: 15px;"> <?php echo $row_inn['full_name'];?> </div>
                                                <div class="user_location" style="height: 10px; margin-bottom: 1px;"> </div>
                                                </div>
                                                <div class="actions" style="top: 12px; right: 7px;">
                                                <form id="follow_user_1209989" class="follow_user" onclick="fashiolista.follower.follow(this, 1209989, 'first_style_completed'); return false;" action="/style/oanaemerich/unfollow/" method="post">
                                                <input class="image" type="image" src="http://u.fashiocdn.com/images/ico_heart_16.png">
                                                <span class="label">unfollow</span>
                                                <input type="hidden" name="next" value="/first_style_completed/">
                                                </form>
                                                </div>
                                                <div class="recent_items">
                                                <?php
												$query = 'select * from  tbl_product where fk_user_id = "'.$row_inn['pk_user_id'].'" LIMIT 5';
												//echo $query; exit;
												//while($row_prd = mysql_fetch_array(mysql_query($query)))
												{
												?>
                                                <img width="50" height="50" title="latest loves by Oana Emerich" alt="latest loves by Oana Emerich" src="<?php echo $ru;?>media/product_images/<?php echo $row_prd['pk_product_id']; ?>/thumbs/<?php echo $row_prd['prd_main_image']; ?>">
										  <?php } ?>
                                                
                                                </div>
                                                </li>
										  <?php
									  }
							}
						
					}*/
					
					
				}
				exit;
?>    
    
</ul>






  
    
    
    </div>
</div>

<?php
include("right.php");
?>
<!-------------------------
User Forms
--------------------------->

            <!---------------
            Login form
            ----------------->
            