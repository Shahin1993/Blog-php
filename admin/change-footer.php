<?php
ob_start();
session_start();
if($_SESSION['name'] !='admin')
{
	header('location: login.php');
}

include("../config.php"); 
?>
<?php
if(isset($_POST['form1'])){
	try{
		if(empty($_POST['footer-text'])){
			throw new Exception("Footer name is empty.");
		}
		
		$statement= $db->prepare("UPDATE tbl_footer SET ft_description=? WHERE id=1");
		$statement->execute(array($_POST['footer-text']) );
		
		
$success_message= "Footer add successfuly.";
	}
	catch(Exception $e) {
		$error_message =$e->getMessage();
	}
}
?>
<?php
	$statement= $db->prepare("SELECT * FROM tbl_footer WHERE id=1");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
			$footer=$row['ft_description'];
		}
	?>
<?php include("header.php"); ?>

<h2>Change Footer Text </h2>
<?php
if(isset($error_message)){echo "<div class='error'>" .$error_message. "</div>" ;}
if(isset($success_message)){echo "<div class='success'>" .$success_message. "</div>" ;}

?>

	<form action= "" method= "post">
	<table>
	<tr>
	<td>Change Footer Text</td>
	<td><input class= "midum" type= "text" name="footer-text" value= "<?php echo $footer;?>" ></td>
	</tr>
	<tr>
	<td></td>
	<td><input type= "submit" value="Update" name= "form1" ></td>
	</tr>
	
	</table>
	</form>
	<?php include("footer.php"); ?>