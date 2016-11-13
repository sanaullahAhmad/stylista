<?php
include('search_bar.php');
?> 
<style>
#follow
{
	display:none;
}
</style>
<div id="products-items">
	        <a class="products-items-links" href="#"><h4>PEOPLE | FOLLOW</h4></a>
	        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
			<a class="products-items-links" href="#"><h4>POPULAR</h4></a> 
	        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
			<a class="products-items-links" href="#"><h4>ALL LOVES</h4></a>       
	        <a class="products-items-sep"><img src="images/sep-products.png" /></a>
			<a class="products-items-links" href="#"><h4>FRESH FINDS</h4></a>       
        </div>

<div id="main">
<div id="follow2">	
        	<div class="text">
            <h5>You are not following anyone!</h5>
            	<h4>Start following people with great style to get personalised recommendations here!</h4>
            </div>

<?php
$quer = "select * from tbl_style limit 8";
$quersql = mysql_query($quer);
while( $result = mysql_fetch_array($quersql))
{
?>
<div id="follow-box">
                <div id="follow-box-img">
            	<img src="<?php echo $ru;?>images/styles/<?php echo $result['style_image'];?>" class="shop-box-img"/>
                </div>
                <div id="follow-text">
                	<table align="center">
                      <tr>
                        <td align="center"><h4><?php echo $result['style_name'];?></h4></td>
                      </tr>
                      <tr>
                       <td>
                       <script>
                          function follow<?php echo $result['pk_style_id'];?>()
                          {
                              //alert('alpha');
                              var style_id = document.getElementById('<?php echo $result['pk_style_id'];?>').id;
							  var action = document.getElementById('followinput<?php echo $result['pk_style_id'];?>').name;
                              //alert(action);
                              var fk_user_id = '<?php echo $_SESSION['user']['uid'];?>';
							  var follow = 'follow';
                             // alert(fk_user_id);
                              var strURL="<?php echo $ru;?>inc/ajax_followstyle.php?style_id="+style_id+"&fk_user_id="+fk_user_id+"&action="+action;
                               //alert(strURL);
                                  var req = getXMLHTTP();
                                  if (req) {
                                      
                                          req.onreadystatechange = function() 
                                            {
                                                if (req.readyState == 4) 
                                                {
                                                    //alert(req.responseText);
                                                    if (req.status == 200) 
                                                    {						
                                                        document.getElementById('ajax_followstyle<?php echo $result['pk_style_id'];?>').innerHTML=req.responseText;						
                                                    } 
                                                    else 
                                                    {
                                                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                                                    }
                                                }				
                                            }			
                                          req.open("GET", strURL, true);
                                          req.send(null);
                                          }
                              }
                          </script>
                        <span id="ajax_followstyle<?php echo $result['pk_style_id'];?>" style="display:block;">
					<?php
					if(isset($_SESSION['user']['uid']))
					{
						$userid = $_SESSION['user']['uid'];
						$queryh = "select * from tbl_style_follow where fk_user_id = '$userid' and fk_style_id = '".$result['pk_style_id']."'";
						//echo $queryh;exit;
						$queryhsql = mysql_query($queryh);
						if(mysql_num_rows($queryhsql) >0)
						{
						  ?>
							  <img src="<?php echo $ru;?>images/unfollow2.png" onclick="follow<?php echo $result['pk_style_id'];?>()" id="<?php echo $result['pk_style_id'];?>" />
							  <input type="hidden" name="unfollow" id="followinput<?php echo $result['pk_style_id'];?>" />
						  <?php
						}
						else
						{
						  ?>
							 <img src="<?php echo $ru;?>images/follow2.png" onclick="follow<?php echo $result['pk_style_id'];?>()" id="<?php echo $result['pk_style_id'];?>" />
							  <input type="hidden" name="follow" id="followinput<?php echo $result['pk_style_id'];?>" />
						   <?php
						}
					}
					else
					{
					 ?>
                       <img src="<?php echo $ru;?>images/follow2.png" onclick="alert('Please Login first to follow')" />
                     <?php
					}
					 ?>
                        </span>
                        </td>
                      </tr>
                    </table>
                </div>
            </div>



<?php }?>
  </div>
</div>



            