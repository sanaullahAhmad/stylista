<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="stylista" />
    <title>.::&nbsp;Stylista&nbsp;::.</title>
    <link type="text/css" href="<?php echo $ru ?>css/style.css" media="screen" rel="stylesheet" />
    
    <script>
	(function(i,s,o,g,r,a,m)
	{
		i['GoogleAnalyticsObject']=r;i[r]=i[r]||function()
		{
			(i[r].q=i[r].q||[]).push(arguments)
		}
		,i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})
	(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-39982264-1', 'neotjanster.com');
	ga('send', 'pageview');
    </script>

    <script type="text/javascript" src="<?php echo $ru ?>js/jquery.js"></script>
    
    <script src="<?php echo $ru ?>js/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?php echo $ru ?>css/jquery-ui.css" />
    
    <script type="text/javascript" src="<?php echo $ru ?>js/jquery.reveal.js"></script>
    <link rel="stylesheet" href="<?php echo $ru ?>css/reveal.css" />
    <script type="text/javascript" src="<?php echo $ru?>js/bootstrap.js"></script>
	<link rel="stylesheet" href="<?php echo $ru?>css/bootstrap.css" />
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo $ru?>css/anylinkmenu.css" />
	<?php require_once('js/menucontents.php');?>
    <script type="text/javascript" src="<?php echo $ru?>js/anylinkmenu.js"></script>
    <script type="text/javascript">
	
	jQuery(function() {
	jQuery( "#accordion" ).accordion();
	});
	
    //anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links 
	//(that contain a sub menu)
	
    anylinkmenu.init("menuanchorclass")
	
	function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	
	
		
		
    </script>
 </head>
        <body>

            <div id="wrapper">
