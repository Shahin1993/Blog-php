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

if(isset($_POST['form1'] ) )
{
	try{
		
		if(empty($_POST['p_title'])){
			throw new Exception("Title name is empty.");
		}
		if(empty($_POST['p_description'])){
			throw new Exception("Description name is empty.");
		}
		if(empty($_POST['cat_id'])){
			throw new Exception("Category name is empty.");
		}
		if(empty($_POST['tag_id'])){
			throw new Exception("Tag name is empty.");
		}
		
		$statement= $db->prepare("SHOW TABLE STATUS LIKE 'tbl_post'");
		$statement->execute();
		$result= $statement->fetchAll();
		foreach($result as $row)
		   $new_id=$row[10];
		
		$up_filename=$_FILES["p_image"]["name"];
		$file_basename= substr($up_filename, 0, strripos($up_filename, '.') );
		$file_ext= substr($up_filename, strripos($up_filename, '.'));
		$f1= $new_id. $file_ext;
		
		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif')  )
		throw new Exception("only jpg,jpeg,png and gif format imsges are allowed for all images." );
		
		move_uploaded_file($_FILES["p_image"]["tmp_name"], "../upload/".$f1 );
		
	 
		$tag_id= $_POST['tag_id'];
		$i=0;
		if(is_array($tag_id) )
		{	
		foreach($tag_id as $key=>$val)
		{
			$arr[$i] = $val;
			 
			$i++;
		}
		}
		
		$tag_ids= implode(",",$arr);
		 
		
		$p_date = date('Y-m-d');
		$p_time= strtotime(date('Y-m-d') );
		$year=substr($p_date,0,4);
		$month=substr($p_date,5,2);
	 
    $statement=$db->prepare("INSERT INTO tbl_post (p_title,p_description,p_image,cat_id,tag_id,p_date,year,month,p_time) values(?,?,?,?,?,?,?,?,?) ");
    $statement->execute(array($_POST['p_title'],$_POST['p_description'],$f1,$_POST['cat_id'],$tag_ids,$p_date,$year,$month,$p_time ) );
		
		
		$success_message= "Post is inserted successfully.";
	}
	catch(Exception $e) {
		$error_message= $e->getMessage();
	}
	
}


?>


<?php include("header.php"); ?>

<h2>Add New Post </h2>
<?php
if(isset($error_message)){echo "<div class='error'>" .$error_message. "</div>" ;}
if(isset($success_message)){echo "<div class='success'>" .$success_message. "</div>" ;}

?>
	
	<form action= "" method= "post" enctype= "multipart/form-data"  >
	<table claas= "tbl1" >
	<tr>
	<td>Title</td></tr><tr>
	<td><input class= "long" type= "text" name="p_title"></td>
	</tr>
	<tr><td>Description</td></tr><tr><td>
	<textarea name= "p_description" cols="20" rows= "8"></textarea>
	<script type= "text/javascript">
	if (typeof CKEDITOR== 'undefined')
	{
		document.write(
		'<string><span style= "color:#ff0000">Error</span>: CKEditor not found</strong>.'+
		'This sample assumes that CKEditor (not included with CKFinder) is installed in'+
		'the "/ckeditor/" path. If you have it installed in a different place, just edit'+
		'this file, changing the wrong paths in the &1t;head&gt; (line 5) and the "BasePath"'+
		'value (line 32).');
	}
	else
	{
		var editor= CKEDITOR. replace('p_description');
		//editor.setData( '<p>Just click the <b>image</b> or <b>Link<b> button, and then <b>&quot;Browse server&quot;</b>.</p>');
		
	}
	</script>
	</td>
	</tr>
	<tr>
	<td>Image</td>
	</tr>
	<tr>
	<td><input type= "file" name="p_image"></td>
	</tr>
	<tr>
	<td>Select Category</td>
	</tr>
	<tr>
	<td>
	<select value= "cat_id" name= "cat_id" >
	<option value= "">Select category</option>
	<?php
	    $statement= $db->prepare("SELECT * FROM tbl_category ORDER BY cat_name ASC");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
			?>
			
			<option value= "<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
			<?php
		}
	
	?>

	</select>
	</td>
	<tr>
	<td>Select Tages</td>
	</tr><tr>
	<td>
	<?php
	    $statement= $db->prepare("SELECT * FROM tbl_tag ORDER BY tag_name ASC");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
			?>
			
			<input type= "checkbox" name= "tag_id[]" value= "<?php echo $row['tag_id']; ?>"> &nbsp;<?php echo $row['tag_name']; ?><br>
			<?php
		}
	
	?>
	

	 
	</td></tr>
	<tr>
	<td><input type= "submit" value="SAVE" name="form1" ></td>
	</tr>
	
	</table>
	</form>
	<?php include("footer.php"); ?>