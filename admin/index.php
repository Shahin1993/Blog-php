<?php
ob_start();
session_start();
if($_SESSION['name'] !='admin')
{
	header('location: login.php');
}

?>
<?php include("header.php"); ?>
	<h2>Admin Panel</h2>
	<div style="font-weight:bold;color:#3d9ccd;font-size:29px;text-align:center">
	Welcome to the Dashboard <br>
	Learn Blog with php
	</div>
	<?php include("footer.php"); ?>