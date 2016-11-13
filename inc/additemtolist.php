<!--//---------------------------------+
//  Developed by Roshan Bhattarai    |
//	http://roshanbh.com.np           |
//  Contact for custom scripts       |
//  or implementation help.          |
//  email-nepaliboy007@yahoo.com     |
//---------------------------------+-->
<?php
#### Roshan's Ajax dropdown code with php
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### fell free to visit my blog http://php-ajax-guru.blogspot.com
require('../config/config.php');
require('../connection/connection.php');
session_start();
?>

<?php
if(isset($_GET['add_list']))
	{
	  $user=$_GET['user'];
	  $list_name=$_GET['list_name'];
	  $product_id=$_GET['product'];
	  if($list_name != "")
	  {
		$query="insert into tbl_user_list(fk_user_id, list_name) values('$user', '$list_name')";
		$result=mysql_query($query);
	  }
	}
?>



<?php
if(isset($_GET['list_prd_id_value'])){ $list_prd_id_value=$_GET['list_prd_id_value'];}
if(isset($_GET['userlist_id'])){ $userlist_id=$_GET['userlist_id'];}
if(isset($_GET['product_id'])){ $product_id=$_GET['product_id'];}
if(isset($_GET['user'])){ $user=$_GET['user'];}
if(isset($_GET['functionname'])){ $functionname=$_GET['functionname'];}

//echo $list_prd_id_value;
//exit;
	  
if(isset($_GET['list_prd_id_value']) && $list_prd_id_value == 'on')
{
$query = "INSERT INTO tbl_user_list_products( fk_user_list_id, fk_product_id )
VALUES (
'$userlist_id', '$product_id')";

$result = mysql_query($query) or die(mysql_error());
//echo $query;
//exit;
}
else if(isset($_GET['list_prd_id_value']) && $list_prd_id_value == 'off')
{
	$query = "delete from tbl_user_list_products where fk_user_list_id = $userlist_id and fk_product_id = $product_id";
	//echo $query;
	//exit;
$result = mysql_query($query);
}
$user = $_SESSION['user']['uid'];
$tyt = "select * from tbl_user_list where fk_user_id = $user";
			$hgh = mysql_query($tyt);
			$num = 1;
			
					while($res = mysql_fetch_array($hgh))
					{ 
					$pk_userlist_id = $res['pk_userlist_id'];
					$ppp = "select * from tbl_user_list_products where fk_user_list_id = $pk_userlist_id and fk_product_id = $product_id";
						//echo $ppp;
						$qqq = mysql_query($ppp);
						//echo mysql_num_rows($wwe);
					?>
						<tr>
                        <td>
                        <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $product_id;?>" onclick="additemtolist<?php echo $num; echo $functionname; ?>()" <?php if(mysql_num_rows($qqq)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> />
                        </td>
                        <td align="left"><?php echo $res['list_name'];?></td>
                        </tr>
			  <?php 
			  $num++;
			  }

