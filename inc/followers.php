<div id="follow">

    <img src="<?php echo $ru ?>images/follow.png" class="follow_image" />
    <?php
		$quer = "select * from tbl_style limit 8";
		$quersql = mysql_query($quer);
		while( $result = mysql_fetch_array($quersql))
		  {
		?>
            <?php
            if(!isset($_SESSION['user']['uid']))
			{
			?>
            <a data-reveal-id="login"  href="void()">
            <img src="<?php echo $ru ?>images/styles/<?php echo $result['style_image'];?>" class="follow_image" />
            </a>
            <?php
			}
			else
			{
			?>
            <a  href="<?php echo $ru;?>followstyle/<?php echo $_SESSION['user']['uid'];?>">
            <img src="<?php echo $ru ?>images/styles/<?php echo $result['style_image'];?>" class="follow_image" />
            </a>
            <?php }?>
            <img src="<?php echo $ru ?>images/sep.png" />
    <?php }?>
    <?php /*?><img src="<?php echo $ru ?>images/2.jpg" class="follow_image"  />
    <img src="<?php echo $ru ?>images/sep.png" />
    <img src="<?php echo $ru ?>images/3.jpg" class="follow_image"  />
    <img src="<?php echo $ru ?>images/sep.png" />
    <img src="<?php echo $ru ?>images/4.jpg" class="follow_image"  />
    <img src="<?php echo $ru ?>images/1.jpg" class="follow_image" />
    <img src="<?php echo $ru ?>images/sep.png" />
    <img src="<?php echo $ru ?>images/2.jpg" class="follow_image"  />
    <img src="<?php echo $ru ?>images/sep.png" />
    <img src="<?php echo $ru ?>images/3.jpg" class="follow_image"  />
    <img src="<?php echo $ru ?>images/sep.png" />
    <img src="<?php echo $ru ?>images/4.jpg" class="follow_image"  /><?php */?>
</div>