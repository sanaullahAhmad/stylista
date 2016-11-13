<?php
$query_select="SELECT * FROM `tbl_dynamic_pages` WHERE `status` = '1' and `id`='1'";
$query_res = mysql_query($query_select);
$query_row = mysql_fetch_assoc($query_res);
$title = $query_row['page_title'];
$des = $query_row['page_description'];
?>
<?php include('left.php');?>

<div id="items">
    <div id="items-in">
<h1><?php echo $title;?></h1>
        <p>
       <?php echo stripslashes(urldecode($des));?>
        </p>

    </div>
</div>

<?php include('right.php');?>

            