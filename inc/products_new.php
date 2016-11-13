
		<div id="products-bar">
        	<table align="center" height="65" width="1200">
            <tr>
            <td align="left";><h4>Styleista</h4><h5>Products</h5></td>
            <td><img src="images/browse.png" /></td>
            <td><input name="search" type="text" value="SEARCH" class="input" /></td>
            <td><a href="#">HOME</a></td>
            <td width="450"></td>
            <td><h6>HELLO, SAMUEL!</h6></td>
            <td><img src="images/cross.png" /></td>
            <td><img src="images/menu.png" /></td>
            </tr>
            </table>
        </div>        
        
        <div id="products-items">
	        <a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4>AUTOMOTIVE</h4></a>
	        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
			<a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4>BABY</h4></a> 
	        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
			<a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4>BEAUTY</h4></a>       
	        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
			<a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4>CAMERA & PHOTO</h4></a>       
	        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
			<a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4>CLOTHING</h4></a>   
	        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
			<a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4>COMPUTERS</h4></a>       
	        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
			<a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4>GROCERY & GOURMET</h4></a>       
        </div>
        
        <div id="main">
        <?php $nnn = 1;?>
        <div style="float:left; width:185px;">
        
                   <?php
				   if(isset($_SESSION['user']['uid']))
				   {
                   $querytype = "select * from tbl_user where pk_user_id = '".$_SESSION['user']['uid']."'";
				   $ntype = mysql_query($querytype);
				   $fetchtype = mysql_fetch_array($ntype);
				   if($fetchtype['user_type'] == 1)
				   {
				   
				   ?>
                   <div class="item9">
                      <a href="#" class="add_detailssr" data-reveal-id="add_prd_details" onclick="showId('1')">
                      <img src="<?php echo $ru ?>images/add_product.jpg" />
                      </a>
                    </div>
                    <div class="item9">
                     
                      <a href="#" class="add_detailssr" data-reveal-id="add_prd_details" onclick="showId('1')"><img src="<?php echo $ru ?>images/add_product.jpg" />
                      </a>
                    </div>
                    				  <?php
									   }
				   }
				   ?>

                    <div id="add_prd_details" class="reveal-modal">
                <h2 style="font-family:Century Gothic;">Enter the details to sign up</h2>
                <table>
                    <form name="add_product" action="<?php echo $ru ; ?>process/process_product.php" method="post" id="signup_form" class="well span5" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_user" />
                        
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
                                <label>Select Category:</label>
                            </td>
                            <td>
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
                                <input type="file" class="dropdown22" name="produt_Image" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 1:</label>
                            </td>
                            <td>
                                <input type="file" class="dropdown22" name="product_thumbanil_1" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 2:</label>
                            </td>
                            <td>
                                <input type="file" class="dropdown22" name="product_thumbanil_2" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 3:</label>
                            </td>
                            <td>
                                <input type="file" class="dropdown22" name="product_thumbanil_3" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 4:</label>
                            </td>
                            <td>
                                <input type="file" class="dropdown22" name="product_thumbanil_4" />
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
		 if(isset($_SESSION['user']['uid']))
				   {
					   $querytype = "select * from tbl_user where pk_user_id = '".$_SESSION['user']['uid']."'";
					   $ntype = mysql_query($querytype);
					   $fetchtype = mysql_fetch_array($ntype);
					  if($fetchtype['user_type'] == 1)
						 {
							$qqq = "select * from tbl_product where fk_cat_id = 1 limit 2";
						 }
					   else
						 {
							 $qqq = "select * from tbl_product where fk_cat_id = 1 limit 4";
						 }
				   }
				   else
				   {
					    $qqq = "select * from tbl_product where fk_cat_id = 1 limit 4";
				   }
        $qrr = mysql_query($qqq);
        while($result = mysql_fetch_array($qrr))
        {
               
			  if(!isset($_SESSION['user']['uid']))
				{
			  ?>
                    <div id="product34">
                      <a class="thumbnail" href="#thumb" data-reveal-id="login">
                      <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan myspanlike">
                    <img src="<?php echo $ru ?>images/heart.png" />
                      </span>
                      </a>

                    </div>
                    
			<?php 
			     }
			else  
			     {
				?>
                    <div  id="product34" class="item thumbnail">
                      <a class="thumbnail"  href="#">
                         <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      </a>
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan">
            <style>
            #listing<?php echo $nnn;?>{
				float:left; margin: 20px 0 0 176px;
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
                        <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $result['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> </td><td>&nbsp;<?php echo $res['list_name'];?>
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
                Add New<input type="text" name="list_name" style="width:75px;" id="list_name<?php echo $nnn;?>" required="true"  />
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
					<a href="<?php echo $ru?>process/process_wishlist.php?prd_id=<?php echo $result['pk_product_id']?>&act=wish&user_id=<?php echo $_SESSION['user']['uid']; ?>" ><img src="<?php echo $ru ?>images/heart.png" /></a>
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
            <?php 
				}
			$nnn++ ;
            }
        ?>
     </div>
     
        <div style="float:left; width:185px;">
        
                   <?php
				   if(isset($_SESSION['user']['uid']))
				   {
                   $querytype = "select * from tbl_user where pk_user_id = '".$_SESSION['user']['uid']."'";
				   $ntype = mysql_query($querytype);
				   $fetchtype = mysql_fetch_array($ntype);
				   if($fetchtype['user_type'] == 1)
				   {
				   
				   ?>
                   <div class="item9">
                      <a href="#" class="add_detailssr" data-reveal-id="add_prd_details" onclick="showId('2')">
                      <img src="<?php echo $ru ?>images/add_product.jpg" />
                      </a>
                    </div>
                    
                    				  <?php
									   }
				   }
				   ?>

                    <div id="add_prd_details" class="reveal-modal">
                <h2 style="font-family:Century Gothic;">Enter the details to sign up</h2>
                <table>
                    <form name="add_product" action="<?php echo $ru ; ?>process/process_product.php" method="post" id="signup_form" class="well span5" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_user" />
                        
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
                        <?php /*?><tr>
                            <td>
                                <label>Select Category:</label>
                            </td>
                            <td>
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
                        </tr><?php */?>
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
                                <input type="file" class="dropdown22" name="produt_Image" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 1:</label>
                            </td>
                            <td>
                                <input type="file" class="dropdown22" name="product_thumbanil_1" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 2:</label>
                            </td>
                            <td>
                                <input type="file" class="dropdown22" name="product_thumbanil_2" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 3:</label>
                            </td>
                            <td>
                                <input type="file" class="dropdown22" name="product_thumbanil_3" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Thumbnail 4:</label>
                            </td>
                            <td>
                                <input type="file" class="dropdown22" name="product_thumbanil_4" />
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
		 if(isset($_SESSION['user']['uid']))
				   {
					   $querytype = "select * from tbl_user where pk_user_id = '".$_SESSION['user']['uid']."'";
					   $ntype = mysql_query($querytype);
					   $fetchtype = mysql_fetch_array($ntype);
					  if($fetchtype['user_type'] == 1)
						 {
							$qqq = "select * from tbl_product where fk_cat_id = 2 limit 3";
						 }
					   else
						 {
							 $qqq = "select * from tbl_product where fk_cat_id = 2 limit 5";
						 }
				   }
				   else
				   {
					    $qqq = "select * from tbl_product where fk_cat_id = 2 limit 5";
				   }
        $qrr = mysql_query($qqq);
        while($result = mysql_fetch_array($qrr))
        {
               
			  if(!isset($_SESSION['user']['uid']))
				{
			  ?>
                    <div id="product34">
                      <a class="thumbnail" href="#thumb" data-reveal-id="login">
                      <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan myspanlike">
                    <img src="<?php echo $ru ?>images/heart.png" />
                      </span>
                      </a>

                    </div>
                    
			<?php 
			     }
			else  
			     {
				?>
                    <div  id="product34" class="item thumbnail">
                      <a class="thumbnail"  href="#">
                         <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      </a>
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan">
            <style>
            #listing<?php echo $nnn;?>{
				float:left; margin: 20px 0 0 176px;
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
                        <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $result['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> </td><td>&nbsp;<?php echo $res['list_name'];?>
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
                Add New<input type="text" name="list_name" style="width:75px;" id="list_name<?php echo $nnn;?>" required="true"/>
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
					<a href="<?php echo $ru?>process/process_wishlist.php?prd_id=<?php echo $result['pk_product_id']?>&act=wish&user_id=<?php echo $_SESSION['user']['uid']; ?>" ><img src="<?php echo $ru ?>images/heart.png" /></a>
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
            <?php 
				}
			$nnn++ ;
            }
        ?>
     </div>
        
        <div style="float:left; width:185px;">
        <?php
		
		$qqq = "select * from tbl_product where fk_cat_id = 3 limit 4";
				   
        $qrr = mysql_query($qqq);
        while($result = mysql_fetch_array($qrr))
        {
               
			  if(!isset($_SESSION['user']['uid']))
				{
			  ?>
                    <div id="product34">
                      <a class="thumbnail" href="#thumb" data-reveal-id="login">
                      <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan myspanlike">
                    <img src="<?php echo $ru ?>images/heart.png" />
                      </span>
                      </a>

                    </div>
                    
			<?php 
			     }
			else  
			     {
				?>
                    <div  id="product34" class="item thumbnail">
                      <a class="thumbnail"  href="#">
                         <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      </a>
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan">
            <style>
            #listing<?php echo $nnn;?>{
				float:left; margin: 20px 0 0 176px;
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
                        <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $result['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> </td><td>&nbsp;<?php echo $res['list_name'];?>
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
					<a href="<?php echo $ru?>process/process_wishlist.php?prd_id=<?php echo $result['pk_product_id']?>&act=wish&user_id=<?php echo $_SESSION['user']['uid']; ?>" ><img src="<?php echo $ru ?>images/heart.png" /></a>
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
            <?php 
				}
			$nnn++ ;
            }
        ?>
     </div>
        <div style="float:left; width:185px;">
        <?php
		
		$qqq = "select * from tbl_product where fk_cat_id = 4 limit 4";
				   
        $qrr = mysql_query($qqq);
        while($result = mysql_fetch_array($qrr))
        {
               
			  if(!isset($_SESSION['user']['uid']))
				{
			  ?>
                    <div id="product34">
                      <a class="thumbnail" href="#thumb" data-reveal-id="login">
                      <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BA<?php echo $result['product_name'];?></h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan myspanlike">
                     <img src="<?php echo $ru ?>images/heart.png" />
                      </span>
                      </a>

                    </div>
                    
			<?php 
			     }
			else  
			     {
				?>
                    <div  id="product34" class="item thumbnail">
                      <a class="thumbnail"  href="#">
                         <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      </a>
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan">
            <style>
            #listing<?php echo $nnn;?>{
				float:left; margin: 20px 0 0 176px;
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
                        <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $result['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> </td><td>&nbsp;<?php echo $res['list_name'];?>
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
					<a href="<?php echo $ru?>process/process_wishlist.php?prd_id=<?php echo $result['pk_product_id']?>&act=wish&user_id=<?php echo $_SESSION['user']['uid']; ?>" ><img src="<?php echo $ru ?>images/heart.png" /></a>
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
            <?php 
				}
			$nnn++ ;
            }
        ?>
     </div>
        <div style="float:left; width:185px;">
        <?php
		
		$qqq = "select * from tbl_product where fk_cat_id = 5 limit 4";
				   
        $qrr = mysql_query($qqq);
        while($result = mysql_fetch_array($qrr))
        {
               
			  if(!isset($_SESSION['user']['uid']))
				{
			  ?>
                    <div id="product34">
                      <a class="thumbnail" href="#thumb" data-reveal-id="login">
                      <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan myspanlike">
                    <img src="<?php echo $ru ?>images/heart.png" />
                      </span>
                      </a>

                    </div>
                    
			<?php 
			     }
			else  
			     {
				?>
                    <div  id="product34" class="item thumbnail">
                      <a class="thumbnail"  href="#">
                         <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      </a>
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan">
            <style>
            #listing<?php echo $nnn;?>{
				float:left; margin: 20px 0 0 176px;
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
                        <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $result['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> </td><td>&nbsp;<?php echo $res['list_name'];?>
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
					<a href="<?php echo $ru?>process/process_wishlist.php?prd_id=<?php echo $result['pk_product_id']?>&act=wish&user_id=<?php echo $_SESSION['user']['uid']; ?>" ><img src="<?php echo $ru ?>images/heart.png" /></a>
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
            <?php 
				}
			$nnn++ ;
            }
        ?>
     </div>
        <div style="float:left; width:185px;">
        <?php
		
		$qqq = "select * from tbl_product where fk_cat_id = 1 limit 4";
				   
        $qrr = mysql_query($qqq);
        while($result = mysql_fetch_array($qrr))
        {
               
			  if(!isset($_SESSION['user']['uid']))
				{
			  ?>
                    <div id="product34">
                      <a class="thumbnail" href="#thumb" data-reveal-id="login">
                      <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan myspanlike">
                    <img src="<?php echo $ru ?>images/heart.png" />
                      </span>
                      </a>

                    </div>
                    
			<?php 
			     }
			else  
			     {
				?>
                    <div  id="product34" class="item thumbnail">
                      <a class="thumbnail"  href="#">
                         <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      </a>
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan">
            <style>
            #listing<?php echo $nnn;?>{
				float:left; margin: 20px 0 0 176px;
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
                        <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $result['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> </td><td>&nbsp;<?php echo $res['list_name'];?>
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
					<a href="<?php echo $ru?>process/process_wishlist.php?prd_id=<?php echo $result['pk_product_id']?>&act=wish&user_id=<?php echo $_SESSION['user']['uid']; ?>" ><img src="<?php echo $ru ?>images/heart.png" /></a>
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
            <?php 
				}
			$nnn++ ;
            }
        ?>
     </div>
        <div style="float:left; width:185px;">
        <?php
		
		$qqq = "select * from tbl_product where fk_cat_id = 1 limit 4";
				   
        $qrr = mysql_query($qqq);
        while($result = mysql_fetch_array($qrr))
        {
               
			  if(!isset($_SESSION['user']['uid']))
				{
			  ?>
                    <div id="product34">
                      <a class="thumbnail" href="#thumb" data-reveal-id="login">
                      <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan myspanlike">
                    <img src="<?php echo $ru ?>images/heart.png" />
                      </span>
                      </a>

                    </div>
                    
			<?php 
			     }
			else  
			     {
				?>
                    <div  id="product34" class="item thumbnail">
                      <a class="thumbnail"  href="#">
                         <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                      </a>
                      <div id="text1">
                          <h4><?php echo $result['product_name'];?></h4>
                          <h5>BY BAFX PRODUCTS</h5>
                          <h5>$23.99</h5>
                      </div>
                      <span class="myspan">
            <style>
            #listing<?php echo $nnn;?>{
				float:left; margin: 20px 0 0 176px;
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
                        <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $result['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> </td><td>&nbsp;<?php echo $res['list_name'];?>
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
					<a href="<?php echo $ru?>process/process_wishlist.php?prd_id=<?php echo $result['pk_product_id']?>&act=wish&user_id=<?php echo $_SESSION['user']['uid']; ?>" ><img src="<?php echo $ru ?>images/heart.png" /></a>
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
            <?php 
				}
			$nnn++ ;
            }
        ?>
     </div>
         <!-- <div id="product34">
            	<img src="images/product-1.png" />
                <div id="text1">
                	<h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
            
          <div id="product34">
            	<img src="images/product-2.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
              </div>
          </div>
            
       	  <div id="product34">
            	<img src="images/product-3.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
            
       	  <div id="product34">
            	<img src="images/product-4.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
                       
       	  <div id="product34">
            	<img src="images/product-5.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

       	  <div id="product34">
            	<img src="images/product-6.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

          <div id="product34">
            	<img src="images/product-1.png" />
                <div id="text1">
                	<h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
            
          <div id="product34">
            	<img src="images/product-2.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
              </div>
          </div>
            
       	  <div id="product34">
            	<img src="images/product-3.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
            
       	  <div id="product34">
            	<img src="images/product-4.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
                       
       	  <div id="product34">
            	<img src="images/product-5.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

       	  <div id="product34">
            	<img src="images/product-6.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

          <div id="product34">
            	<img src="images/product-1.png" />
                <div id="text1">
                	<h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
            
          <div id="product34">
            	<img src="images/product-2.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
              </div>
          </div>
            
       	  <div id="product34">
            	<img src="images/product-3.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
            
       	  <div id="product34">
            	<img src="images/product-4.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
                       
       	  <div id="product34">
            	<img src="images/product-5.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

       	  <div id="product34">
            	<img src="images/product-6.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
          
          <div id="product34">
            	<img src="images/product-2.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
              </div>
          </div>
            
       	  <div id="product34">
            	<img src="images/product-3.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
            
       	  <div id="product34">
            	<img src="images/product-4.png" />
                <div id="text1">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
-->


            
      </div>