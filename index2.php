<?php
if(!isset($_REQUEST["id"] ) ){
	header("location: index.php");
}
else
{
	$id=$_REQUEST["id"];
}
?>

<?php
if(isset($_POST['form1'] ) )
{
	try{
		if(empty($_POST['c_message'] ) )
		{
			throw new Exception("Message field is empty");
		}
		if(empty($_POST['c_name'] ) )
		{
			throw new Exception("Name field is empty");
		}
		if(empty($_POST['c_email'] ) )
		{
			throw new Exception("Email field is empty");
		}
		$c_date=date("Y-m-d");
		$active=0;
		
		include ("config.php");
		$statement=$db->prepare("INSERT INTO tbl_comment (c_name,c_email,c_url,c_message,c_date,p_id,active) values(?,?,?,?,?,?,?) ");
		$statement->execute(array($_POST['c_name'],$_POST['c_email'],$_POST['c_url'],$_POST['c_message'],$c_date,$id,$active ) );
		
		
		
		$success_message= "Comment add successfully.";
	}
	catch(Exception $e) {
		$error_message=$e->getMessage();
	}
	
}


?>

<?php include("header.php"); ?>

<?php
	 include("config.php"); 
	  
	 
	 $statement= $db->prepare("SELECT * FROM tbl_post WHERE p_id=?");
		$statement->execute(array($_REQUEST["id"] ) );
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		
		{
			?> 
			
			
	  <div class= "post">
	  <h2><?php echo $row["p_title"]; ?></h2>
	  <div><span class= "date"> 
	  <?php
	     $post_date=$row["p_date"];
		 $day=substr($post_date,8,2);
	     $month=substr($post_date,5,2);
		 if($month=='01') {$month= "Jan"; }
	      if($month=='02') {$month= "Feb"; }
		   if($month=='03') {$month= "Mar"; }
		    if($month=='04') {$month= "Apr"; }
			 if($month=='05') {$month= "May"; }
			  if($month=='06') {$month= "Jun"; }
			   if($month=='07') {$month= "Jul"; }
			    if($month=='08') {$month= "Aug"; }
				 if($month=='09') {$month= "Sep"; }
				   if($month=='10') {$month= "Oct"; }
				    if($month=='11') {$month= "Num"; }
					 if($month=='12') {$month= "Dec"; }
	      echo $day.' '.$month;
	  ?>
	  
	  
	  </span><span class= "categories">
	  Tages:&nbsp;
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
	  
	  </span></div>
	  <div class= "description">
	     <p><img src= "upload/<?php echo $row["p_image"]; ?>" alt= "" width= "250" />
		  
	         <?php echo $row["p_description"]; ?>
			 </p></div> 
		
			<?php
		}
	 
	 ?></div>
     <span class= "view" >View Comments</span>
	 <div id= "comments">
	 
	 <?php
	 $statement= $db->prepare("SELECT * FROM tbl_comment WHERE active=1 AND p_id=?");
		$statement->execute(array($id));
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
			?>
			
			<div class= "comment">
	 <div class= "averter">
	 <?php
	 $gravatarMd5 = md5($row['c_email'] );
	 
	 ?>
	 <img src="http://www.gravatar.com/avatar/<?php echo $gravatarMd5; ?>" alt= "" width= "80" height="80"><br>
	 
	 <span><?php echo $row['c_name']; ?></span><br>
	  
	  <?php
	  $year=substr($row['c_date'],0,4);
	  $month=substr($row['c_date'],5,2);
	  $day=substr($row['c_date'],8,2);
	     
		 if($month=='01') {$month= "Jan"; }
	      if($month=='02') {$month= "Feb"; }
		   if($month=='03') {$month= "Mar"; }
		    if($month=='04') {$month= "Apr"; }
			 if($month=='05') {$month= "May"; }
			  if($month=='06') {$month= "Jun"; }
			   if($month=='07') {$month= "Jul"; }
			    if($month=='08') {$month= "Aug"; }
				 if($month=='09') {$month= "Sep"; }
				   if($month=='10') {$month= "Oct"; }
				    if($month=='11') {$month= "Num"; }
					 if($month=='12') {$month= "Dec"; }
	      echo $day.' '.$month.",".$year ;
	  ?>
	  
	  
	  
	  
	 </div>
	 <p><?php echo $row['c_message']; ?></p>
	 </div>
			
			<?php
		}
	 
	 ?>
	 
	 
	 
	 <div id= "add">
	 <img src= "" alt= ""/><br>
	  <div class= "averter">
	  	  
		  
		 <span>Comment Field</span><br>
		 
	  
	  </div>
	  
	  <?php
        if(isset($error_message)){echo "<div class='error'>" .$error_message. "</div>" ;}
        if(isset($success_message)){echo "<div class='success'>" .$success_message. "</div>" ;}

          ?>
	  
	  <div class= "form">
	  <form action= "index2.php?id=<?php echo $id; ?>" method= "post">
	  <textarea name= "c_message" placeholder= "Add your message......." ></textarea><br>
	  <input type= "text" name= "c_name" value= ""  placeholder= "name" /><br>
	   <input type= "email" name= "c_email" placeholder= "email" /><br>
	    <input type= "text" name= "c_url" placeholder= "URL" /><br>
		 <input type= "submit" value= "Comment" name= "form1" /><br>
	 </div>
	 </div>
	 </div>
	<?php include("footer.php"); ?>