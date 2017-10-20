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
		if(empty($_POST['cat_name'])){
			throw new Exception("Category name is empty.");
		}
		
		$statement= $db->prepare("SELECT * FROM tbl_category WHERE cat_name=?");
		$statement->execute(array($_POST['cat_name'] ) );
		$total= $statement->rowCount();
		if($total>0){
			throw new Exception("Category name is allready exit.");
		}
		$statement=$db->prepare("INSERT INTO tbl_category (cat_name) values(?) ");
		$statement->execute(array($_POST['cat_name'] ) );
		
		$success_message= "Category add successfuly.";
	}
	catch(Exception $e) {
		$error_message =$e->getMessage();
	}
	header("refresh:3; url=manage-category.php");
}

if(isset($_POST['form2'])){
	try{
		if(empty($_POST['cat_name'])){
			throw new Exception("Category name is empty.");
		}
		
		$statement= $db->prepare("UPDATE tbl_category SET cat_name=? WHERE cat_id=?");
		$statement->execute(array($_POST['cat_name'],$_POST['hdn'] ) );
		
		$success_message1= "Category Update successfuly.";
	}
	catch(Exception $e) {
		$error_message1 =$e->getMessage();
	}
	header("refresh:2; url=manage-category.php");
}


if(isset($_REQUEST['id']) )
{
	$id=$_REQUEST['id'];
	$statement=$db->prepare("DELETE FROM tbl_category WHERE cat_id=?");
	$statement->execute(array($id) );
	
	$success_message2= "Category Delete successfuly.";
	header("refresh:1; url=manage-category.php");
}
?>
<?php include("header.php"); ?>
<h2>Add Category Name </h2>
<?php
if(isset($error_message)){echo "<div class='error'>" .$error_message. "</div>" ;}
if(isset($success_message)){echo "<div class='success'>" .$success_message. "</div>" ;}

?>
	<form action= "" method= "post">
	<table>
	<tr>
	<td>Category Name</td>
	<td><input class= "midum" type= "text" name="cat_name"></td>
	</tr>
	<tr>
	<td></td>
	<td><input type= "submit" value="SAVE" name= "form1" ></td>
	</tr>
	
	</table>
	</form>
	<h2>Viw All Category</h2>
	
	<?php
	if(isset($error_message1)){echo "<div class='error'>" .$error_message1. "</div>" ;}
     if(isset($success_message1)){echo "<div class='success'>" .$success_message1. "</div>" ;}
	 if(isset($success_message2)){echo "<div class='success'>" .$success_message2. "</div>" ;}
     ?>
	 
	<table class= "tbl2" width= "90%"  >
	<tr>
	<th width="5%">Sreal</th>
	<th width="70%">Category</th>
	<th width="15%">Action</th>
	</tr>
	
	<?php
	$i=0;
	$statement= $db->prepare("SELECT * FROM tbl_category ORDER BY cat_name ASC");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		
		{
			$i++;
		?>
		
		<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $row['cat_name']; ?></td>
	<td>
	<a class="fancybox" href="#inline<?php echo $i; ?>">Edit</a>
	<div id="inline<?php echo $i; ?>" style="width:400px;display: none;">
		<h3>Etiam quis mi eu elit</h3>
		<p>
			 <form action="" method="post">
			 <input type= "hidden" name= "hdn" value= "<?php echo $row['cat_id']; ?>">
			 <table>
			 <tr>
			 <td>Category name</td>
			 </tr>
			 <tr>
			 <td><input type="text" name= "cat_name" value= "<?php echo $row['cat_name']; ?>" > </td>
			 </tr>
			 <tr>
			 <td><input type="submit" name= "form2" value= "Update" > </td>
			 </tr>
			 </table>
			 </form>
		</p>
	</div>
	
	&nbsp;|&nbsp;<a onclick='return confirmDelete();' href= "manage-category.php?id=<?php echo $row['cat_id']; ?>" >Delete</a></td>
	</tr>
	
	<?php
	
		}
		
	?>
	
	
	</table>
	<?php include("footer.php"); ?>