<?php
require('connection/connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stylista</title>
    </head>
    <body>
        <?php
        echo $sql_cat = "select * from tbl_category";
        $res = mysql_query($sql_cat);
        ?>

        <div>
            <ul>
                <?php
                while ($cat = mysql_fetch_array($res)) {
                    ?>
                    <li><a href="javascript:void(0)" onClick="show_product_form(<?php echo $cat['pk_cat_id'] ?>)"><?php echo $cat['category_name'] ?></a>
                        <ul style="list-style:none;">
                            <li>
                                <div style="border:#006 1px solid; display:none;" id="<?php echo $cat['pk_cat_id'] ?>">
                                    <form name="add_product" action="process/process_product.php" method="post">
                                        <input type="hidden" name="cat_id" value="<?php echo $cat['pk_cat_id'] ?>" />
                                        <input type="hidden" name="action" value="add_product" />
                                        <fieldset>
                                            <legend>Product Details</legend>
                                            <label>Name:</label><input type="text" name="prd_name" /><br />
                                            <label>Product Num</label><input type="text" name="prd_num" /><br />
                                            <label>Description</label><textarea name="prd_desc"></textarea><br />
                                            <input type="submit" value="OK" /><input type="reset" value="X" />
                                        </fieldset>
                                    </form>
                                </div>
                            </li>
                        </ul> 
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

    </body>
</html>
