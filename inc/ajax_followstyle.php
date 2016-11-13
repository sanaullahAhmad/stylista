<?php
require('../config/config.php');
require('../connection/connection.php');
session_start();
if ( $_GET['action'] == 'follow' )
{ 
  if(isset($_GET['style_id'])){ $style_id=$_GET['style_id'];}
  if(isset($_GET['fk_user_id'])){ $fk_user_id=$_GET['fk_user_id'];}
  $query = "INSERT INTO tbl_style_follow( fk_style_id, fk_user_id )
  VALUES (
  '$style_id', '$fk_user_id')";
  $result = mysql_query($query) or die(mysql_error());
  //echo $query;
  //exit;
   //echo  "followAction=".$_GET['action'];
   $varrand = rand(5,1500);
  ?>
 
  <img src="<?php echo $ru;?>images/unfollow2.png" onclick="follow<?php echo $style_id;?>()" id="<?php echo $style_id;?>" /><input type="hidden" name="unfollow" id="followinput<?php echo $style_id;?>" />
 
<?php 
}
else
{ 
  if(isset($_GET['style_id'])){ $style_id=$_GET['style_id'];}
  if(isset($_GET['fk_user_id'])){ $fk_user_id=$_GET['fk_user_id'];}
  $query = "delete from tbl_style_follow where fk_style_id = '$style_id' and fk_user_id = '$fk_user_id'";
  $result = mysql_query($query) or die(mysql_error());
  //echo $query;
  //exit;
 //echo  "unfollowAction=".$_GET['action'];
  ?>
   <img src="<?php echo $ru;?>images/follow2.png" onclick="follow<?php echo $style_id;?>()" id="<?php echo $style_id;?>" /><input type="hidden" name="follow" id="followinput<?php echo $style_id;?>" />
  
<?php 
}
?>