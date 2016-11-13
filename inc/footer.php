 

<?php
if(!isset($_GET['page']))
{
	?>
	<div id="deals">
    <div id="head">
        <img src="<?php echo $ru ?>images/deals-head.png" />
    </div>
    <img src="<?php echo $ru ?>images/hr.png" />
    
       <?php
$qqq = "select * from tbl_deals limit 5";
$qrr = mysql_query($qqq);
while($result = mysql_fetch_array($qrr))
{
	?>
    
    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>media/deals_image/<?php echo $result['pk_deal_id'];?>/thumbs/<?php echo $result['deal_image'];?>"width="90" height="95" style="height:95px;" /></td>
                <td><h4> <?php echo $result['deal_name'];?></h4>
                    <h5> For Reservations:<br /> 111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>
     <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>
    
    <?php
	
}
?>

   <?php /*?> <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>media/deals_image/<?php echo $result['pk_deal_id'];?>/thumbs/<?php echo $result['deal_image'];?>" /></td>
                <td><h4> Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>

    <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>

    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>images/deals_img.png" /></td>
                <td><h4>Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 
                        111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>

    <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>

    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>images/deals_img.png" /></td>
                <td><h4>Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 
                        111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>

    <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>

    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>images/deals_img.png" /></td>
                <td><h4>Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 
                        111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>

    <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>


    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>images/deals_img.png" /></td>
                <td><h4>Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 
                        111-123-456</h5>
                </td>
            </tr>
        </table>
    </div><?php */?>

</div>
    
	<?php
	require('followers.php');
}

if(isset($_GET['page']) && $_GET['page'] != 'products_new' && $_GET['page'] != 'add_store')
{
	?>
	<div id="deals">
    <div id="head">
        <img src="<?php echo $ru ?>images/deals-head.png" />
    </div>
    <img src="<?php echo $ru ?>images/hr.png" />
    
       <?php
$qqq = "select * from tbl_deals limit 5";
$qrr = mysql_query($qqq);
while($result = mysql_fetch_array($qrr))
{
	?>
    
    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>media/deals_image/<?php echo $result['pk_deal_id'];?>/thumbs/<?php echo $result['deal_image'];?>"width="90" height="95" style="height:95px;" /></td>
                <td><h4> <?php echo $result['deal_name'];?></h4>
                    <h5> For Reservations:<br /> 111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>
     <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>
    
    <?php
	
}
?>

   <?php /*?> <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>media/deals_image/<?php echo $result['pk_deal_id'];?>/thumbs/<?php echo $result['deal_image'];?>" /></td>
                <td><h4> Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>

    <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>

    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>images/deals_img.png" /></td>
                <td><h4>Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 
                        111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>

    <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>

    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>images/deals_img.png" /></td>
                <td><h4>Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 
                        111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>

    <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>

    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>images/deals_img.png" /></td>
                <td><h4>Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 
                        111-123-456</h5>
                </td>
            </tr>
        </table>
    </div>

    <div id="sep">
        <img src="<?php echo $ru ?>images/sep2.png" />
    </div>


    <div id="product">
        <table>
            <tr>
                <td><img src="<?php echo $ru ?>images/deals_img.png" /></td>
                <td><h4>Le Mosaque Elan</h4>
                    <h5> For Reservations:<br /> 
                        111-123-456</h5>
                </td>
            </tr>
        </table>
    </div><?php */?>

</div>
	<?php
	require('followers.php');
}

?>






 <div id="footer">
         <table width="1000" align="center">
         <tr>
         <td>
         <ul>
         <li><a href="<?php echo $ru;?>aboutus">About Us</a></li>
         <li><a href="<?php echo $ru;?>jobs">Jobs</a></li>
         <li><a href="<?php echo $ru;?>faq">FAQs</a></li>
         <li><a href="<?php echo $ru;?>manage_deals">Suggest a deal</a></li>
         <li><a href="<?php echo $ru;?>termsconditions">Terms & Conditions</a></li>
         </ul>
         </td>
         <td>
         <ul>
         <li><a href="<?php echo $ru;?>aboutus">About Us</a></li>
         <li><a href="<?php echo $ru;?>jobs">Jobs</a></li>
         <li><a href="<?php echo $ru;?>faq">FAQs</a></li>
         <li><a href="<?php echo $ru;?>manage_deals">Suggest a deal</a></li>
         <li><a href="<?php echo $ru;?>termsconditions">Terms & Conditions</a></li>
         </ul>
         </td>
         <td>
         <ul>
         <li><a href="<?php echo $ru;?>aboutus">About Us</a></li>
         <li><a href="<?php echo $ru;?>jobs">Jobs</a></li>
         <li><a href="<?php echo $ru;?>faq">FAQs</a></li>
         <li><a href="<?php echo $ru;?>manage_deals">Suggest a deal</a></li>
         <li><a href="<?php echo $ru;?>termsconditions">Terms & Conditions</a></li>
         </ul>
         </td>
         <td>
         <a href="#"><img src="<?php echo $ru ?>images/fb.png" /></a>
         <a href="#"><img src="<?php echo $ru ?>images/tw.png" /></a> <br /><br />
         Copyright 2013. All Rights Reserved
         </td>
         </tr>
     </table>
 </div>


</div>

<!--<div id="staticbuttons" style="position:absolute;">
<a href="javascript:" onmouseover="myspeed=-thespeed" onmouseout="myspeed=0"><img
src="images/arrows_up.gif" border="0"></a><br>
<a href="javascript:" onmouseover="myspeed=thespeed" onmouseout="myspeed=0"><img
src="images/arrows_dn.gif" border="0"></a>
</div>-->

<!--<script>

//Page Scroller (aka custom scrollbar)- By Dynamic Drive
//For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
//This credit MUST stay intact for use

var Hoffset=70 //Enter buttons' offset from right edge of window (adjust depending on images width)
var Voffset=80 //Enter buttons' offset from bottom edge of window (adjust depending on images height)
var thespeed=3 //Enter scroll speed in integer (Advised: 1-3)

var ieNOTopera=document.all&&navigator.userAgent.indexOf("Opera")==-1
var myspeed=0

var ieHoffset_extra=document.all? 15 : 0
var cross_obj=document.all? document.all.staticbuttons : document.getElementById? document.getElementById("staticbuttons") : document.staticbuttons

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function positionit(){
var dsocleft=document.all? iecompattest().scrollLeft : pageXOffset
var dsoctop=document.all? iecompattest().scrollTop : pageYOffset
var window_width=ieNOTopera? iecompattest().clientWidth+ieHoffset_extra : window.innerWidth+ieHoffset_extra
var window_height=ieNOTopera? iecompattest().clientHeight : window.innerHeight

if (document.all||document.getElementById){
cross_obj.style.left=parseInt(dsocleft)+parseInt(window_width)-Hoffset+"px"
cross_obj.style.top=dsoctop+parseInt(window_height)-Voffset+"px"
}
else if (document.layers){
cross_obj.left=dsocleft+window_width-Hoffset
cross_obj.top=dsoctop+window_height-Voffset
}
}

function scrollwindow(){
window.scrollBy(0,myspeed)
}

function initializeIT(){
positionit()
if (myspeed!=0){
scrollwindow()
}
}

if (document.all||document.getElementById||document.layers)
setInterval("initializeIT()",20)

</script>-->

</body>
</html>
