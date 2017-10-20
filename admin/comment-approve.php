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
if(isset($_REQUEST['id'])){
	try{
		 
		
		$statement= $db->prepare("UPDATE tbl_comment SET active=1 WHERE c_id=?");
		$statement->execute(array($_REQUEST['id']) );
		
		
$success_message= " Approve successfuly.";
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
<h2>All Unapprove comments</h2>

<table class= "tbl2" width= "90%"  >
	<tr>
	<th width="">Sreal</th>
	<th width="">Name</th>
	<th width="">Email</th>
	<th width="">Url</th>
	<th width="">Message</th>
	<th width="">Post ID</th>
	<th width="5%">Action</th>
	</tr>

<?php
	$i=0;
	$statement= $db->prepare("SELECT * FROM tbl_comment WHERE active=0 ORDER BY c_id DESC");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		
		{
			$i++;
		?>
		<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $row['c_name']; ?></td>
	<td><?php echo $row['c_email']; ?></td>
	<td><?php echo $row['c_url']; ?></td>
	<td><?php echo $row['c_message']; ?></td>
	<td><?php echo $row['p_id']; ?></td>
	<td><a href= "comment-approve.php?id=<?php echo $row['c_id']; ?>">Approve</a></td>
</tr>
<?php
		}

?>
</table>

<h2>All Approve comments</h2>
 
<table class= "tbl2" width= "90%"  >
	<tr>
	<th width="">Sreal</th>
	<th width="">Name</th>
	<th width="">Email</th>
	<th width="">Url</th>
	<th width="">Message</th>
	<th width="">Post ID</th>
	
	</tr>

<?php
	$i=0;
	$statement= $db->prepare("SELECT * FROM tbl_comment WHERE active=1 ORDER BY c_id DESC");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		
		{
			$i++;
		?>
		<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $row['c_name']; ?></td>
	<td><?php echo $row['c_email']; ?></td>
	<td><?php echo $row['c_url']; ?></td>
	<td><?php echo $row['c_message']; ?></td>
 
	<td>
	<a class="fancybox" href="#inline<?php echo $i; ?>"><?php echo $row['p_id']; ?></a>
	<div id="inline<?php echo $i; ?>" style="width:500px;display: none;">
	<h3 style="border-boottom:2px solid #808080;margin-bootom:10px;">View all data</h3>
	<p>
	<?php
	  $statement2= $db->prepare("SELECT * FROM tbl_post WHERE p_id=?");
		$statement2->execute(array($row['p_id']));
		$result2= $statement2->fetchAll(PDO::FETCH_ASSOC);
		foreach($result2 as $row2)
		{
			 ?>
			 
			 <table>
	<tr>
	<td> Title </td>
	</tr>
	<tr>
	<td><?php echo $row2['p_title']; ?></td>
	</tr>
	
	<tr>
	<td>Description</td>
	</tr>
	<tr>
	<tr>
	<td><?php echo $row2['p_description']; ?></td>
	</tr>
	<tr>
	<td>Image</td>
	</tr>
	<tr>
	<td><img src= "../upload/<?php echo $row2['p_image']; ?>" alt= "" ></td>
	</tr>
	<tr>
	<td>Category</td>
	</tr>
	<tr>
	<td>
	<?php
	$statement1= $db->prepare("SELECT * FROM tbl_category WHERE cat_id=?");
		$statement1->execute(array($row2['cat_id']));
		$result1= $statement1->fetchAll(PDO::FETCH_ASSOC);
		foreach($result1 as $row1)
		{
			echo $row1['cat_name'];
		}
	?>
	</td>
	</tr>
    <tr>
	<td>Tag</td>
	</tr>
    <tr>
	<td> 
	<?php
	$arr=explode(",",$row2['tag_id'] );
	$count_arr=count(explode(",",$row2['tag_id']) );
	$k=0;
	for($j=0;$j<$count_arr;$j++)
	{
		$statement1= $db->prepare("SELECT * FROM tbl_tag WHERE tag_id=?");
		$statement1->execute(array($arr[$j]));
		$result1= $statement1->fetchAll(PDO::FETCH_ASSOC);
		foreach($result1 as $row1)
		{
			$arr1[$k]=$row1['tag_name'];
		}
          $k++;
	}
	$tag_names= implode(",",$arr1);
		  echo  $tag_names;
	
	?>
	
	</td>
	</tr>
	 
	</table>
			 
			 
			 <?php
		}
	
	 ?>
	 </p>
	 </div>
</tr>
<?php
		}

?>
</table>
<?php
if(isset($error_message)){echo "<div class='error'>" .$error_message. "</div>" ;}
if(isset($success_message)){echo "<div class='success'>" .$success_message. "</div>" ;}

?>

	 
	<?php include("footer.php"); ?>