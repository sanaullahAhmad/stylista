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
<h1>Manage Deals</h1>
        
        
        
       <div style="padding:0 20px;">
       <a href="<?php echo $ru ?>add_edit_deals">Add New Deal</a>
       <table class="table table-striped">
        <thead>
        <tr>
        
        <th width="94">Title</th>
        <th width="94">Image</th>
        <th width="506">Description</th>
        <th width="42">Status</th>
        <th width="104">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php 
		if(!isset($_SESSION['user']['uid']))
			{
				echo "<script type='text/javascript'>window.location='http://localhost/stylista/404'; </script>";
			}
			$query_select = "SELECT * FROM `tbl_deals`
		   WHERE `fk_user_id`= '".$_SESSION['user']['uid']."'";
			//echo $query_select;
			//exit;
			$query_res = mysql_query($query_select);
			while($query_row = mysql_fetch_assoc($query_res))
			{
			//print_r($query_res);
			//exit;
		?>
        <tr class="alt-row">
        <td><?php echo $query_row['deal_name'] ?> </td>
        <td>
        <img src="<?php echo $ru ?>media/deals_image/<?php echo $query_row['pk_deal_id'] ?>/thumbs/<?php echo $query_row['deal_image'] ?>">
        </td>
        <td>
        <a title="title" href="#"> </a>
        <p>
        <a title="title" href="#"> <?php echo $query_row['deal_description'] ?>... </a>
        </p>
        </td>
        <td> Active </td>
        <td>
        <a href="<?php echo $ru ?>add_edit_deals/<?php echo $query_row['pk_deal_id'] ?>">
        <i class="icon-pencil"></i>
        </a>
        <a href="<?php echo $ru?>process/process_deals.php?id=<?php echo $query_row['pk_deal_id']?>&act=del" onclick="return confirm('You want to remove this store?')"><i class="icon-remove"></i></a>        
        </td>
        </tr>
        <?php }?>
        
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
            