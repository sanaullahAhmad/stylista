<?php
$query_select="SELECT * FROM `tbl_dynamic_pages` WHERE `status` = '1' and `id`='3'";
$query_res = mysql_query($query_select);
$query_row = mysql_fetch_assoc($query_res);
$title = $query_row['page_title'];
$des = $query_row['page_description'];
?>
<div id="left">

    <div id="shops">
        <h4>Shops</h4>
        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/shops_img.png" /></td>
                    <td><h4> 1969 - Now In Islamabad </h4>
                        <h5> For Reservations:<br /> 111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/shops_img.png" /></td>
                    <td><h4> 1969 - Now In Islamabad </h4>
                        <h5> For Reservations:<br /> 111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/shops_img.png" /></td>
                    <td><h4> 1969 - Now In Islamabad </h4>
                        <h5> For Reservations:<br /> 111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/shops_img.png" /></td>
                    <td><h4> 1969 - Now In Islamabad </h4>
                        <h5> For Reservations:<br /> 111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/shops_img.png" /></td>
                    <td><h4> 1969 - Now In Islamabad </h4>
                        <h5> For Reservations:<br /> 111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

    </div>

    <div id="ad">
        <img src="<?php echo $ru ?>images/ad1.JPG" />
    </div>

</div>

<div id="items">
    <div id="items-in">
     <div style="float:left; width:195px;">
        <h3>Electronics</h3>
		<?php
        $qqq = "select * from tbl_product where fk_cat_id = 1";
        $qrr = mysql_query($qqq);
        $nnn = 1;
        while($result = mysql_fetch_array($qrr))
        {
            ?>
                    <div class="item">
                         <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                    </div>
            
        <?php 
        }
        ?>
     </div>
     <div style="float:left; width:195px;">
           <h3>Furniture</h3>
			<?php
            $qqq = "select * from tbl_product where fk_cat_id = 2";
            $qrr = mysql_query($qqq);
            $nnn = 1;
            while($result = mysql_fetch_array($qrr))
            {
                ?>
                         <div class="item">
                              <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                          </div>
                
            <?php 
            }
            ?>
      </div>
      
      
      
     <div style="float:left; width:195px;">
         <h3>Mobile</h3>
		  <?php
          $qqq = "select * from tbl_product where fk_cat_id = 3";
          $qrr = mysql_query($qqq);
          $nnn = 1;
          while($result = mysql_fetch_array($qrr))
          {
              ?>
                      <div class="item">
                           
                            <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                            
                       </div>
              
          <?php
          }
          ?>   
    </div>

     
     <div style="float:left; width:195px;">
         <h3>House Hold</h3>
		  <?php
          $qqq = "select * from tbl_product where fk_cat_id = 4";
          $qrr = mysql_query($qqq);
          $nnn = 1;
          while($result = mysql_fetch_array($qrr))
          {
              ?>      
                       <div class="item">
                            <img src="<?php echo $ru ?>media/product_images/<?php echo $result['pk_product_id'];?>/thumbs/<?php echo $result['prd_main_image'];?>" />
                        </div>
              
          <?php
          }
          ?>    
   </div>
   
  </div>
</div>

<div id="right">

    <div id="shops">
         <h4>Products</h4>
        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/products_img.png" /></td>
                    <td><h4>Intl. Watch Company</h4>
                        <h5> Call:<br />
                            111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/products_img.png" /></td>
                    <td><h4>Intl. Watch Company</h4>
                        <h5> Call:<br />
                            111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/products_img.png" /></td>
                    <td><h4>Intl. Watch Company</h4>
                        <h5> Call:<br />
                            111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/products_img.png" /></td>
                    <td><h4>Intl. Watch Company</h4>
                        <h5> Call:<br />
                            111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

        <img src="<?php echo $ru ?>images/hr2.png" />

        <div id="product">
            <table>
                <tr>
                    <td><img src="<?php echo $ru ?>images/products_img.png" /></td>
                    <td><h4>Intl. Watch Company</h4>
                        <h5> Call:<br />
                            111-123-456</h5>
                    </td>
                </tr>
            </table>
        </div>

    </div>


    <div id="ad">
        <img src="<?php echo $ru ?>images/ad2.JPG" />
    </div>

</div>
<!-------------------------
User Forms
--------------------------->

            <!---------------
            Login form
            ----------------->
            