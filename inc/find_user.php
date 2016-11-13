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
<h1>Follow People</h1>
        
       
       <div style="padding:0 20px;">
       
       <table class="table table-striped">
        <thead>
        <tr>
        
        <th width="94">Title</th>
        <th width="94">Image</th>
        
        
        <th width="104">follow</th>
        </tr>
        </thead>
        <tbody>
        <tr class="alt-row">
        <?php 
		
		if(!isset($_SESSION['user']['uid']))
			{
				echo "<script type='text/javascript'>window.location='http://localhost/stylista/404'; </script>";
				//header("Location: http://localhost/stylista/404");
			}
		
			$query_select = "SELECT * FROM `tbl_user` ";
			//echo $query_select;
			//exit;
			$query_res = mysql_query($query_select);
			while($query_row = mysql_fetch_assoc($query_res))
			{
			//print_r($query_res);
			//exit;
		
		?>
        
        <td><?php echo $query_row['full_name'] ?> </td>
        <td>
        <img src="<?php echo $ru ?>media/user_files/profile_pictures/<?php echo $query_row['pk_user_id'] ?>/thumbs/<?php echo $query_row['user_image'] ?>">
        </td>
         <td>
        <?php
		$follower = $_SESSION['user']['uid'];
		$followee = $query_row['pk_user_id'];
		 $tyu = "select * from tbl_follow where fk_followee_id = $followee and fk_follower_id = $follower";
		 $nbv = mysql_query($tyu);
		 $rty = mysql_num_rows($nbv);
		 if($rty > 0)
			 { ?>
				 <a href="<?php echo $ru ?>process/process_follow.php?act=unfollow&user_id=<?php echo $query_row['pk_user_id'] ?>">
                 Unfollow
                 </a>
		<?php }
		else
			{
				?>
				<a href="<?php echo $ru ?>process/process_follow.php?act=follow&user_id=<?php echo $query_row['pk_user_id'] ?>">
                 follow
                 </a>
			
			<?php
            }
		
		?>
       
       </td>
        </tr>
        
        <?php } ?>
        
       
        </tbody>
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
            