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
function showId(id) {
	//alert(id);
	document.forms['add_product'].product_category.value= id;
	}
</script>
<?php
include("left.php");
?>

<div id="items">
    <div id="items-in">
        
        
        <div id="accordion">
        <?php
        $accquer = "select * from tbl_category";
		$accexec = mysql_query($accquer);
		while($aacarr = mysql_fetch_array($accexec))
		{
		?>
            <h3><?php echo $aacarr['category_name'];?></h3>
            <div class="cnt_cont ppp">
                <p>
                
                    <a href="javascript:void(0)" class="add_details sr" data-reveal-id="add_details" onclick="showId('<?php echo $aacarr['pk_cat_id']?>')">Add Product</a>
                    
                    <a href="#" class="add_details sr" data-reveal-id="add_details" onclick="showId('<?php echo $aacarr['pk_cat_id']?>')">Add Product</a>
                    <a href="#" class="add_details sr" data-reveal-id="add_details" onclick="showId('<?php echo $aacarr['pk_cat_id']?>')">Add Product</a>
                
                </p>
                
            </div>
            
		<?php
		}
		?>
           
        </div>
     </div>
</div>
<div id="add_details" class="reveal-modal">
                <h2 style="font-family:Century Gothic;">Enter Product Details</h2>
                <table>
                    <form name="add_product" action="<?php echo $ru ; ?>process/process_product.php" method="post" id="signup_form" class="well span5" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_user" />
                        <input type="hidden" name="product_category"  />
                        <tr>
                            <td>
                                <label>Product Name:</label>
                            </td>
                            <td>
                                <input type="text" name="product_name" required="required" rel="popover" data-content="What is you name?"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Price:</label>
                            </td>
                            <td>
                                <input type="text" name="price" required="required" data-mask="99999-9999999-9" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Available Till:</label>
                            </td>
                            <td>
                                <input type="text" name="available_till" required="required" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>Select Store:</label>
                            </td>
                            <td>
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
                            <td>
                                <label>Product Description:</label>
                            </td>
                            <td>
                                <textarea name="product_description" cols="30" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Image:</label>
                            </td>
                            <td>
                                <input type="file" name="produt_Image" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 1:</label>
                            </td>
                            <td>
                                <input type="file" name="product_thumbanil_1" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 2:</label>
                            </td>
                            <td>
                                <input type="file" name="product_thumbanil_2" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 3:</label>
                            </td>
                            <td>
                                <input type="file" name="product_thumbanil_3" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 4:</label>
                            </td>
                            <td>
                                <input type="file" name="product_thumbanil_4" />
                            </td>
                        </tr>
                       
                               <input type="hidden" value="<?php echo $_SESSION['user']['shop']?>" name="user_id" />
                        <tr>
                            <td>
                                <input type="submit" value="Submit" class="btn btn-primary" name="produt_submit" />
                            </td>
                            <td>
                                <input type="Reset" value="Cancel"  class="btn btn-danger"/>
                            </td>
                        </tr>
                        
                    </form>
                </table>
                <a class="close-reveal-modal">&#215;</a>
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
            