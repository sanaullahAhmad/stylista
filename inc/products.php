<?php
include('search_bar.php');
?> 
<div id="products-items">
    <?php
    $sql_category   =   "select * from tbl_category where status = 1";
    $cat_data       =   mysql_query($sql_category);
    while($cat  = mysql_fetch_array($cat_data)) {
        ?>
    <a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4><?php echo $cat['category_name']?></h4></a>
    <a class="products-items-sep"><img src="images/sep-products.png" /></a>
    <?php
    }
    ?>   
</div>

<div id="main">
    <?php $nnn = 1;?>
	<?php
    $sql_prd = "select * from tbl_product where status = 1 and fk_cat_id = 1 limit 5";
    $prd_data = mysql_query($sql_prd);
    while ($product = mysql_fetch_array($prd_data)) {
        ?>
   <div style="float:left; width:185px;">
    <div id="product">
        <a href="#" data-reveal-id="<?php echo $product['pk_product_id'] ?>" data-animation="fade"><img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" /></a>
        <div id="prd_text">
            <h4><?php echo $product['product_name']?></h4>
            <h5>BY BAFX PRODUCTS</h5>
            <h5>$ <?php echo $product['price']?></h5>
        </div>
    </div>
    <div id="<?php echo $product['pk_product_id']?>" class="reveal-modal">
                    <div id="by">
                        <table width="600" >
                            <tr>
                                <td width="450"><h5><?php echo $product['product_name']?></h5> <h5>By <strong>Nick Tate</strong></h5></td>
                                <td><img src="images/photo.jpg" /></td>
                                <td><h6>Last Picked By:</h6><h5><strong>Tayna Coelho</strong></h5><img src="images/follow.png" /></td>
                            </tr>
                        </table>
                    </div>

                    <div id="product-popup">
                        <div id="image">
                            <img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" />
                        </div>

                        <div id="popup_text">
                            <table>
                                <tr>
                                    <td ><h4>$ <?php echo $product['price']?></h4></td>
                                </tr>
                                <tr>
                                    <td><br /><h5>Ending: <strong>6d Left</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Condition: <strong>New</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Brand: <strong>Apple</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Carrier: <strong>Not Applicable</strong></h5></td>
                                </tr>
                                <tr>
                                    <td align="left"><br /><img src="<?php echo $ru ?>images/fb_pop.png" alt="facebook"/> <img src="<?php echo $ru ?>images/tw_pop.png" alt="twitter" /> <img src="<?php echo $ru ?>images/pin.png" alt="pinterest"/></td>
                                </tr>
                                <tr>
                                    <td align="right"><br /><img src="<?php echo $ru ?>images/add.png" onclick="showDiv<?php echo $nnn;?>()" /></td>
                                    
                                </tr>
                            </table>
                            
                             <style>
                                  #listing<?php echo $nnn;?>{
                                      float:left;
                                      margin: -140px 0 0 246px;
                                      width:100px;
									  z-index:99999;
                                      display:none;
									  background:#999;
									  }
                                  </style>
                                  <script type="text/javascript">
                                  function showDiv<?php echo $nnn;?>() {
                                      //alert('how r you');
                                      var n =  document.getElementById("listing<?php echo $nnn;?>").style.display = "block";
                                      }
                                  </script>
                                
                                  
                                  <span id="listing<?php echo $nnn;?>">
                            <?php
                            if(!isset($_SESSION['user']['uid']))
                            {
                            ?>
                            Please Login first
                            <?php
                            }
							else
							{
                            ?>
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
                                                    var list_prd_id_value	=	document.getElementById('<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>').value;
                                                    var userlist_id = '<?php echo $res['pk_userlist_id'];?>';
                                                    var product_id = '<?php echo $product['pk_product_id'];?>';
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
                                                                        document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  <table id="userlists<?php echo $product['pk_product_id'];?>">
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
                                              $pk_product_id = $product['pk_product_id'];
                                              $pk_userlist_id = $res['pk_userlist_id'];
                                              $eew = "select * from tbl_user_list_products where fk_user_list_id = $pk_userlist_id and fk_product_id = $pk_product_id";
                                              //echo $eew;
                                              $wwe = mysql_query($eew);
                                              ?>
                                                <td>
                                                  <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> 
                                                </td>
                                                <td align="left">
                                                  <?php echo $res['list_name'];?>
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
                                          var product	=	document.getElementById('product<?php echo $product['pk_product_id'];?>').value;
                                          var strURL="inc/additemtolist.php?list_name="+list_name+"&user="+user+"&product="+product+"&add_list="+1;
                                          //alert(strURL);
                                              var req = getXMLHTTP();
                                              if (req) {
                                                  
                                                  req.onreadystatechange = function() {
                                                      if (req.readyState == 4) {
                                                          // only if "OK"
                                                          if (req.status == 200) {						
                                                              document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                      Add New<input type="text" name="list_name" style="width:75px;" id="list_name<?php echo $nnn;?>" required />
                                      <input type="hidden" name="user" value="<?php echo $_SESSION['user']['uid'];?>" id="user<?php echo $nnn;?>"/>
                                      <input type="hidden" name="product" value="<?php echo $product['pk_product_id'];?>" id="product<?php echo $product['pk_product_id'];?>"/>
                                      <a href="javascript:void(0)" class="btn btn-large btn-primary" onclick="addList<?php echo $nnn;?>()">Add</a>
                                      <?php
									  if(!isset($_SESSION['user']['uid']))
									  {
									  ?>
                                      Please Login first
                                      <?php
									  }
									 
									  ?>
                                      </form>
                                      <?php }?>
                                  </span>
                            
                            
                        </div>

                    </div>

                    <div id="pick-more">
                        <h3>More <br /> to <br /> Pick!</h3>	
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />

                    </div>

                    <div id="we-picked">
                        <h3>We <br /> picked <br /> it!</h3>	
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>


                    </div>

                    <div id="comments">
                        <h3>Comment</h3>	
                        <textarea name="comment" cols="" rows="" class="comment"></textarea>
                        <img src="<?php echo $ru ?>images/submit.png" />
                    </div>

                    <a class="close-reveal-modal">&#215;</a>
                </div>
   </div>
    <?php
	 $nnn++;
    }
    ?>
    
    
    <?php
    $sql_prd = "select * from tbl_product where status = 1 and fk_cat_id = 2 limit 5";
    $prd_data = mysql_query($sql_prd);
    while ($product = mysql_fetch_array($prd_data)) {
        ?>
   <div style="float:left; width:185px;">
    <div id="product">
        <a href="#" data-reveal-id="<?php echo $product['pk_product_id'] ?>" data-animation="fade"><img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" /></a>
        <div id="prd_text">
            <h4><?php echo $product['product_name']?></h4>
            <h5>BY BAFX PRODUCTS</h5>
            <h5>$ <?php echo $product['price']?></h5>
        </div>
    </div>
    <div id="<?php echo $product['pk_product_id']?>" class="reveal-modal">
                    <div id="by">
                        <table width="600" >
                            <tr>
                                <td width="450"><h5><?php echo $product['product_name']?></h5> <h5>By <strong>Nick Tate</strong></h5></td>
                                <td><img src="images/photo.jpg" /></td>
                                <td><h6>Last Picked By:</h6><h5><strong>Tayna Coelho</strong></h5><img src="images/follow.png" /></td>
                            </tr>
                        </table>
                    </div>

                    <div id="product-popup">
                        <div id="image">
                            <img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" />
                        </div>

                        <div id="popup_text">
                            <table>
                                <tr>
                                    <td ><h4>$ <?php echo $product['price']?></h4></td>
                                </tr>
                                <tr>
                                    <td><br /><h5>Ending: <strong>6d Left</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Condition: <strong>New</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Brand: <strong>Apple</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Carrier: <strong>Not Applicable</strong></h5></td>
                                </tr>
                                <tr>
                                    <td align="left"><br /><img src="<?php echo $ru ?>images/fb_pop.png" alt="facebook"/> <img src="<?php echo $ru ?>images/tw_pop.png" alt="twitter" /> <img src="<?php echo $ru ?>images/pin.png" alt="pinterest"/></td>
                                </tr>
                                <tr>
                                    <td align="right"><br /><img src="<?php echo $ru ?>images/add.png" onclick="showDiv<?php echo $nnn;?>()" /></td>
                                    
                                </tr>
                            </table>
                            
                             <style>
                                  #listing<?php echo $nnn;?>{
                                      float:left;
                                      margin: -140px 0 0 246px;
                                      width:100px;
									  z-index:99999;
                                      display:none;
									  background:#999;
									  }
                                  </style>
                                  <script type="text/javascript">
                                  function showDiv<?php echo $nnn;?>() {
                                      //alert('how r you');
                                      var n =  document.getElementById("listing<?php echo $nnn;?>").style.display = "block";
                                      }
                                  </script>
                                
                                  
                                  <span id="listing<?php echo $nnn;?>">
                            <?php
                            if(!isset($_SESSION['user']['uid']))
                            {
                            ?>
                            Please Login first
                            <?php
                            }
							else
							{
                            ?>
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
                                                    var list_prd_id_value	=	document.getElementById('<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>').value;
                                                    var userlist_id = '<?php echo $res['pk_userlist_id'];?>';
                                                    var product_id = '<?php echo $product['pk_product_id'];?>';
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
                                                                        document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  <table id="userlists<?php echo $product['pk_product_id'];?>">
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
                                              $pk_product_id = $product['pk_product_id'];
                                              $pk_userlist_id = $res['pk_userlist_id'];
                                              $eew = "select * from tbl_user_list_products where fk_user_list_id = $pk_userlist_id and fk_product_id = $pk_product_id";
                                              //echo $eew;
                                              $wwe = mysql_query($eew);
                                              ?>
                                                <td>
                                                  <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> 
                                                </td>
                                                <td align="left">
                                                  <?php echo $res['list_name'];?>
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
                                          var product	=	document.getElementById('product<?php echo $product['pk_product_id'];?>').value;
                                          var strURL="inc/additemtolist.php?list_name="+list_name+"&user="+user+"&product="+product+"&add_list="+1;
                                          //alert(strURL);
                                              var req = getXMLHTTP();
                                              if (req) {
                                                  
                                                  req.onreadystatechange = function() {
                                                      if (req.readyState == 4) {
                                                          // only if "OK"
                                                          if (req.status == 200) {						
                                                              document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                      Add New<input type="text" name="list_name" style="width:75px;" id="list_name<?php echo $nnn;?>" required />
                                      <input type="hidden" name="user" value="<?php echo $_SESSION['user']['uid'];?>" id="user<?php echo $nnn;?>"/>
                                      <input type="hidden" name="product" value="<?php echo $product['pk_product_id'];?>" id="product<?php echo $product['pk_product_id'];?>"/>
                                      <a href="javascript:void(0)" class="btn btn-large btn-primary" onclick="addList<?php echo $nnn;?>()">Add</a>
                                      <?php
									  if(!isset($_SESSION['user']['uid']))
									  {
									  ?>
                                      Please Login first
                                      <?php
									  }
									 
									  ?>
                                      </form>
                                      <?php }?>
                                  </span>
                            
                            
                        </div>

                    </div>

                    <div id="pick-more">
                        <h3>More <br /> to <br /> Pick!</h3>	
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />

                    </div>

                    <div id="we-picked">
                        <h3>We <br /> picked <br /> it!</h3>	
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>


                    </div>

                    <div id="comments">
                        <h3>Comment</h3>	
                        <textarea name="comment" cols="" rows="" class="comment"></textarea>
                        <img src="<?php echo $ru ?>images/submit.png" />
                    </div>

                    <a class="close-reveal-modal">&#215;</a>
                </div>
   </div>
    <?php
	 $nnn++;
    }
    ?>
    
    
    <?php
    $sql_prd = "select * from tbl_product where status = 1 and fk_cat_id = 3 limit 5";
    $prd_data = mysql_query($sql_prd);
    while ($product = mysql_fetch_array($prd_data)) {
        ?>
   <div style="float:left; width:185px;">
    <div id="product">
        <a href="#" data-reveal-id="<?php echo $product['pk_product_id'] ?>" data-animation="fade"><img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" /></a>
        <div id="prd_text">
            <h4><?php echo $product['product_name']?></h4>
            <h5>BY BAFX PRODUCTS</h5>
            <h5>$ <?php echo $product['price']?></h5>
        </div>
    </div>
    <div id="<?php echo $product['pk_product_id']?>" class="reveal-modal">
                    <div id="by">
                        <table width="600" >
                            <tr>
                                <td width="450"><h5><?php echo $product['product_name']?></h5> <h5>By <strong>Nick Tate</strong></h5></td>
                                <td><img src="images/photo.jpg" /></td>
                                <td><h6>Last Picked By:</h6><h5><strong>Tayna Coelho</strong></h5><img src="images/follow.png" /></td>
                            </tr>
                        </table>
                    </div>

                    <div id="product-popup">
                        <div id="image">
                            <img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" />
                        </div>

                        <div id="popup_text">
                            <table>
                                <tr>
                                    <td ><h4>$ <?php echo $product['price']?></h4></td>
                                </tr>
                                <tr>
                                    <td><br /><h5>Ending: <strong>6d Left</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Condition: <strong>New</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Brand: <strong>Apple</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Carrier: <strong>Not Applicable</strong></h5></td>
                                </tr>
                                <tr>
                                    <td align="left"><br /><img src="<?php echo $ru ?>images/fb_pop.png" alt="facebook"/> <img src="<?php echo $ru ?>images/tw_pop.png" alt="twitter" /> <img src="<?php echo $ru ?>images/pin.png" alt="pinterest"/></td>
                                </tr>
                                <tr>
                                    <td align="right"><br /><img src="<?php echo $ru ?>images/add.png" onclick="showDiv<?php echo $nnn;?>()" /></td>
                                    
                                </tr>
                            </table>
                            
                             <style>
                                  #listing<?php echo $nnn;?>{
                                      float:left;
                                      margin: -140px 0 0 246px;
                                      width:100px;
									  z-index:99999;
                                      display:none;
									  background:#999;
									  }
                                  </style>
                                  <script type="text/javascript">
                                  function showDiv<?php echo $nnn;?>() {
                                      //alert('how r you');
                                      var n =  document.getElementById("listing<?php echo $nnn;?>").style.display = "block";
                                      }
                                  </script>
                                
                                  
                                  <span id="listing<?php echo $nnn;?>">
                            <?php
                            if(!isset($_SESSION['user']['uid']))
                            {
                            ?>
                            Please Login first
                            <?php
                            }
							else
							{
                            ?>
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
                                                    var list_prd_id_value	=	document.getElementById('<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>').value;
                                                    var userlist_id = '<?php echo $res['pk_userlist_id'];?>';
                                                    var product_id = '<?php echo $product['pk_product_id'];?>';
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
                                                                        document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  <table id="userlists<?php echo $product['pk_product_id'];?>">
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
                                              $pk_product_id = $product['pk_product_id'];
                                              $pk_userlist_id = $res['pk_userlist_id'];
                                              $eew = "select * from tbl_user_list_products where fk_user_list_id = $pk_userlist_id and fk_product_id = $pk_product_id";
                                              //echo $eew;
                                              $wwe = mysql_query($eew);
                                              ?>
                                                <td>
                                                  <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> 
                                                </td>
                                                <td align="left">
                                                  <?php echo $res['list_name'];?>
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
                                          var product	=	document.getElementById('product<?php echo $product['pk_product_id'];?>').value;
                                          var strURL="inc/additemtolist.php?list_name="+list_name+"&user="+user+"&product="+product+"&add_list="+1;
                                          //alert(strURL);
                                              var req = getXMLHTTP();
                                              if (req) {
                                                  
                                                  req.onreadystatechange = function() {
                                                      if (req.readyState == 4) {
                                                          // only if "OK"
                                                          if (req.status == 200) {						
                                                              document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                      Add New<input type="text" name="list_name" style="width:75px;" id="list_name<?php echo $nnn;?>" required />
                                      <input type="hidden" name="user" value="<?php echo $_SESSION['user']['uid'];?>" id="user<?php echo $nnn;?>"/>
                                      <input type="hidden" name="product" value="<?php echo $product['pk_product_id'];?>" id="product<?php echo $product['pk_product_id'];?>"/>
                                      <a href="javascript:void(0)" class="btn btn-large btn-primary" onclick="addList<?php echo $nnn;?>()">Add</a>
                                      <?php
									  if(!isset($_SESSION['user']['uid']))
									  {
									  ?>
                                      Please Login first
                                      <?php
									  }
									 
									  ?>
                                      </form>
                                      <?php }?>
                                  </span>
                            
                            
                        </div>

                    </div>

                    <div id="pick-more">
                        <h3>More <br /> to <br /> Pick!</h3>	
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />

                    </div>

                    <div id="we-picked">
                        <h3>We <br /> picked <br /> it!</h3>	
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>


                    </div>

                    <div id="comments">
                        <h3>Comment</h3>	
                        <textarea name="comment" cols="" rows="" class="comment"></textarea>
                        <img src="<?php echo $ru ?>images/submit.png" />
                    </div>

                    <a class="close-reveal-modal">&#215;</a>
                </div>
   </div>
    <?php
	 $nnn++;
    }
    ?>
    
    <?php
    $sql_prd = "select * from tbl_product where status = 1 and fk_cat_id = 4 limit 5";
    $prd_data = mysql_query($sql_prd);
    while ($product = mysql_fetch_array($prd_data)) {
        ?>
   <div style="float:left; width:185px;">
    <div id="product">
        <a href="#" data-reveal-id="<?php echo $product['pk_product_id'] ?>" data-animation="fade"><img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" /></a>
        <div id="prd_text">
            <h4><?php echo $product['product_name']?></h4>
            <h5>BY BAFX PRODUCTS</h5>
            <h5>$ <?php echo $product['price']?></h5>
        </div>
    </div>
    <div id="<?php echo $product['pk_product_id']?>" class="reveal-modal">
                    <div id="by">
                        <table width="600" >
                            <tr>
                                <td width="450"><h5><?php echo $product['product_name']?></h5> <h5>By <strong>Nick Tate</strong></h5></td>
                                <td><img src="images/photo.jpg" /></td>
                                <td><h6>Last Picked By:</h6><h5><strong>Tayna Coelho</strong></h5><img src="images/follow.png" /></td>
                            </tr>
                        </table>
                    </div>

                    <div id="product-popup">
                        <div id="image">
                            <img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" />
                        </div>

                        <div id="popup_text">
                            <table>
                                <tr>
                                    <td ><h4>$ <?php echo $product['price']?></h4></td>
                                </tr>
                                <tr>
                                    <td><br /><h5>Ending: <strong>6d Left</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Condition: <strong>New</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Brand: <strong>Apple</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Carrier: <strong>Not Applicable</strong></h5></td>
                                </tr>
                                <tr>
                                    <td align="left"><br /><img src="<?php echo $ru ?>images/fb_pop.png" alt="facebook"/> <img src="<?php echo $ru ?>images/tw_pop.png" alt="twitter" /> <img src="<?php echo $ru ?>images/pin.png" alt="pinterest"/></td>
                                </tr>
                                <tr>
                                    <td align="right"><br /><img src="<?php echo $ru ?>images/add.png" onclick="showDiv<?php echo $nnn;?>()" /></td>
                                    
                                </tr>
                            </table>
                            
                             <style>
                                  #listing<?php echo $nnn;?>{
                                      float:left;
                                      margin: -140px 0 0 246px;
                                      width:100px;
									  z-index:99999;
                                      display:none;
									  background:#999;
									  }
                                  </style>
                                  <script type="text/javascript">
                                  function showDiv<?php echo $nnn;?>() {
                                      //alert('how r you');
                                      var n =  document.getElementById("listing<?php echo $nnn;?>").style.display = "block";
                                      }
                                  </script>
                                
                                  
                                  <span id="listing<?php echo $nnn;?>">
                            <?php
                            if(!isset($_SESSION['user']['uid']))
                            {
                            ?>
                            Please Login first
                            <?php
                            }
							else
							{
                            ?>
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
                                                    var list_prd_id_value	=	document.getElementById('<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>').value;
                                                    var userlist_id = '<?php echo $res['pk_userlist_id'];?>';
                                                    var product_id = '<?php echo $product['pk_product_id'];?>';
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
                                                                        document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  <table id="userlists<?php echo $product['pk_product_id'];?>">
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
                                              $pk_product_id = $product['pk_product_id'];
                                              $pk_userlist_id = $res['pk_userlist_id'];
                                              $eew = "select * from tbl_user_list_products where fk_user_list_id = $pk_userlist_id and fk_product_id = $pk_product_id";
                                              //echo $eew;
                                              $wwe = mysql_query($eew);
                                              ?>
                                                <td>
                                                  <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> 
                                                </td>
                                                <td align="left">
                                                  <?php echo $res['list_name'];?>
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
                                          var product	=	document.getElementById('product<?php echo $product['pk_product_id'];?>').value;
                                          var strURL="inc/additemtolist.php?list_name="+list_name+"&user="+user+"&product="+product+"&add_list="+1;
                                          //alert(strURL);
                                              var req = getXMLHTTP();
                                              if (req) {
                                                  
                                                  req.onreadystatechange = function() {
                                                      if (req.readyState == 4) {
                                                          // only if "OK"
                                                          if (req.status == 200) {						
                                                              document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                      Add New<input type="text" name="list_name" style="width:75px;" id="list_name<?php echo $nnn;?>" required />
                                      <input type="hidden" name="user" value="<?php echo $_SESSION['user']['uid'];?>" id="user<?php echo $nnn;?>"/>
                                      <input type="hidden" name="product" value="<?php echo $product['pk_product_id'];?>" id="product<?php echo $product['pk_product_id'];?>"/>
                                      <a href="javascript:void(0)" class="btn btn-large btn-primary" onclick="addList<?php echo $nnn;?>()">Add</a>
                                      <?php
									  if(!isset($_SESSION['user']['uid']))
									  {
									  ?>
                                      Please Login first
                                      <?php
									  }
									 
									  ?>
                                      </form>
                                      <?php }?>
                                  </span>
                            
                            
                        </div>

                    </div>

                    <div id="pick-more">
                        <h3>More <br /> to <br /> Pick!</h3>	
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />

                    </div>

                    <div id="we-picked">
                        <h3>We <br /> picked <br /> it!</h3>	
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>


                    </div>

                    <div id="comments">
                        <h3>Comment</h3>	
                        <textarea name="comment" cols="" rows="" class="comment"></textarea>
                        <img src="<?php echo $ru ?>images/submit.png" />
                    </div>

                    <a class="close-reveal-modal">&#215;</a>
                </div>
   </div>
    <?php
	 $nnn++;
    }
    ?>
    
    <?php
    $sql_prd = "select * from tbl_product where status = 1 and fk_cat_id = 5 limit 5";
    $prd_data = mysql_query($sql_prd);
    while ($product = mysql_fetch_array($prd_data)) {
        ?>
   <div style="float:left; width:185px;">
    <div id="product">
        <a href="#" data-reveal-id="<?php echo $product['pk_product_id'] ?>" data-animation="fade"><img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" /></a>
        <div id="prd_text">
            <h4><?php echo $product['product_name']?></h4>
            <h5>BY BAFX PRODUCTS</h5>
            <h5>$ <?php echo $product['price']?></h5>
        </div>
    </div>
    <div id="<?php echo $product['pk_product_id']?>" class="reveal-modal">
                    <div id="by">
                        <table width="600" >
                            <tr>
                                <td width="450"><h5><?php echo $product['product_name']?></h5> <h5>By <strong>Nick Tate</strong></h5></td>
                                <td><img src="images/photo.jpg" /></td>
                                <td><h6>Last Picked By:</h6><h5><strong>Tayna Coelho</strong></h5><img src="images/follow.png" /></td>
                            </tr>
                        </table>
                    </div>

                    <div id="product-popup">
                        <div id="image">
                            <img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" />
                        </div>

                        <div id="popup_text">
                            <table>
                                <tr>
                                    <td ><h4>$ <?php echo $product['price']?></h4></td>
                                </tr>
                                <tr>
                                    <td><br /><h5>Ending: <strong>6d Left</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Condition: <strong>New</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Brand: <strong>Apple</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Carrier: <strong>Not Applicable</strong></h5></td>
                                </tr>
                                <tr>
                                    <td align="left"><br /><img src="<?php echo $ru ?>images/fb_pop.png" alt="facebook"/> <img src="<?php echo $ru ?>images/tw_pop.png" alt="twitter" /> <img src="<?php echo $ru ?>images/pin.png" alt="pinterest"/></td>
                                </tr>
                                <tr>
                                    <td align="right"><br /><img src="<?php echo $ru ?>images/add.png" onclick="showDiv<?php echo $nnn;?>()" /></td>
                                    
                                </tr>
                            </table>
                            
                             <style>
                                  #listing<?php echo $nnn;?>{
                                      float:left;
                                      margin: -140px 0 0 246px;
                                      width:100px;
									  z-index:99999;
                                      display:none;
									  background:#999;
									  }
                                  </style>
                                  <script type="text/javascript">
                                  function showDiv<?php echo $nnn;?>() {
                                      //alert('how r you');
                                      var n =  document.getElementById("listing<?php echo $nnn;?>").style.display = "block";
                                      }
                                  </script>
                                
                                  
                                  <span id="listing<?php echo $nnn;?>">
                                  <?php
                            if(!isset($_SESSION['user']['uid']))
                            {
                            ?>
                            Please Login first
                            <?php
                            }
							else
							{
                            ?>
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
                                                    var list_prd_id_value	=	document.getElementById('<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>').value;
                                                    var userlist_id = '<?php echo $res['pk_userlist_id'];?>';
                                                    var product_id = '<?php echo $product['pk_product_id'];?>';
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
                                                                        document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  <table id="userlists<?php echo $product['pk_product_id'];?>">
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
                                              $pk_product_id = $product['pk_product_id'];
                                              $pk_userlist_id = $res['pk_userlist_id'];
                                              $eew = "select * from tbl_user_list_products where fk_user_list_id = $pk_userlist_id and fk_product_id = $pk_product_id";
                                              //echo $eew;
                                              $wwe = mysql_query($eew);
                                              ?>
                                                <td>
                                                  <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> 
                                                </td>
                                                <td align="left">
                                                  <?php echo $res['list_name'];?>
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
                                          var product	=	document.getElementById('product<?php echo $product['pk_product_id'];?>').value;
                                          var strURL="inc/additemtolist.php?list_name="+list_name+"&user="+user+"&product="+product+"&add_list="+1;
                                          //alert(strURL);
                                              var req = getXMLHTTP();
                                              if (req) {
                                                  
                                                  req.onreadystatechange = function() {
                                                      if (req.readyState == 4) {
                                                          // only if "OK"
                                                          if (req.status == 200) {						
                                                              document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                      Add New<input type="text" name="list_name" style="width:75px;" id="list_name<?php echo $nnn;?>" required />
                                      <input type="hidden" name="user" value="<?php echo $_SESSION['user']['uid'];?>" id="user<?php echo $nnn;?>"/>
                                      <input type="hidden" name="product" value="<?php echo $product['pk_product_id'];?>" id="product<?php echo $product['pk_product_id'];?>"/>
                                      <a href="javascript:void(0)" class="btn btn-large btn-primary" onclick="addList<?php echo $nnn;?>()">Add</a>
                                      <?php
									  if(!isset($_SESSION['user']['uid']))
									  {
									  ?>
                                      Please Login first
                                      <?php
									  }
									 
									  ?>
                                      </form>
                                      <?php }?>
                                  </span>
                            
                            
                        </div>

                    </div>

                    <div id="pick-more">
                        <h3>More <br /> to <br /> Pick!</h3>	
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />

                    </div>

                    <div id="we-picked">
                        <h3>We <br /> picked <br /> it!</h3>	
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>


                    </div>

                    <div id="comments">
                        <h3>Comment</h3>	
                        <textarea name="comment" cols="" rows="" class="comment"></textarea>
                        <img src="<?php echo $ru ?>images/submit.png" />
                    </div>

                    <a class="close-reveal-modal">&#215;</a>
                </div>
   </div>
    <?php
	 $nnn++;
    }
    ?>
    
    <?php
    $sql_prd = "select * from tbl_product where status = 1 and fk_cat_id = 6 limit 5";
    $prd_data = mysql_query($sql_prd);
    while ($product = mysql_fetch_array($prd_data)) {
        ?>
   <div style="float:left; width:185px;">
    <div id="product">
        <a href="#" data-reveal-id="<?php echo $product['pk_product_id'] ?>" data-animation="fade"><img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" /></a>
        <div id="prd_text">
            <h4><?php echo $product['product_name']?></h4>
            <h5>BY BAFX PRODUCTS</h5>
            <h5>$ <?php echo $product['price']?></h5>
        </div>
    </div>
    <div id="<?php echo $product['pk_product_id']?>" class="reveal-modal">
                    <div id="by">
                        <table width="600" >
                            <tr>
                                <td width="450"><h5><?php echo $product['product_name']?></h5> <h5>By <strong>Nick Tate</strong></h5></td>
                                <td><img src="images/photo.jpg" /></td>
                                <td><h6>Last Picked By:</h6><h5><strong>Tayna Coelho</strong></h5><img src="images/follow.png" /></td>
                            </tr>
                        </table>
                    </div>

                    <div id="product-popup">
                        <div id="image">
                            <img src="<?php echo $ru ?>media/product_images/<?php echo $product['pk_product_id']?>/thumbs/<?php echo $product['prd_main_image']?>" alt="<?php echo $product['product_name']?>" />
                        </div>

                        <div id="popup_text">
                            <table>
                                <tr>
                                    <td ><h4>$ <?php echo $product['price']?></h4></td>
                                </tr>
                                <tr>
                                    <td><br /><h5>Ending: <strong>6d Left</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Condition: <strong>New</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Brand: <strong>Apple</strong></h5></td>
                                </tr>
                                <tr>
                                    <td><h5>Carrier: <strong>Not Applicable</strong></h5></td>
                                </tr>
                                <tr>
                                    <td align="left"><br /><img src="<?php echo $ru ?>images/fb_pop.png" alt="facebook"/> <img src="<?php echo $ru ?>images/tw_pop.png" alt="twitter" /> <img src="<?php echo $ru ?>images/pin.png" alt="pinterest"/></td>
                                </tr>
                                <tr>
                                    <td align="right"><br /><img src="<?php echo $ru ?>images/add.png" onclick="showDiv<?php echo $nnn;?>()" /></td>
                                    
                                </tr>
                            </table>
                            
                             <style>
                                  #listing<?php echo $nnn;?>{
                                      float:left;
                                      margin: -140px 0 0 246px;
                                      width:100px;
									  z-index:99999;
                                      display:none;
									  background:#999;
									  }
                                  </style>
                                  <script type="text/javascript">
                                  function showDiv<?php echo $nnn;?>() {
                                      //alert('how r you');
                                      var n =  document.getElementById("listing<?php echo $nnn;?>").style.display = "block";
                                      }
                                  </script>
                                
                                  
                                  <span id="listing<?php echo $nnn;?>">
                                  <?php
                            if(!isset($_SESSION['user']['uid']))
                            {
                            ?>
                            Please Login first
                            <?php
                            }
							else
							{
                            ?>
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
                                                    var list_prd_id_value	=	document.getElementById('<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>').value;
                                                    var userlist_id = '<?php echo $res['pk_userlist_id'];?>';
                                                    var product_id = '<?php echo $product['pk_product_id'];?>';
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
                                                                        document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  <table id="userlists<?php echo $product['pk_product_id'];?>">
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
                                              $pk_product_id = $product['pk_product_id'];
                                              $pk_userlist_id = $res['pk_userlist_id'];
                                              $eew = "select * from tbl_user_list_products where fk_user_list_id = $pk_userlist_id and fk_product_id = $pk_product_id";
                                              //echo $eew;
                                              $wwe = mysql_query($eew);
                                              ?>
                                                <td>
                                                  <input type="checkbox" id="<?php echo $res['pk_userlist_id'];?>_<?php echo $product['pk_product_id'];?>" onclick="additemtolist<?php echo $nnno; echo $nnn;?>()" <?php if(mysql_num_rows($wwe)>0){ ?> checked="checked" value="off" <?php } else {?>  <?php } ?> /> 
                                                </td>
                                                <td align="left">
                                                  <?php echo $res['list_name'];?>
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
                                          var product	=	document.getElementById('product<?php echo $product['pk_product_id'];?>').value;
                                          var strURL="inc/additemtolist.php?list_name="+list_name+"&user="+user+"&product="+product+"&add_list="+1;
                                          //alert(strURL);
                                              var req = getXMLHTTP();
                                              if (req) {
                                                  
                                                  req.onreadystatechange = function() {
                                                      if (req.readyState == 4) {
                                                          // only if "OK"
                                                          if (req.status == 200) {						
                                                              document.getElementById('userlists<?php echo $product['pk_product_id'];?>').innerHTML=req.responseText;						
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
                                      Add New<input type="text" name="list_name" style="width:75px;" id="list_name<?php echo $nnn;?>" required />
                                      <input type="hidden" name="user" value="<?php echo $_SESSION['user']['uid'];?>" id="user<?php echo $nnn;?>"/>
                                      <input type="hidden" name="product" value="<?php echo $product['pk_product_id'];?>" id="product<?php echo $product['pk_product_id'];?>"/>
                                      <a href="javascript:void(0)" class="btn btn-large btn-primary" onclick="addList<?php echo $nnn;?>()">Add</a>
                                      <?php
									  if(!isset($_SESSION['user']['uid']))
									  {
									  ?>
                                      Please Login first
                                      <?php
									  }
									 
									  ?>
                                      </form>
                                      <?php }?>
                                  </span>
                            
                            
                        </div>

                    </div>

                    <div id="pick-more">
                        <h3>More <br /> to <br /> Pick!</h3>	
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />

                    </div>

                    <div id="we-picked">
                        <h3>We <br /> picked <br /> it!</h3>	
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>


                    </div>

                    <div id="comments">
                        <h3>Comment</h3>	
                        <textarea name="comment" cols="" rows="" class="comment"></textarea>
                        <img src="<?php echo $ru ?>images/submit.png" />
                    </div>

                    <a class="close-reveal-modal">&#215;</a>
                </div>
   </div>
    <?php
	 $nnn++;
    }
    ?>
</div>
