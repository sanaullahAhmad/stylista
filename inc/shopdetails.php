<div id="products-bar">
        	<h4>Add Store</h4>
            
        </div>        
        
<div id="main">


<script type="text/javascript">
function showId(id) {
	//alert(id);
	document.forms['add_product'].product_category.value= id;
	}
</script>



        
        	<div id="addstore">
            <?php 
			$query_select = "SELECT * FROM `tbl_store` WHERE `pk_store_id`= '".$_GET['s']."'";
			//echo $query_select;
			//exit;
			$query_res = mysql_query($query_select);
			$query_row = mysql_fetch_array($query_res);
			//print_r($query_row);
			//exit;
		 ?>
        	<table align="left" cellpadding="10" style="margin-left:50PX; margin-top:50px;">
            <tr>
            <td rowspan="3" bgcolor="#e1e1e1" width="150" height="150">
            <img src="<?php echo $ru ?>/media/store_image/<?php echo $query_row['pk_store_id']; ?>/thumbs/<?php echo  $query_row['store_image']?>" />
            </td>
            <td class="text">STORE NAME:</td>
            <td align="left"><?php echo $query_row['store_name'];?></td>
            </tr>
            <tr>
            <td class="text">DESCRIPTION:</td>
            <td align="left"><?php echo substr( $query_row['store_description'], 0, 20)?></td>
            </tr>
            <tr>
            <td class="text">ADDRESS:</td>
            <td align="left"><?php echo $query_row['store_name'];?></td>
            </tr>
            </table>
            </div>
            
		
        <div style="clear: both;"></div>
        <!--<div id="accordion3">
          <h3 class="bar-lighth3">All</h3>
                    <div class="cnt_cont ppp">
                         <div id="details3">
                         <?php
                         $catpro = "select * from tbl_product where  fk_store_id = '".$_GET['s']."' ";
						 //echo $catpro; exit;
						 $catprosql = mysql_query($catpro);
						  while($catprofetch = mysql_fetch_array($catprosql))
						  {
						 ?>
                            <div id="add-details">
                           <img src="<?php echo $ru ?>/media/product_images/<?php echo $catprofetch['pk_product_id']; ?>/thumbs/<?php echo  $catprofetch['prd_main_image']?>" />
                            </div>
                            <?php } ?>
                            
                            
                        </div>     
                        
                    </div>
        </div>-->
        <div id="accordion2">
        <h3 class="bar-lighth3">All</h3>
                    <div class="cnt_cont ppp">
                         <div id="details3">
                         <?php
                         $catpro = "select * from tbl_product where  fk_store_id = '".$_GET['s']."' ";
						 //echo $catpro; exit;
						 $catprosql = mysql_query($catpro);
						  while($catprofetch = mysql_fetch_array($catprosql))
						  {
						 ?>
                            <div id="add-details">
                           <img src="<?php echo $ru ?>/media/product_images/<?php echo $catprofetch['pk_product_id']; ?>/thumbs/<?php echo  $catprofetch['prd_main_image']?>" />
                            </div>
                            <?php } ?>
                            
                            
                        </div>     
                        
                    </div>
         <?php
        $accquer = "select * from tbl_category";
		$accexec = mysql_query($accquer);
		$oopak = 1;
		while($aacarr = mysql_fetch_array($accexec))
		{
			$sana = $oopak % 2;
			//echo $sana;
			if($sana == 0)
			{
			
		?>
                <?php
                         $catpro = "select * from tbl_product where fk_cat_id = '".$aacarr['pk_cat_id']."' and fk_store_id = '".$_GET['s']."' ";
						 //echo $catpro; exit;
						 $catprosql = mysql_query($catpro);
						 $rows = mysql_num_rows($catprosql);
						 //echo $rows;exit;
						 if($rows > 0)
						 {
						 ?>
                           <h3 class="bar-lighth3"><?php echo $aacarr['category_name'];?></h3>
                           <div class="cnt_cont ppp">
                         <div id="details2">
                         <?php
                         $catpro = "select * from tbl_product where fk_cat_id = '".$aacarr['pk_cat_id']."' and fk_store_id = '".$_GET['s']."' ";
						 //echo $catpro; exit;
						 $catprosql = mysql_query($catpro);
						 $rows = mysql_num_rows($catprosql);
						  while($catprofetch = mysql_fetch_array($catprosql))
						  {
						 ?>
                            <div id="add-details">
                           <img src="<?php echo $ru ?>/media/product_images/<?php echo $catprofetch['pk_product_id']; ?>/thumbs/<?php echo  $catprofetch['prd_main_image']?>" />
                            </div>
                            <?php } ?>
                            
                            
                        </div>     
                        
                    </div>
                         <?php
						  }
						  ?>
                         
		   <?php
			}
			else
			{
			?>
                          <?php
						  $catpro = "select * from tbl_product where fk_cat_id = '".$aacarr['pk_cat_id']."' and fk_store_id = '".$_GET['s']."' ";
						 //echo $catpro; exit;
						 $catprosql = mysql_query($catpro);
						 $rows = mysql_num_rows($catprosql);
                          if($rows > 0)
						  {
						 ?>
                          <h3 class="barh3"><?php echo $aacarr['category_name'];?></h3>
                          <div class="cnt_cont ppp">
                         <div id="details2">
                         <?php
                         $catpro = "select * from tbl_product where fk_cat_id = '".$aacarr['pk_cat_id']."' and fk_store_id = '".$_GET['s']."' ";
						 //echo $catpro; exit;
						 $catprosql = mysql_query($catpro);
						  while($catprofetch = mysql_fetch_array($catprosql))
						  {
						 ?>
                            <div id="add-details">
                           <img src="<?php echo $ru ?>/media/product_images/<?php echo $catprofetch['pk_product_id']; ?>/thumbs/<?php echo  $catprofetch['prd_main_image']?>" />
                            </div>
                            <?php } ?>
                            
                            
                        </div>     
                        
                    </div>
                          <?php
						  }
						  ?>
		 <?php
			}
			$oopak++;
		}
		 ?>
               <!-- <h3 class="barh3">Unsteched Wearings</h3>
                    <div class="cnt_cont ppp">
                        <div id="details">
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            
                        </div>    
                        
                    </div>
                <h3 class="bar-lighth3">Accessories</h3>
                    <div class="cnt_cont ppp">
                       <div id="details">
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            
                        </div>    
                        
                    </div>
                <h3 class="barh3">Jewelry</h3>
                    <div class="cnt_cont ppp">
                        <div id="details">
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            
                        </div>    
                        
                    </div>
                <h3 class="bar-lighth3">Sentiments</h3>
                    <div class="cnt_cont ppp">
                       <div id="details">
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            <div id="add-details">
                            <img src="<?php echo $ru;?>images/add-details.png" />
                            </div>
                            
                        </div>    
                        
                    </div>-->
                   
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
                       <input type="hidden" name="product_store" value="<?php echo $_GET['s']?>" />
                        
                            
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