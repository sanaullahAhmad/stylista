<script type="text/javascript">
var anylinkmenu1={divclass:'anylinkmenu', inlinestyle:'', linktarget:''} //First menu variable. Make sure "anylinkmenu1" is a unique name!
anylinkmenu1.items=[
	["Manage Profile", "<?php echo $ru ?>user_profile"],
	<?php if($_SESSION['user']['user_type'] ==1)
	{
	?>
	["Manage Stores", "<?php echo $ru ?>manage_shops"],
	<?php
	}
	?>
	
	["Manage Products", "<?php echo $ru ?>manage_products"],
	["Manage Deals", "<?php echo $ru ?>manage_deals"]
	 //no comma following last entry!
]

</script>
