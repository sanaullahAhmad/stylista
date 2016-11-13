<?php

require('../connection/connection.php');
echo "<pre>";
print_r($_POST);
echo "</pre>";

foreach ($_POST as $k => $v) {
    $$k = $v;
}

if ($action == 'add_user') {

    $sql_insert = "insert into tbl_user set
                            full_name       =   '" . mysql_real_escape_string($full_name) . "',
                            nic_num         =   '" . mysql_real_escape_string($nic_num) . "',
                            shop_name       =   '" . mysql_real_escape_string($shop_name) . "',
                            location        =   '" . mysql_real_escape_string($location) . "',
                            user_email      =   '" . mysql_real_escape_string($email) . "',
                            user_password   =   '" . mysql_real_escape_string($user_password) . "',
                            user_phone      =   '" . mysql_real_escape_string($user_phone) . "'    ";
    mysql_query($sql_insert);
    $insert_id  = mysql_insert_id();
    echo $insert_id;
}
?>
