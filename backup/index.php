<?php
require('connection/connection.php');
include('image_functions.php');
?>
<!DOCT
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Stylista</title>
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
            <script type="text/javascript" src="js/jquery.reveal.js"></script>
            <link rel="stylesheet" href="css/reveal.css">
            <style type="text/css">
                body { font-family: "HelveticaNeue","Helvetica-Neue", "Helvetica", "Arial", sans-serif; }
                .big-link { display:block; margin-top: 100px; text-align: center; font-size: 70px; color: #06f; }
            </style>
            
            <link href="css/ui-lightness/jquery-ui-1.8.14.custom.css" rel="stylesheet" type="text/css" />
<link href="css/fileUploader.css" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.14.custom.min.js" type="text/javascript"></script>
<script src="js/jquery.fileUploader.js" type="text/javascript"></script>
            <link rel="stylesheet" href="css/bootstrap.css" />
            <script type="text/javascript" src="js/bootstrap.js"></script>
            <script type="text/javascript">
                function show_product_form(id){
                    //alert(id);
                    var style	=	document.getElementById(id).style.display;
				
                    if(style=='none') 
                    {
                        document.getElementById(id).style.display	=	"block";
                    }
                    else if(style	==	'block')
                    {
                        document.getElementById(id).style.display	=	"none";
                    }
                }
            </script>
            <script type="application/javascript">
            $('.fileupload').fileupload();
            </script>
            
        </head>
        <body>
            <div style="border: 1px solid black; float: left;">
                <div id=menu>
                    <ul class="nav nav-pills">
                        <li><a href="#" data-reveal-id="signup" data-animation="fade">Sign up</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="#" data-reveal-id="addproduct" data-animation="fade">Add Product</a></li>
                        <li><a href="add_deal.php">Add Deals</a></li>
                        <li><a href="#" data-reveal-id="addcat" data-animation="fade" >Add Category</a></li>
                        <li><a href="manage_product.php">Manage Product</a></li>
                    </ul>
                </div>
            </div>
            <!----------------
            Sign up Form
            ----------------->
            <div id="signup" class="reveal-modal">
                <h1>Enter the details to sign up</h1>
                <table class="table-striped">
                    <form name="user_signup" action="process/process_user.php" method="post" class="well span5">
                        <input type="hidden" name="action" value="add_user" />
                        <tr>
                            <td>
                                <label>Full Name:</label>
                            </td>
                            <td>
                                <input type="text" name="full_name" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nic. Number:</label>
                            </td>
                            <td>
                                <input type="text" name="nic_num" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Shop Name:</label>
                            </td>
                            <td>
                                <input type="text" name="shop_name" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Location:</label>
                            </td>
                            <td>
                                <input type="text" name="location" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User email:</label>
                            </td>
                            <td>
                                <input type="text" name="email" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password:</label>
                            </td>
                            <td>
                                <input type="password" name="user_password" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Confirm Password:</label>
                            </td>
                            <td>
                                <input type="password" name="c_pass" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Phone:</label>
                            </td>
                            <td>
                                <input type="text" name="user_phone" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="OK" class="btn btn-primary" />
                            </td>
                            <td>
                                <input type="Reset" name="X"  class="btn"/>
                            </td>
                        </tr>
                    </form>
                </table>
                <a class="close-reveal-modal">&#215;</a>
            </div>
            <!-------------
            Sign up form ends
            --------------->
            <!----------
            Add Product Form
            ------------>
            <div id="addproduct" class="reveal-modal">
                <h1>Select the category to add product</h1>
                <?php
                $sql_cat = "select * from tbl_category";
                $res = mysql_query($sql_cat);
                ?>

                <div>
                    <table class="table-condensed">
                        <tr>
                            <?php
                            $count = 0;
                            while ($cat = mysql_fetch_array($res)) {
                                $count = $count + 1;
                                ?>
                                <td><a href="javascript:void(0)" onClick="show_product_form(<?php echo $cat['pk_cat_id'] ?>)"><img src="media/category_images/<?php echo $cat['pk_cat_id'] ?>/thumbs/<?php echo $cat['cat_image'] ?>" alt="<?php echo $cat['category_name'] ?>"/></a><div style="display:none;" id="<?php echo $cat['pk_cat_id'] ?>">
                                        <form name="add_product" action="process/process_product.php" method="post" class="well span5" enctype="multipart/form-data">
                                            <input type="hidden" name="cat_id" value="<?php echo $cat['pk_cat_id'] ?>" />
                                            <input type="hidden" name="action" value="add_product" />

                                            <label>Name:</label><input type="text" name="prd_name" /><br />
                                            <label>Product Num</label><input type="text" name="prd_num" /><br />
                                            <label>Description</label><textarea name="prd_desc"></textarea><br />
                                            <input type="file" name="userfile" class="fileUpload" multiple>
		
		<button id="px-submit" type="submit">Upload</button>
		<button id="px-clear" type="reset">Clear</button>
                                           
                                            <input type="submit" value="OK" class="btn btn-primary" /><input type="reset" value="X"  class="btn btn-danger"/>

                                        </form>
                                        
	<script type="text/javascript">
		jQuery(function($){
			$('.fileUpload').fileUploader();
		});
	</script>
                                    </div>
                                </td>
                                <?php
                                if ($count % 3 == 0) {
                                    echo "</tr><tr>";
                                }
                                ?>
                                <?php
                            }
                            ?>
                        </tr>

                    </table>

                </div>

                <a class="close-reveal-modal">&#215;</a>
            </div>
            <!-----------
            Add Product form ends here
            ------------->
            <!------------------------
            Add Category Forms
            -------------------------->
            <div id="addcat" class="reveal-modal">
                <form class="well span3" enctype="multipart/form-data" action="process/process_category.php" method="post">
                    <input type="hidden" name="action" value="add_cat" />
                    <input type="text" name="name" placeholder="Category Name"/><br />
                    <textarea name="cat_desc" placeholder="Enter Description"></textarea><br />
                    <input type="file" class="btn-info"  name="cat_img"/>
                    <input type="submit" class="btn btn-primary" value="OK" /><input type="reset" class="btn btn-danger" value="X" />

                </form>


                <a class="close-reveal-modal">&#215;</a>
            </div>
        </body>
    </html>
