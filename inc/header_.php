<div id="nav-bar">
<?php
if(!isset($_SESSION['user'])) {
?>
    <a class="nav-bar-links" href="#">Subscribe</a>
    <a class="nav-bar-links" href="#" data-reveal-id="signup">Signup</a>
    <a class="nav-bar-links" href="#" data-reveal-id="login">Login</a>
    <?php
} else {
	?>
    <a class="nav-bar-links" href="<?php echo $ru ?>process/logout.php">Logout</a>
    <a class="nav-bar-links" href="#">Subscribe</a>
    
    
    <a class="nav-bar-links menuanchorclass" rel="anylinkmenu1" href="<?php echo $ru ?>user_profile"><?php echo $_SESSION['user']['shop']?></a>
    
    
	<?php
	}
?>
</div>

<div id="logo">
	<a href="<?php echo $ru?>"><img src="<?php echo $ru ?>images/logo.png" /></a>
</div>

<div id="links">
    <a href="<?php echo $ru ?>"><img src="<?php echo $ru ?>images/home.png" /></a>
    <a href="<?php echo $ru ?>aboutus"><img src="<?php echo $ru ?>images/about.png" /></a>
    <a href="<?php echo $ru ?>shops"><img src="<?php echo $ru ?>images/shops.png" /></a>
    <a href="<?php echo $ru ?>products_new"><img src="<?php echo $ru ?>images/products.png" /></a>
    <a href="<?php echo $ru ?>deals"><img src="<?php echo $ru ?>images/deals.png" /></a>
    <a href="<?php echo $ru ?>contact"><img src="<?php echo $ru ?>images/contact.png" /></a>
</div>
<?php
if(!isset($_GET['page']))
{
	?>
	<div id="slider">
<div id="slider-left">
<?php
$rnn = mysql_fetch_array(mysql_query("select * from tbl_image_slider"));
?>
<!--<img src="<?php echo $ru ?>images/left.png">-->
<img title="" alt="Latest Products" src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_thumb_1'] ?>">
<!--<img src="<?php echo $ru ?>images/left-2.png">-->
<img title="" alt="Latest Products" src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_thumb_2'] ?>">
</div>
<div id="slider-center">
<img title="" alt="Latest Products" src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_main_image'] ?>">
<!--<img src="<?php echo $ru ?>images/center.png">-->
</div>
<div id="slider-right">
<img title="" alt="Latest Products" src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_thumb_3'] ?>">
<!--<img src="<?php echo $ru ?>images/right.png">-->
<img title="" alt="Latest Products" src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_thumb_4'] ?>">
<!--<img src="<?php echo $ru ?>images/right-2.png">-->
</div>
</div>

    <div id="hr">
    <img src="<?php echo $ru ?>images/hr.png" />
</div>

    <div id="icons">
        <a href="<?php echo $ru ?>productcategory/1"><img src="<?php echo $ru ?>images/icon_1.png" title="" alt="Electronics Products" /></a>
        <a href="<?php echo $ru ?>productcategory/2"><img src="<?php echo $ru ?>images/icon_2.png" title="" alt="Furniture Products" /></a>
        <a href="<?php echo $ru ?>productcategory/3"><img src="<?php echo $ru ?>images/icon_3.png" title="" alt="Mobile Products" /></a>
        <a href="<?php echo $ru ?>productcategory/4"><img src="<?php echo $ru ?>images/icon_4.png" title="" alt="House Hold Products" /></a>
        <a href="<?php echo $ru ?>productcategory/5"><img src="<?php echo $ru ?>images/icon_5.png" /></a>
    </div>
    
    <div id="text">
        <p>Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar</p>
    </div>
    
    <div id="text2">
        <p>Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar</p>
    </div>
    
	<?php
	require('followers.php');
}

if(isset($_GET['page']) && $_GET['page'] != 'products_new')
{
	?>
	<div id="slider">
<div id="slider-left">
<?php
$rnn = mysql_fetch_array(mysql_query("select * from tbl_image_slider"));
?>
<!--<img src="<?php echo $ru ?>images/left.png">-->
<img title="" alt="Latest Products" src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_thumb_1'] ?>">
<!--<img src="<?php echo $ru ?>images/left-2.png">-->
<img src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_thumb_2'] ?>">
</div>
<div id="slider-center">
<img title="" alt="Latest Products" src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_main_image'] ?>">
<!--<img src="<?php echo $ru ?>images/center.png">-->
</div>
<div id="slider-right">
<img title="" alt="Latest Products" src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_thumb_3'] ?>">
<!--<img src="<?php echo $ru ?>images/right.png">-->
<img title="" alt="Latest Products" src="<?php echo $ru ?>media/slider_images/<?php echo $rnn['prd_thumb_4'] ?>">
<!--<img src="<?php echo $ru ?>images/right-2.png">-->
</div>
</div>

    <div id="hr">
    <img src="<?php echo $ru ?>images/hr.png" />
</div>

    <div id="icons">
        <a href="<?php echo $ru ?>productcategory/1"><img src="<?php echo $ru ?>images/icon_1.png" title="" alt="Electronics Products" /></a>
        <a href="<?php echo $ru ?>productcategory/2"><img src="<?php echo $ru ?>images/icon_2.png" title="" alt="Furniture Products" /></a>
        <a href="<?php echo $ru ?>productcategory/3"><img src="<?php echo $ru ?>images/icon_3.png" title="" alt="Mobile Products" /></a>
        <a href="<?php echo $ru ?>productcategory/4"><img src="<?php echo $ru ?>images/icon_4.png" title="" alt="House Hold Products" /></a>
        <a href="<?php echo $ru ?>productcategory/5"><img src="<?php echo $ru ?>images/icon_5.png" /></a>
    </div>
    
    <div id="text">
        <p>Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar</p>
    </div>
    
    <div id="text2">
        <p>Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar Saddar Bazaar</p>
    </div>
	<?php
	require('followers.php');
}
?>






