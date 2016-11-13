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
<h1>Profile Update</h1>
        
        
        
        
        
        
        
        
        <div style="padding:0 20px;">
                
                <table>
                    <form name="user_signup" action="<?php echo $ru ?>process/process_user.php" method="post" id="signup_form" class="well span5" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="edit_user" />
                        <input type="hidden" name="user_id" value="<?php echo $query_row['pk_user_id'];?>" />
                        <tr>
                            <td>
                                <label>Full Name:</label>
                            </td>
                            <td>
                                <input type="text" name="full_name" required="required" value="<?php echo $query_row['full_name'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nic. Number:</label>
                            </td>
                            <td>
                                <input type="text" name="nic_num" required="required" data-mask="99999-9999999-9" value="<?php echo $query_row['nic_num'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Shop Name:</label>
                            </td>
                            <td>
                                <input type="text" name="shop_name" required="required" value="<?php echo $query_row['shop_name'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Location:</label>
                            </td>
                            <td>
                                <input type="text" name="location" required="required" value="<?php echo $query_row['location'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User email:</label>
                            </td>
                            <td>
                                <input type="email" name="email" required="required" value="<?php echo $query_row['user_email'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password:</label>
                            </td>
                            <td>
                                <input type="password" name="user_password" required="reqiuired" value="<?php echo $query_row['user_password'];?>" id="password" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Confirm Password:</label>
                            </td>
                            <td>
                                <input type="password" name="c_pass" required="required" value="<?php echo $query_row['user_password'];?>" id="con_password" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Phone:</label>
                            </td>
                            <td>
                                <input type="text" name="user_phone" required="required" value="<?php echo $query_row['user_phone'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Picture:</label>
                            </td>
                            <td>
                                <input type="file" name="user_img"/>
                            </td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>
                        <img src="<?php echo $ru ?>/media/user_files/profile_pictures/<?php echo $query_row['pk_user_id']; ?>/thumbs/<?php echo  $query_row['user_image']?>"/>
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Role:</label>
                            </td>
                            <td>
                                <select name="user_role">
                                <option value="1" <?php if($query_row['user_type'] == 1) {?> selected="selected" <?php }?>>Shopkeeper</option>
                                <option value="2" <?php if($query_row['user_type'] == 2) {?> selected="selected" <?php }?>>Buyer</option>
                                
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Submit" class="btn btn-primary" onclick="passwordmathch()" />
                            </td>
                            <td>
                                <input type="Reset" value="Cancel"  class="btn btn-danger"/>
                            </td>
                            </tr>
                         <tr>
                         <td>&nbsp;</td>
                        </tr>
                         <tr>
                            <td>
                               Following: 
                               <?php
							   $follower = $query_row['pk_user_id'];
                               $query_select = "SELECT * FROM tbl_follow where fk_follower_id = $follower ";
								//echo $query_select;
								//exit;
								$query_res = mysql_query($query_select);
								
							   ?>
                               <a href="<?php echo $ru ;?>find_user"><?php echo mysql_num_rows($query_res); ?>&nbsp;</a>
                            </td>
                            <td>
                                Followers:
                                <?php
							   $follower = $query_row['pk_user_id'];
                               $query_select = "SELECT * FROM tbl_follow where fk_followee_id = $follower ";
								//echo $query_select;
								//exit;
								$query_res = mysql_query($query_select);
								
							   ?>
                               <a href="<?php echo $ru ;?>find_user"><?php echo mysql_num_rows($query_res); ?>&nbsp;</a>
                            </td>
                        </tr>
                        
                        
                    </form>
                    
                </table>
               <div>
                   <h3><?php echo $query_row['full_name'];?> Likes
				<?php
				$nno = $_SESSION['user']['uid'];
                    $qqq = "select * from tbl_wishlist where fk_user_id = $nno";
                    $qrr = mysql_query($qqq);
					$count_likes = mysql_num_rows($qrr);
					echo "(".$count_likes.")</h3>";
                    
                    while($result = mysql_fetch_array($qrr))
                    {
						$nert = $result['fk_product_id'];
						$qqqr = "select * from tbl_product where pk_product_id = $nert";
						//echo $qqqr;
						$qrrr = mysql_query($qqqr);
						$resultr= mysql_fetch_array($qrrr)
                        ?>
                                <div class="item1">
                                     
                                      <img src="<?php echo $ru ?>media/product_images/<?php echo $resultr['pk_product_id'];?>/thumbs/<?php echo $resultr['prd_main_image'];?>" />
                                      
                                  </div>
                         
                        <?php 
                    }
                    ?>
                  
              </div>
              <div style="clear:both"></div>
                <h3>List Created by <?php echo $query_row['full_name'];?></h3>
                <table>
                        <?php
						$user = $_SESSION['user']['uid'];
                        $query_select = "SELECT * FROM tbl_user_list where fk_user_id = $user ";
						$sql = mysql_query($query_select);
						while($res = mysql_fetch_array($sql))
							{
								?>
								<tr style="border-bottom:1px solid;"><td style="border:1px solid;"><h4><?php echo $res['list_name'];?></h4></td>
                                <?php
                                $pk_userlist_id = $res['pk_userlist_id'];
								
                                $query_select33 = "SELECT * FROM tbl_user_list_products where fk_user_list_id = $pk_userlist_id ";
								$sql33 = mysql_query($query_select33);
								while($res33 = mysql_fetch_array($sql33))
									{
										$fk_product_id = $res33['fk_product_id'];
										$query_select44 = "SELECT * FROM tbl_product where pk_product_id = $fk_product_id ";
										$sql44 = mysql_query($query_select44);
										$res44 = mysql_fetch_array($sql44)
										?>
										&nbsp;<td><?php echo $res44['product_name'] ?>
                                        <img src="<?php echo $ru ?>media/product_images/<?php echo $res44['pk_product_id'];?>/thumbs/<?php echo $res44['prd_main_image'];?>" width="50" height="50"/>
                                        <td>&nbsp;
										<?php
									}
								?>
                                </tr>
								<?php
							}
						?>
                        </table>
              
            </div>
        
        
        
        
        
        
        
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
            