
<?php
include("left.php");
?>

<div id="items">
    <div id="items-in">
<h1>Contact</h1>

<table align="center">
<?php 
if (isset($_GET['s']) && $_GET['s'] == 'passed')
{
	echo "<h2>Mail sent Successfully</h2>";
}
if (isset($_GET['s']) && $_GET['s'] == 'failed')
{
	echo "<h2>Mail sending Failed</h2>";
}
?>
<form method="post" action="process/process_email.php">
<tr>
<td width="300" height="50">First Name:</td>   <td width="300"><input type="text" name="firstname" /></td>
<tr>
<tr>
<td height="50">Last Name:</td>   <td><input type="text" name="lastname" /></td>
<tr>
<tr>
<td height="50">Email:</td>   <td><input type="text" name="Email" /></td>
<tr>
<tr>
<td height="50">Message:</td>   <td><textarea name="message" rows="10" cols="10"></textarea></td>
<tr>
<tr>
<td height="100"><input type="submit" name="Message" value="submit" /></td>
<tr>
</tr>
</form>
</table>
        

    </div>
</div>

<?php
include("right.php");
?>
<!-------------------------
User Forms
--------------------------->

            <!---------------
            Login form
            ----------------->
            