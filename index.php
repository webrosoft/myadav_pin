<?php
include('connection.php');
	if(isset($_POST['login']))
		{
		   $error='';
			$username=$_POST['username'];
			$password=$_POST['password'];
			if($username=='' and $password=='')
				{
					$error.="Please Enter Correct User Name and Password.";
				}
			
			if($error=='')
				{
					$select="select * from users where user ='".$username."' and password ='".$password."'";
					$query=mysql_query($select);
					$fetch=mysql_fetch_array($query);
					$count=mysql_num_rows($query);
					if($count>0)
					{
					     $_SESSION['user_name']=$fetch['user'];
						 header("location:home.php");
						 exit();
					}
				else
				{
				?>
				 <script type="text/javascript">
					alert ("Invalid UserName or Password");
				  </script>
				<?php
				}
				
			}
		}
?>
<html>
<head>

 <script type="text/javascript">
function validate_login()
{	  
	if (document.getElementById("username").value=="")
		{
			alert ("Please enter your username");
			document.getElementById("username").focus();
			return false;
		}
		
	if (document.getElementById("password").value=="")
		{
			alert ("Please enter your password");
			document.getElementById("password").focus();
			return false;
		}		
}
</script>
<title>Tool  for Updating Pincode With Constituency</title>
</head>
<body>
		
<center>
<h1>Tool  For Updating Pin Code</h1>
	<form action="" method="post" id="form-login">
						<label id="mod-login-username-lbl" for="mod-login-username">User Name</label>
				<input name="username" id="username" type="text"  size="15" autocomplete="off" /><br /></br>
				<label id="mod-login-password-lbl" >Password</label>
				<input name="password" id="password" type="password"  size="15" style="margin-left:7px;"/><br /></br>
				<input type="submit" name="login" id="login"  value="Log in" style="cursor:pointer;" onClick="return validate_login()"/>
	
</form>
</body>
</html>