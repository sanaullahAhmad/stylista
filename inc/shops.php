<?php
include('search_bar.php');
?>  


<div id="products-items">
    <?php
    $sql_category = "select * from tbl_category where status = 1";
    $cat_data = mysql_query($sql_category);
    while ($cat = mysql_fetch_array($cat_data)) {
        ?>
        <a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4><?php echo $cat['category_name'] ?></h4></a>
        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
        <?php
    }
    ?>   
</div>

<div id="main">
    <?php
    $sql_store = "select * from tbl_store where store_status = 1";
    $store_data = mysql_query($sql_store);
    $count = 1;
    while ($store = mysql_fetch_array($store_data)) {
        ?>
        <div id="<?php if ($count % 2 == 0) {
            echo "featured-deal";
        } else {
            echo "featured-deal-light";
        } ?>">
            <h3><?php echo $store['store_name'] ?></h3>
            <img src="<?php echo $ru ?>media/store_image/<?php echo $store['pk_store_id'] ?>/thumbs/<?php echo $store['store_image'] ?>" class="featured-img" alt="<?php echo $store['store_name'] ?>" />
            <div id="featured-text">
                <table align="center">
                    <tr>
                        <td><h4>FX Products (TM)</h4><h5>By BAFX Productions</h5></td>
                        <td><h6>$30</h6></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><img src="<?php echo $ru ?>images/more-light.png" class="more" /></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php
    
        $count  =   $count+1;
    }
    ?>
</div>
