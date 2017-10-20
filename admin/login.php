<?php
if(isset($_POST['form_login'] ) )
{
	try{
		if(empty($_POST['username'])){
			throw new Exception('username can not be empty');
		}
		if(empty($_POST['password'])){
			throw new Exception('password can not be empty');
		}
		$password=$_POST['password']; //admin
		$password=md5($password);
		
		include('../config.php');
		$num=0;
		
		$statement= $db->prepare("SELECT * FROM tbl_login WHERE username=? and password=?");
		$statement->execute(array($_POST['username'],$password ) );
		$num= $statement->rowCount();
		if($num>0)
		{
			session_start();
			$_SESSION['name']= "admin";
			header ("location: index.php");
		}
		else
		{
			throw new Exception('Invalid Usernme and password');
		}
	}
	catch(Exception $e){
		$error_message = $e->getMessage();
	}
}

?>
<html>
<head><title>Login</title>
<link rel= "stylesheet" type= "text/css" href= "../style-admin.css" />
</head>
</body>
<div id= "wrapper-login">
<h1>Admin login</h1>
<?php
if(isset($error_message))
{
	echo "<div class='error'>" .$error_message. "</div>" ;
}
?>
<form action= "" method= "post">
<table class="tbl1">
<tr>
   <td>Username:</td>
   <td><input type= "text" name= "username" ></td>
   </tr>
   <tr>
   <td>Password:</td>
   <td><input type= "password" name= "password" ></td>
   </tr>
   <tr>
   <td></td>
   <td><input type= "submit" value= "Login" name="form_login"></td>
   </tr>
   </table>
   </form></div>
</body>
</html>