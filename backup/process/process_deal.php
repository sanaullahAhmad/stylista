<?php

require('../connection/connection.php');

echo "<pre>";
print_r($_POST);
echo "</pre>";
foreach ($_POST as $k => $v) {
    $$k = $v;
}
if ($action == 'add_deal') {
    $date = date('Y-m-d H:i:s');



   echo $sql_insert = "insert into tbl_deals set
                    deal_name           =   '" . mysql_real_escape_string($deal_name) . "',
                    deal_description    =   '" . addslashes(urlencode($deal_desc)) . "',
                    date_added          =   '$date',
                    fk_user_id          =   $user_id";
    mysql_query($sql_insert);
   echo mysql_insert_id();
 ?>
<script type="text/javascript">
    window.location='../index.php';
</script>
<?php
}
?>
