<?php
include('search_bar.php');
?>  
<div id="products-items">
    <?php
    $sql_category   =   "select * from tbl_category where status = 1";
    $cat_data       =   mysql_query($sql_category);
    while($cat  = mysql_fetch_array($cat_data)) {
        ?>
    <a class="products-items-links" href="#"><h5>BESTSELLERS</h5><h4><?php echo $cat['category_name']?></h4></a>
    <a class="products-items-sep"><img src="images/sep-products.png" /></a>
    <?php
    }
    ?>   
</div>

<div id="main"><?php
        $sql_featured_deals = "select * from tbl_deals where featured =   1 order by rand() limit 4";
        $featured_res = mysql_query($sql_featured_deals);
        $count = 1;
        while ($featured_deal = mysql_fetch_array($featured_res)) {
            ?>
            <div id="<?php if ($count % 2 == 0) {
            echo "featured-deal";
        } else {
            echo "featured-deal-light";
        } ?>">
                <h3>FEATURED DEAL</h3>
                <img src="<?php echo $ru ?>media/deals_image/<?php echo $featured_deal['pk_deal_id'] ?>/thumbs/<?php echo $featured_deal['deal_image'] ?>" alt="<?php echo $featured_deal['deal_name'] ?>" class="featured-img" /> 
                <div id="featured-text">
                    <table align="center">
                        <tr>
                            <td><h4><?php echo $featured_deal['deal_name'] ?></h4><h5>By BAFX Productions</h5></td>
                            <td><h6>$30</h6></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="#" data-reveal-id="<?php echo $featured_deal['pk_deal_id'] ?>" data-animation="fade"><img src="<?php echo $ru ?>images/<?php if($count % 2 == 0){echo "more-light.png";} else {echo "more-dark.png";}?>" class="more" alt="more deals"/></a></td>
                        </tr>
                    </table>
                </div>
            </div>
    <div id="<?php echo $featured_deal['pk_deal_id']?>" class="reveal-modal">
                    <div id="by">
                        <table width="600" >
                            <tr>
                                <td width="450"><h5><?php echo $featured_deal['deal_name']?></h5> <h5>By <strong>Nick Tate</strong></h5></td>
                                <td><img src="images/photo.jpg" /></td>
                                <td><h6>Last Picked By:</h6><h5><strong>Tayna Coelho</strong></h5><img src="<?php echo $ru ?>images/follow.png" /></td>
                            </tr>
                        </table>
                    </div>

                    <div id="product-popup">
                        <div id="image">
                            <img src="<?php echo $ru ?>media/deals_image/<?php echo $featured_deal['pk_deal_id']?>/thumbs/<?php echo $featured_deal['deal_image']?>" alt="<?php echo $featured_deal['deal_name']?>" />
                        </div>

                        <div id="popup_text">
                            <table>
                               
                                <tr>
                                    <td align="left"><br /><img src="<?php echo $ru ?>images/fb_pop.png" alt="facebook"/> <img src="<?php echo $ru ?>images/tw_pop.png" alt="twitter" /> <img src="<?php echo $ru ?>images/pin.png" alt="pinterest"/></td>
                                </tr>
                                <tr>
                                    <td align="right"><br /><img src="<?php echo $ru ?>images/add.png" /></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <div id="pick-more">
                        <h3>More <br /> to <br /> Pick!</h3>	
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />

                    </div>

                    <div id="we-picked">
                        <h3>We <br /> picked <br /> it!</h3>	
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>


                    </div>

                    <div id="comments">
                        <h3>Comment</h3>	
                        <textarea name="comment" cols="" rows="" class="comment"></textarea>
                        <img src="<?php echo $ru ?>images/submit.png" />
                    </div>

                    <a class="close-reveal-modal">&#215;</a>
                </div>
            <?php
            $count = $count + 1;
        }
        ?>
    
<?php
        $sql_deals = "select * from tbl_deals where featured = 0";
        $deals_res = mysql_query($sql_deals);
        while ($deals = mysql_fetch_array($deals_res)) {
            ?>
            <div id="deal-box">

                <table>
                    <tr>
                        <td><img src="<?php echo $ru ?>media/deals_image/<?php echo $deals['pk_deal_id']?>/thumbs/<?php echo $deals['deal_image']?>" alt="<?php echo $deals['deal_name']?>" /></td>
                        <td>
                            <table>
                                <tr>
                                    <td><h4><?php echo $deals['deal_name']?></h4><h5>By BAFX Productions</h5></td>
                                    <td><h6>$30</h6></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><p><?php echo stripcslashes(urldecode($deals['deal_description']))?></p></td>
                                </tr>
                                <tr>
                                    <td><h1>1 Day</h1><h2>Remaining</h2></td>
                                    <td><a href="#" data-reveal-id="<?php echo $deals['pk_deal_id'] ?>" data-animation="fade"><img src="<?php echo $ru ?>images/view.png" alt="view more"/></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
    <div id="<?php echo $deals['pk_deal_id']?>" class="reveal-modal">
                    <div id="by">
                        <table width="600" >
                            <tr>
                                <td width="450"><h5><?php echo $deals['deal_name']?></h5> <h5>By <strong>Nick Tate</strong></h5></td>
                                <td><img src="images/photo.jpg" /></td>
                                <td><h6>Last Picked By:</h6><h5><strong>Tayna Coelho</strong></h5><img src="<?php echo $ru ?>images/follow.png" /></td>
                            </tr>
                        </table>
                    </div>

                    <div id="product-popup">
                        <div id="image">
                            <img src="<?php echo $ru ?>media/deals_image/<?php echo $deals['pk_deal_id']?>/thumbs/<?php echo $deals['deal_image']?>" alt="<?php echo $deals['deal_name']?>" />
                        </div>

                        <div id="popup_text">
                            <table>
                               
                                <tr>
                                    <td align="left"><br /><img src="<?php echo $ru ?>images/fb_pop.png" alt="facebook"/> <img src="<?php echo $ru ?>images/tw_pop.png" alt="twitter" /> <img src="<?php echo $ru ?>images/pin.png" alt="pinterest"/></td>
                                </tr>
                                <tr>
                                    <td align="right"><br /><img src="<?php echo $ru ?>images/add.png" /></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <div id="pick-more">
                        <h3>More <br /> to <br /> Pick!</h3>	
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />
                        <img src="<?php echo $ru ?>images/image-more.jpg" class="pickmore_image" />

                    </div>

                    <div id="we-picked">
                        <h3>We <br /> picked <br /> it!</h3>	
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>
                        <img src="<?php echo $ru ?>images/photo.jpg" class="we-picked_image"/>


                    </div>

                    <div id="comments">
                        <h3>Comment</h3>	
                        <textarea name="comment" cols="" rows="" class="comment"></textarea>
                        <img src="<?php echo $ru ?>images/submit.png" />
                    </div>

                    <a class="close-reveal-modal">&#215;</a>
                </div>
            <?php
        }
        ?>
    



</div>
