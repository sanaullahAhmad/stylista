<?php
require('gmail/http.php');
    require('gmail/oauth_client.php');
    $client = new oauth_client_class;
    $client->server = 'Google';
	$client->offline = true;
    $client->debug = false;
    $client->debug_http = true;
    $client->redirect_uri = 'http://neotjanster.com/stylista/auth_google/';
    $client->client_id = '455538776349.apps.googleusercontent.com'; $application_line = __LINE__;
    $client->client_secret = 'WURrh0wNEvCM0MVAugm_3HJI';
    if(strlen($client->client_id) == 0
    || strlen($client->client_secret) == 0)
        die('Please go to Google APIs console page '.
            'http://code.google.com/apis/console in the API access tab, '.
            'create a new client ID, and in the line '.$application_line.
            ' set the client_id to Client ID and client_secret with Client Secret. '.
            'The callback URL must be '.$client->redirect_uri.' but make sure '.
            'the domain is valid and can be resolved by a public DNS.');
    /* API permissions
     */
    $client->scope = 'https://www.googleapis.com/auth/userinfo.email '.
        'https://www.googleapis.com/auth/userinfo.profile';
    if(($success = $client->Initialize()))
    {
        if(($success = $client->Process()))
        {
            if(strlen($client->authorization_error))
            {
                $client->error = $client->authorization_error;
                $success = false;
            }
            elseif(strlen($client->access_token))
            {
                $success = $client->CallAPI(
                    'https://www.googleapis.com/oauth2/v1/userinfo',
                    'GET', array(), array('FailOnAccessError'=>true), $user);
            }
        }
        $success = $client->Finalize($success);
    }
    if($client->exit)
        exit;
    if($success)
    {
		$sql_select	=	"select *from tbl_user where shop_name='".mysql_real_escape_string($user->given_name)."' or user_email = '".$user->email."'";
		$result=mysql_query($sql_select);
		if(mysql_num_rows($result)<=0)
		{
			$sql_insert = "insert into tbl_user set
																`full_name`			=	'" . mysql_real_escape_string($user->name) . "',
																`nic_num`			=	'" . mysql_real_escape_string("") . "',
																`shop_name`			=	'" . mysql_real_escape_string($user->given_name) . "',
                                                                `location`      	=   '" . mysql_real_escape_string($user->locale) . "',
                                                                 `user_email`   	=   '" . mysql_real_escape_string($user->email) . "',
                                                                 `user_password`    =   '" . mysql_real_escape_string("") . "',
																 `user_type`    =   '" . 1 . "',
                                                                 `user_phone`      	=   '" . mysql_real_escape_string("") . "'";
		mysql_query($sql_insert);
		$insert_id = mysql_insert_id();
		$_SESSION['user']['uid']=$insert_id;
		$_SESSION['user']['shop'] = $user->given_name;
		$_SESSION['user']['user_type'] = '1';
	}
	else
	{
		$user_data=mysql_fetch_array($result);
		$insert_id=$user_data['pk_user_id'];
		$_SESSION['user']['uid']=$user_data['pk_user_id'];
		$_SESSION['user']['shop'] = $user_data['shop_name'];
		$_SESSION['user']['user_type'] = $user_data['user_type'];
	}
	//if (isset($_FILES['user_img']) && $_FILES['user_img']['name'] != "")
	/*{
        $image_path = mkdir("../media/user_files/profile_pictures/" . $insert_id . "/", 0755, true);
        $thumb_path = mkdir("../media/user_files/profile_pictures/" . $insert_id . "/thumbs/", 0755, true);
        $upload_path = "../media/user_files/profile_pictures/" . $insert_id . "/";
        $upload_path = $upload_path . basename($user->picture);
        if (move_uploaded_file( $user->picture, $upload_path)) {
            $pathToImages = '../media/user_files/profile_pictures/' . $insert_id . '/';
            $pathToThumbs = '../media/user_files/profile_pictures/' . $insert_id . '/thumbs/';
			createThumbs($pathToImages, $pathToThumbs, 150);
            $sql_upd = "update tbl_user set user_image = '" . mysql_real_escape_string( $user->picture) . "' where pk_user_id	=	$insert_id";
            mysql_query($sql_upd);
        }
    }*/
    //header('location:' . $ru.'followstyle/'.$insert_id);
    //exit;
}
?>
<script type="text/javascript">
window.location.href="<?php echo $ru.'user_profile/'.$insert_id;?>";
</script>
<?php
exit;
?>