<!-------------------------
User Forms
--------------------------->
<div id="signup" class="reveal-modal">
                <h2 style="font-family:Century Gothic;">Enter the details to sign up</h2>
                <table>
                    <form name="user_signup" action="process/process_user.php" method="post" id="signup_form" class="well span5" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_user" />
                        <!--Linked In Auth
                        <tr>
                            <td>
                            </td>
                            <td><script type="in/Login"></script>
                            </td>
                        </tr>
                        -->
                        <!--Google Auth
                        <tr>
                            <td>
                            </td>
                            <td><a href="<?php echo $ru;?>googleauth"><img src="<?php echo $ru;?>img/gmail.jpg" /></a>
                            </td>
                        </tr>
                        -->
                        <tr>
                            <td>
                                <label>Full Name:</label>
                            </td>
                            <td>
                                <input type="text" name="full_name" required="required" rel="popover" data-content="What is you name?"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nic. Number:</label>
                            </td>
                            <td>
                                <input type="text" name="nic_num" required="required" data-mask="99999-9999999-9" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Shop Name:</label>
                            </td>
                            <td>
                                <input type="text" name="shop_name" required="required" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Location:</label>
                            </td>
                            <td>
                                <input type="text" name="location" required="required" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User email:</label>
                            </td>
                            <td>
                                <input type="email" name="email" required="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password:</label>
                            </td>
                            <td>
                                <input type="password" name="user_password" required="reqiuired" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Confirm Password:</label>
                            </td>
                            <td>
                                <input type="password" name="c_pass" required="required" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Phone:</label>
                            </td>
                            <td>
                                <input type="text" name="user_phone" required="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Picture:</label>
                            </td>
                            <td>
                                <input type="file" name="user_img" required/>
                            </td>
                        </tr>
                        <tr>
                          <tr>
                            <td>
                                <label>Role:</label>
                            </td>
                            <td>
                                <select name="user_role">
                                <option value="2">Buyer</option>
                                <option value="1">Shopkeeper</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Submit" class="btn btn-primary" />
                            </td>
                            <td>
                                <input type="Reset" value="Cancel"  class="btn btn-danger"/>
                            </td>
                        </tr>
                        
                    </form>
                </table>
                <a class="close-reveal-modal">&#215;</a>
            </div>
<!---------------
Login form
----------------->
<div id="login" class="reveal-modal">
                <h2 style="font-family:Century Gothic;">Enter Username and Password</h2>
                <table>
                    <form name="user_signup" action="process/process_login.php" method="post" id="signup_form" class="well span5" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="login_user" />
                        
                        <tr>
                            <td>
                                <label>Shop Name:</label>
                            </td>
                            <td>
                                <input type="text" name="shop_name" required="required" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>Password:</label>
                            </td>
                            <td>
                                <input type="password" name="user_password" required="reqiuired" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <input type="submit" value="Submit" class="btn btn-primary" />
                            </td>
                            <td>
                                <input type="Reset" value="Cancel"  class="btn btn-danger"/>
                            </td>
                        </tr>
                        
                    </form>
                </table>
                <a class="close-reveal-modal">&#215;</a>
            </div>   
            
            <!--<div id="products" class="reveal-modal">


<div id="main">
        	<div id="product">
            	<img src="images/product-1.png" />
                <div id="text">
                	<h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
            
        	<div id="product">
            	<img src="images/product-2.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
              </div>
          </div>
            
       	  <div id="product">
            	<img src="images/product-3.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
            
       	  <div id="product">
            	<img src="images/product-4.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
                       
       	  <div id="product">
            	<img src="images/product-5.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

       	  <div id="product">
            	<img src="images/product-6.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

        	<div id="product">
            	<img src="images/product-1.png" />
                <div id="text">
                	<h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
            
        	<div id="product">
            	<img src="images/product-2.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
              </div>
          </div>
            
       	  <div id="product">
            	<img src="images/product-3.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
            
       	  <div id="product">
            	<img src="images/product-4.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
                       
       	  <div id="product">
            	<img src="images/product-5.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

       	  <div id="product">
            	<img src="images/product-6.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

        	<div id="product">
            	<img src="images/product-1.png" />
                <div id="text">
                	<h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
            
        	<div id="product">
            	<img src="images/product-2.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
              </div>
          </div>
            
       	  <div id="product">
            	<img src="images/product-3.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
            
       	  <div id="product">
            	<img src="images/product-4.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>
                       
       	  <div id="product">
            	<img src="images/product-5.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>

       	  <div id="product">
            	<img src="images/product-6.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
          
          <div id="product">
            	<img src="images/product-2.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
              </div>
          </div>
            
       	  <div id="product">
            	<img src="images/product-3.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
            </div>
          </div>
            
       	  <div id="product">
            	<img src="images/product-4.png" />
                <div id="text">
               	  <h4>FX PRODUCTS</h4>
                    <h5>BY BAFX PRODUCTS</h5>
                    <h5>$23.99</h5>
                </div>
            </div>



            
      </div>
                
            </div>-->