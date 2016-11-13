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
<h1>Add Product</h1>
        
        
        
        
        
        
        
        
        <div id="items-in">

        
        <?php if(isset($_GET['s']))  {
			$query_select = "SELECT * FROM `tbl_product` WHERE `pk_product_id`= '".$_GET['s']."'";
			//echo $query_select;
			//exit;
			$query_res = mysql_query($query_select);
			$query_row = mysql_fetch_array($query_res);
			//print_r($query_row);
			//exit;
		 ?>
        
       <form action="<?php echo $ru;?>process/process_product.php" method="post" enctype="multipart/form-data">
       <table>
           <tr>
             <td class="first">
             Product Name:
             </td>
             <td class="second">
             <input type="text" name="product_name" value="<?php echo $query_row['product_name'];?>" />
             </td>
           </tr>
           <tr>
             <td class="first">
             Price:
             </td>
             <td class="second">
             <input type="text" name="price" value="<?php echo $query_row['price'];?>" />
             </td>
           </tr>
           
           <tr>
             <td class="first">
             Available Till:
             </td>
             <td class="second">
             <input type="text" name="available_till" value="<?php echo $query_row['available_till'];?>" />
             </td>
           </tr>
           
           <tr>
           <td class="first">
             Select Category:
             </td>
             <td class="second">
                              <select name="product_category" id="dropdown">
                                        <option value="">Choose Product Category...</option>
                                        <?php $sqq = mysql_query("select * from tbl_category");
										while($nnp = mysql_fetch_array($sqq)){
                                         ?>
                                         <option value="<?php echo $nnp['pk_cat_id']; ?>">
										 <?php echo $nnp['category_name']; ?>
                                         </option>
                                         <?php } ?>
								</select>
             </td>
           </tr>
           <td class="first">
             Select Store:
             </td>
             <td class="second">
                              <select name="product_store" id="dropdown">
                                        <option value="">Choose Product Store...</option>
                                        <?php $sqq = mysql_query("select * from tbl_store");
										while($nnp = mysql_fetch_array($sqq)){
                                         ?>
                                         <option value="<?php echo $nnp['pk_store_id']; ?>">
										 <?php echo $nnp['store_name']; ?>
                                         </option>
                                         <?php } ?>
								</select>
             </td>
           </tr>
           
           <tr>
             <td class="first">
             Product Description:
             </td>
             <td class="second">
             <textarea name="product_description" cols="30" rows="3"><?php echo $query_row['product_desc'];?></textarea>
             </td>
           </tr>
           <tr>
             <td class="first">
             Product Image:
             </td>
             <td class="second">
             <input type="file" name="produt_Image" />
             </td>
             
             <td class="second">
             <img src="<?php echo $ru ?>/media/product_images/<?php echo $query_row['pk_product_id']; ?>/thumbs/<?php echo  $query_row['prd_main_image']?>" />
             </td>
             
           </tr>
           
           
           <tr>
             <td class="first">
             Product Thumbnail 1:
             </td>
             <td class="second">
             <input type="file" name="product_thumbanil_1" />
             </td>
             <td class="second">
             <img src="<?php echo $ru ?>/media/product_images/<?php echo $query_row['pk_product_id']; ?>/thumbs/<?php echo  $query_row['prd_thumb_1']?>" />
             </td>
           </tr>
             <tr>
             <td class="first">
             Product Thumbnail 2:
             </td>
             <td class="second">
             <input type="file" name="product_thumbanil_2" />
             </td>
             <td class="second">
             <img src="<?php echo $ru ?>/media/product_images/<?php echo $query_row['pk_product_id']; ?>/thumbs/<?php echo  $query_row['prd_thumb_2']?>" />
             </td>
           </tr>
             <tr>
             <td class="first">
             Product Thumbnail 3:
             </td>
             <td class="second">
             <input type="file" name="product_thumbanil_3" />
             </td>
             <td class="second">
             <img src="<?php echo $ru ?>/media/product_images/<?php echo $query_row['pk_product_id']; ?>/thumbs/<?php echo  $query_row['prd_thumb_3']?>" />
             </td>
           </tr>
             <tr>
             <td class="first">
             Product Thumbnail 4:
             </td>
             <td class="second">
             <input type="file" name="product_thumbanil_4" />
             </td>
             <td class="second">
             <img src="<?php echo $ru ?>/media/product_images/<?php echo $query_row['pk_product_id']; ?>/thumbs/<?php echo  $query_row['prd_thumb_4']?>" />
             </td>
           </tr>
           
           
           
           <tr>
             <td class="first">
             Submit Form:
             </td>
             <td class="second">
             <input type="submit" name="produt_updat" />
             <input type="hidden" value="<?php echo $query_row['pk_product_id']?>" name="product_id" />
             <input type="hidden" value="<?php echo $_SESSION['user']['shop']?>" name="user_id" />
             </td>
           </tr>
       </table>
       </form>
       
       <?php 
			}
			else
			{
		?>
    
      <form action="<?php echo $ru ; ?>process/process_product.php" method="post" enctype="multipart/form-data">
       <table>
           <tr>
             <td class="first">
             Product Name:
             </td>
             <td class="second">
             <input type="text" name="product_name" />
             </td>
           </tr>
           
           
           
           <tr>
             <td class="first">
             Price:
             </td>
             <td class="second">
             <input type="text" name="price" value="" />
             </td>
           </tr>
           
           <tr>
             <td class="first">
             Available Till:
             </td>
             <td class="second">
             <input type="text" name="available_till" value="" />
             </td>
           </tr>
           
           
           <td class="first">
             Select Category:
             </td>
             <td class="second">
                              <select name="product_category" id="dropdown">
                                        <option value="">Choose Product Category...</option>
                                        <?php $sqq = mysql_query("select * from tbl_category");
										while($nnp = mysql_fetch_array($sqq)){
                                         ?>
                                         <option value="<?php echo $nnp['pk_cat_id']; ?>">
										 <?php echo $nnp['category_name']; ?>
                                         </option>
                                         <?php } ?>
								</select>
             </td>
           </tr>
           
           <td class="first">
             Select Store:
             </td>
             <td class="second">
                              <select name="product_store" id="dropdown">
                                        <option value="">Choose Product Store...</option>
                                        <?php $sqq = mysql_query("select * from tbl_store");
										while($nnp = mysql_fetch_array($sqq)){
                                         ?>
                                         <option value="<?php echo $nnp['pk_store_id']; ?>">
										 <?php echo $nnp['store_name']; ?>
                                         </option>
                                         <?php } ?>
								</select>
             </td>
           </tr>
           
           <tr>
             <td class="first">
             Product Description:
             </td>
             <td class="second">
             <textarea name="product_description" cols="30" rows="3"></textarea>
             </td>
           </tr>
           <tr>
             <td class="first">
             Product Image:
             </td>
             <td class="second">
             <input type="file" name="produt_Image" />
             </td>
           </tr>
           
           
           <tr>
             <td class="first">
             Product Thumbnail 1:
             </td>
             <td class="second">
             <input type="file" name="product_thumbanil_1" />
             </td>
           </tr>
             <tr>
             <td class="first">
             Product Thumbnail 2:
             </td>
             <td class="second">
             <input type="file" name="product_thumbanil_2" />
             </td>
           </tr>
             <tr>
             <td class="first">
             Product Thumbnail 3:
             </td>
             <td class="second">
             <input type="file" name="product_thumbanil_3" />
             </td>
           </tr>
             <tr>
             <td class="first">
             Product Thumbnail 4:
             </td>
             <td class="second">
             <input type="file" name="product_thumbanil_4" />
             </td>
           </tr>
           
           
           
           <tr>
             <td class="first">
             Submit Form:
             </td>
             <td class="second">
             <input type="submit" name="produt_submit" />
             <input type="hidden" value="<?php echo $_SESSION['user']['shop']?>" name="user_id" />
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
            