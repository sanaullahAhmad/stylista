<?php
$query_select="SELECT * FROM `tbl_dynamic_pages` WHERE `status` = '1' and `id`='4'";
$query_res = mysql_query($query_select);
$query_row = mysql_fetch_assoc($query_res);
$title = $query_row['page_title'];
$des = $query_row['page_description'];
?>
<?php
include("left.php");
?>

<div id="items">
    <div id="items-in">
<h1>Shop Keaper Page</h1>
        <p>
       <h2><a href="<?php echo $ru ?>manage_shops">Shops</a></h2>
       <h2><a href="<?php echo $ru ?>manage_deals">Deals</a></h2>
       <h2><a href="<?php echo $ru ?>manage_products">Products</a></h2>
        </p>
    </div>
</div>

<?php
include("right.php");
?>
<?php

if (isset($_SESSION['user']['user_type']) && $_SESSION['user']['user_type'] ==1)
{
?>
	<script>
    jQuery('a#shopkeeperlink').trigger('click');
    </script>
<?php
}
else
{
?>
	<script>
    jQuery('a#loginbutton').trigger('click');
    </script>
<?php
}
?>
         
            