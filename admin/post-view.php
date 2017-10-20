<?php
ob_start();
session_start();
if($_SESSION['name'] !='admin')
{
	header('location: login.php');
}

include("../config.php"); 

?>

<?php include("header.php"); ?>

	<h2>View All Posts</h2>
	<table class= "tbl2" width= "90%"  >
	<tr>
	<th width="5%">Sreal</th>
	<th width="60%">Title</th>
	<th width="25%">Action</th>
	</tr>
	
	
	<?php
	$i=0;
	$statement= $db->prepare("SELECT * FROM tbl_post ORDER BY p_id DESC");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		
		{
			$i++;
		?>
		<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $row['p_title']; ?></td>
	<td>
	<a class="fancybox" href="#inline<?php echo $i; ?>">View</a>
	<div id="inline<?php echo $i; ?>" style="width:400px;display: none;">
	<h3 style="border-boottom:2px solid #808080;margin-bootom:10px;">View all data</h3>
	<p>
	<form action= "" method= "" name= "">
	<table>
	<tr>
	<td> Title </td>
	</tr>
	<tr>
	<td><?php echo $row['p_title']; ?></td>
	</tr>
	
	<tr>
	<td>Description</td>
	</tr>
	<tr>
	<tr>
	<td><?php echo $row['p_description']; ?></td>
	</tr>
	<tr>
	<td>Image</td>
	</tr>
	<tr>
	<td><img src= "../upload/<?php echo $row['p_image']; ?>" alt= "" ></td>
	</tr>
	<tr>
	<td>Category</td>
	</tr>
	<tr>
	<td>
	<?php
	$statement1= $db->prepare("SELECT * FROM tbl_category WHERE cat_id=?");
		$statement1->execute(array($row['cat_id']));
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
	$arr=explode(",",$row['tag_id'] );
	$count_arr=count(explode(",",$row['tag_id']) );
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
	
	
	<tr>
	<td><input type= "submit" value= "Update" name= ""> </td>
	</tr>
	</table></form></p>
	</div>
	&nbsp;|&nbsp;<a href= "post-edit.php?id=<?php echo $row['p_id']; ?>" >
	Edit</a>
	&nbsp;|&nbsp;<a onclick= 'return confirmDelete();' href= "post-delete.php?id=<?php echo $row['p_id']; ?>" >
	Delete</a></td>
	</tr>
	<?php
	
		}
		
	?>
	
	
	
	</table>

	
		
	<?php include("footer.php"); ?>