<?php
include('connection.php');
if($_SESSION['user_name']=='')
		{
			header("location:index.php");
		}
require_once 'page.php';
$body= <<< EOD
<center>
<h1>Tool  For Updating Pin Code Information</h1>
<form name="edit_pin" action="search1.php" method="post">
<input type="text" name="pincode" id="pincode" width="40" height="200" />
<input type="submit" name="submit" value="View Info" />
</form>
</center>
EOD;
sendPage($body,$head);
?>