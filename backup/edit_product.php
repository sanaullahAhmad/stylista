<?php require('connection/connection.php');    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stylista</title>
    </head>
    <body>
        <?php
        $id         =   $_REQUEST['id'];
        $sql_prd    =   "select * from tbl_product where pk_product_id = $id";
        $res        =   mysql_query($sql_prd);
        $prd        =   mysql_fetch_array($res);
        ?>
        <form name="edit_product" action="process/process_product.php" method="post">
            <input type="hidden" name="pid" value="<?php echo $id?>" />
            <input type="hidden" name="action" value="update_prd" />
            <table>
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $prd['product_name']?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Product Number:
                    </td>
                    <td>
                        <input type="text" name="prd_num" value="<?php echo $prd['product_num']?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Description:
                    </td>
                    <td>
                        <textarea name="prd_desc"><?php echo urldecode($prd['product_desc'])?></textarea>
                    </td>
                </tr>
                <?php
                if($prd['fk_cat_id']!=0) {
                    ?>
                <tr>
                    <td>
                        Category:
                    </td>
                    <td>
                        <select name="cat_id">
                            <?php
                            
                                $sql_cat    =   "select * from tbl_category";
                                $cat_res    =   mysql_query($sql_cat);
                                while ($cat = mysql_fetch_array($cat_res)) {
                                    ?>
                            <option value="<?php echo $cat['pk_cat_id']?>" <?php if($cat['pk_cat_id']==$prd['fk_cat_id']){echo "selected=selected";}?>><?php echo $cat['category_name']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Update" /></td>
                    <td><input type="reset" value="X" /></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </body>
</html>
