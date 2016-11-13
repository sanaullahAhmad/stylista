<?php
error_reporting(0);
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
<h1>Add Shop</h1>
        <div id="items-in">
        
        <?php if(isset($_GET['s']))  {
			$query_select = "SELECT * FROM `tbl_store` WHERE `pk_store_id`= '".$_GET['s']."'";
			//echo $query_select;
			//exit;
			$query_res = mysql_query($query_select);
			$query_row = mysql_fetch_array($query_res);
			//print_r($query_row);
			//exit;
		 ?>
        <form action="<?php echo $ru ; ?>process/process_store.php" method="post" enctype="multipart/form-data">
       <table>
           <tr>
             <td class="first">
             Store Name:
             </td>
             <td class="second">
             <input type="text" name="store_name" value="<?php echo $query_row['store_name'];?>" />
             </td>
           </tr>
           <tr>
             <td class="first">
             Store Description:
             </td>
             <td class="second">
             <textarea name="store_description" cols="30" rows="3"><?php echo $query_row['store_description'];?></textarea>
             </td>
           </tr>
           <tr>
             <td class="first">
             Address:
             </td>
             <td class="second">
             <input type="text" name="store_Address" value="<?php echo $query_row['store_address'];?>" />
             </td>
           </tr>
           <tr>
             <td class="first">
             Store Image:
             </td>
             <td class="second">
             <input type="file" name="store_image" />
             </td>
           </tr>
           <tr>
            <td>&nbsp;</td>
            <td>
            <img src="<?php echo $ru ?>/media/store_image/<?php echo $query_row['pk_store_id']; ?>/thumbs/<?php echo  $query_row['store_image']?>"/>
            </td>
            </tr>
           <tr>
             <td class="first">
             Submit Form:
             </td>
             <td class="second">
             <input type="submit" name="store_update" />
             <input type="hidden" value="<?php echo $query_row['pk_store_id'];?>" name="store_id" />
             <input type="hidden" value="<?php echo date('y-m-d h:m:s'); ?>" name="date" />
             </td>
           </tr>
       </table>
       </form>
       
	<?php 
    }
    else
    {
    ?>

        <form action="<?php echo $ru ; ?>process/process_store.php" method="post" enctype="multipart/form-data">
       <table>
           <tr>
             <td class="first">
             Store Name:
             </td>
             <td class="second">
             <input type="text" name="store_name" />
             </td>
           </tr>
           
           <tr>
             <td class="first">
             Store Description:
             </td>
             <td class="second">
             <textarea name="store_description" cols="30" rows="3"></textarea>
             </td>
           </tr>
           <tr>
             <td class="first">
             Address:
             </td>
             <td class="second">
             <input type="text" name="store_Address" value="" />
             </td>
           </tr>
           <tr>
             <td class="first">
             Store Image:
             </td>
             <td class="second">
             <input type="file" name="store_image" />
             </td>
           </tr>
           <tr>
             <td class="first">
             Submit Form:
             </td>
             <td class="second">
             <input type="submit" name="store_submit" />
             <input type="hidden" value="<?php echo $_SESSION['user']['shop']?>" name="user_id" />
             <input type="hidden" value="<?php echo date('y-m-d h:m:s'); ?>" name="date" />
             </td>
           </tr>
       </table>
       </form>
       <?php } ?>
        
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
            