<?php require('connection/connection.php');    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stylista</title>
    </head>
    <body>
        <?php
        $sql_prd    =   "select * from tbl_product";
        $res        =   mysql_query($sql_prd);
        ?>
        <table border="1">
            <tr>
                <td>Name</td>
                <td>Action</td>
            </tr>
        
        <?php
        while($prd  = mysql_fetch_array($res)) {
        ?>
            <tr>
                <td><?php echo $prd['product_name']?></td>
                <td><a href="edit_product.php?id=<?php echo $prd['pk_product_id']?>">Edit</a>|<a href="#">Delete</a></td>
            </tr>
            <?php
        }
        ?>
        </table>
    </body>
</html>
