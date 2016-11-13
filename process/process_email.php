<?php

		require('../config/config.php');
		require('../connection/connection.php');
		session_start();
		
		$firstname		=	$_POST['firstname'];
		$lastname		=	$_POST['lastname'];
		$Email		=	$_POST['Email'];
		$message	=	$_POST['message'];
		

		$to = 'sanaullahAhmad@gmail.com';
		//$cc = 'sajjad.j@medialinkers.com';
			
		
		$subject ="Contact form filled at Neotjanster.com Website";
		
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers.="From: $email \r\n";
		//$headers .= "CC: $cc\r\n";
		//$headers .= "BCC: hidden@special.com\r\n";
		$headers.="Return-Path: $email \r\n";
		
		$body = '<table width="650" border="0">
				   <tr bgcolor="#BDD5DF">
					<td colspan="2">A visitor on Neotjanster.com website has filled form. Details are below:</td>
				  </tr>				  
				  <tr bgcolor="#D5D5D5">
					<td width="110">Firlst Name:</td>
					<td width="265">'.$firstname.'</td>
				  </tr>
				   <tr bgcolor="#D5D5D5">
					<td>Last Name:</td>
					<td>'.$lastname.'</td>
				  </tr>
				  <tr bgcolor="#D5D5D5">
					<td>Email:</td>
					<td>'.$Email.'</td>
				  </tr>				 
				  <tr bgcolor="#D5D5D5">
					<td valign="top">Message:</td>
					<td valign="top">'.$message.'</td>
				  </tr>				  
				</table>';
		if(mail($to, $subject, $body, $headers)){
			header("Location: " . $ru."contact/passed");
		}
		else{
			header("Location: " . $ru."contact/failed");
		}	
		
		

		
?>