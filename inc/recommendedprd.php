
<?php
include("left.php");
?>

<div id="items">
    <div id="items-in">
    <h1>Recommended Products</h1>
    <?php
$qqq = "select * from tbl_product where important = 1";
$qrr = mysql_query($qqq);
$nnn = 1;
while($result = mysql_fetch_array($qrr))
{
	?>
    
    
    <?php
    if(!isset($_SESSION['user']['uid']))
			{
	?>
            <div class="item">
                  <a class="thumbnail" href="#thumb" data-reveal-id="login">
                  <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                  <span class="myspan">
                 Like it
                  </span>
                  </a>
              </div>
    
    <?php }
  else     
		  { ?>
			<div class="item thumbnail">
            
            <a class="thumbnail"  href="#">
            <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
            
            
           </a>
           
            <span class="myspan">
            <style>
            #listing<?php echo $nnn;?>{
				float:left;
				margin: 20px 0 0 110px;
				width:100px;
				display:none;}
            </style>
            <script type="text/javascript">
			function showDiv<?php echo $nnn;?>() {
				//alert('how r you');
				var n =  document.getElementById("listing<?php echo $nnn;?>").style.display = "block";
				}
			</script>
          
            <button onclick="showDiv<?php echo $nnn;?>()" style="float:right;">Add to List</button>
            <span id="listing<?php echo $nnn;?>">
            
            <?php
			$kkk = $_SESSION['user']['uid'];
            $tyt = "select * from tbl_user_list where fk_user_id = $kkk";
			$hgh = mysql_query($tyt);
			if(mysql_num_rows($hgh) > 0)
				{
					$nnno = 1;
					while($res = mysql_fetch_array($hgh))
					{ ?>
						
                        <script type="text/javascript">
						  function additemtolist<?php echo $nnno; echo $nnn;?>() {	
							  var list_prd_id_value	=	document.getElementById('<?php echo $res['pk_userlist_id'];?>_<?php echo $result['pk_product_id'];?>').value;
							  var userlist_id = '<?php echo $res['pk_userlist_id'];?>';
							  var product_id = '<?php echo $result['pk_product_id'];?>';
							  var fk_user_id = '<?php echo $_SESSION['user']['uid'];?>';
							  var functionname = '<?php echo $nnn;?>';
							  //alert(list_prd_id_value);
							  //alert(userlist_id);
							  //alert(product_id);
							  var strURL="inc/additemtolist.php?list_prd_id_value="+list_prd_id_value+"&userlist_id="+userlist_id+"&product_id="+product_id+"&fk_user_id="+fk_user_id+"&functionname="+functionname;
							  //alert(strURL);
								  var req = getXMLHTTP();
								  if (req) {
									  
									  req.onreadystatechange = function() {
										  if (req.readyState == 4) {
											  // only if "OK"
											  if (req.status == 200) {						
												  document.getElementById('userlists<?php echo $result['pk_product_id'];?>').innerHTML=req.responseText;						
											  } else {
												  alert("There was a problem while using XMLHTTP:\n" + req.statusText);
											  }
										  }				
									  }			
									  req.open("GET", strURL, true);
									  req.send(null);
								  }
								  
							  }
				</script>
                       
			  <?php 
					$nnno++;
				  }
				}
				?>
            
            
            
            
            
            
            
            
            <table id="userlists<?php echo $result['pk_product_id'];?>">
            <?php
			$kkk = $_SESSION['user']['uid'];
            $tyt = "select * from tbl_user_list where fk_user_id = $kkk";
			$hgh = mysql_query($tyt);
			if(mysql_num_rows($hgh) > 0)
				{
					$nnno = 1;
					while($res = mysql_fetch_array($hgh))
					{ ?>
						
                        
                        <tr>
                        <?php
						$pk_product_id = $result['pk_product_id'];
						$pk_userlist_id = $res['pk_userlist_id'];
                        $eew = "select * from tbl_user_list_products where fk_user_list_id = $pk_userlist_id and fk_product_id = $pk_product_id";
						//echo $eew;
						$wwe = mysql_query($eew);
						?>
                        <td>
                        <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $result['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> &nbsp;<?php echo $res['list_name'];?>
                        </td>
                        </tr>
			  <?php 
					$nnno++;
				  }
				}
			else
				{
					echo "<tr><td>No list found</td></tr>";
				}		?>
                <tr>
                <td>
                <script type="text/javascript">
				function addList<?php echo $nnn;?>() {	
					var list_name	=	document.getElementById('list_name<?php echo $nnn;?>').value;
					var user	=	document.getElementById('user<?php echo $nnn;?>').value;
					var product	=	document.getElementById('product<?php echo $result['pk_product_id'];?>').value;
					var strURL="inc/additemtolist.php?list_name="+list_name+"&user="+user+"&product="+product+"&add_list="+1;
					//alert(strURL);
						var req = getXMLHTTP();
						if (req) {
							
							req.onreadystatechange = function() {
								if (req.readyState == 4) {
									// only if "OK"
									if (req.status == 200) {						
										document.getElementById('userlists<?php echo $result['pk_product_id'];?>').innerHTML=req.responseText;						
									} else {
										alert("There was a problem while using XMLHTTP:\n" + req.statusText);
									}
								}				
							}			
							req.open("GET", strURL, true);
							req.send(null);
						}
						
					}
				</script>
                
                
                </td>
                </tr>
            </table>
            <form method="post" name="myForm">
                Add New<input type="text" name="list_name" style="width:75px;" id="list_name<?php echo $nnn;?>"/>
                <input type="hidden" name="user" value="<?php echo $_SESSION['user']['uid'];?>" id="user<?php echo $nnn;?>"/>
                <input type="hidden" name="product" value="<?php echo $result['pk_product_id'];?>" id="product<?php echo $result['pk_product_id'];?>"/>
                <a href="javascript:void(0)" class="btn btn-large btn-primary" onclick="addList<?php echo $nnn;?>()">Add</a>
                </form>
            </span>
           	
           <?php
		   $iop = $_SESSION['user']['uid'];
		   $uio = $result['pk_product_id'];
		   $uyt = "select * from tbl_wishlist where fk_user_id = $iop and fk_product_id = $uio";
		   $nhnop = mysql_query($uyt);
		   $num_rows = mysql_num_rows($nhnop);
		   //echo $num_rows;
			if ($num_rows > 0) 
				{
					
							   $nmn = $result['pk_product_id'];
							   $newqq = "select * from tbl_wishlist where fk_product_id = $nmn";
							   $nhn = mysql_query($newqq);
							   $num_rows = mysql_num_rows($nhn);
							   
								  if ($num_rows > 0) 
									  {
										  $uuy = mysql_fetch_array($nhn);
										  $user = $uuy['fk_user_id'];
										  $kjk = "select * from tbl_user where pk_user_id = $user";
										  $kpk = mysql_query($kjk);
										  $nnp = mysql_fetch_array($kpk);
										  ?>
										  <img src="<?php echo $ru ?>/media/user_files/profile_pictures/<?php echo $nnp['pk_user_id']; ?>/thumbs/<?php echo  $nnp['user_image']?>" height="20" width="20"/>
										  <?php echo $nnp['full_name']; ?> like this 
										  <?php
									  }
									  
									  
				  }
				  
			else { ?>
					<a href="<?php echo $ru?>process/process_wishlist.php?prd_id=<?php echo $result['pk_product_id']?>&act=wish&user_id=<?php echo $_SESSION['user']['uid']; ?>" >Like It</a>
				<?php 
				   $uio = $result['pk_product_id'];
				   $uyt = "select * from tbl_wishlist where  fk_product_id = $uio";
				   $nhnop = mysql_query($uyt);
				   $num_rows = mysql_num_rows($nhnop);
				   //echo $num_rows;
				if ($num_rows > 0) 
					  {
						
								   $nmn = $result['pk_product_id'];
								   $newqq = "select * from tbl_wishlist where fk_product_id = $nmn";
								   $nhn = mysql_query($newqq);
								   $num_rows = mysql_num_rows($nhn);
								   
									  if ($num_rows > 0) 
										  {
											  $uuy = mysql_fetch_array($nhn);
											  $user = $uuy['fk_user_id'];
											  $kjk = "select * from tbl_user where pk_user_id = $user";
											  $kpk = mysql_query($kjk);
											  $nnp = mysql_fetch_array($kpk);
											  ?><br />
											  <img src="<?php echo $ru ?>/media/user_files/profile_pictures/<?php echo $nnp['pk_user_id']; ?>/thumbs/<?php echo  $nnp['user_image']?>" height="20" width="20"/>
											  <?php echo $nnp['full_name']; ?> like this 
											  <?php
										  }
										  
										  
					  }
				}
	

			   ?>
            </span>
            
        </div>
	  <?php	}
	  $nnn++;
}
?>

      
    </div>
</div>

<?php
include("right.php");
?>
