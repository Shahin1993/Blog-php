</div>
<div id= "sidebar"	>		 
  <div id= "search">
     <input type= "text" value= "search">  
	 <div class= "inner_copy">free flash templates<span></span>best free builders</div>
	 </div>
	 <div class= "list">
	 <h2>Categories</h2>
	 <ul>
	 <?php
	 include("config.php"); 
	 $statement= $db->prepare("SELECT * FROM tbl_category ORDER BY cat_name ASC");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		
		{
			?><li> <a href= "category.php?id=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a></li><?php
		}
	 
	 ?>
  
				</ul>
				<h2>Achive</h2>
				
				
				<?php
				$j=0;
	     $statement= $db->prepare("SELECT distinct(p_date) FROM tbl_post ORDER BY p_date DESC");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
				
				{
					$ym= substr($row["p_date"],0,7 );
					$arr_date[$j]=$ym;
					$j++;
				}
				$result=array_unique($arr_date);
				$final_val=implode(",",$result);
				$final_arr_date=explode(",",$final_val);
				$final_arr_date_count=count(explode(",",$final_val));
				
				
				?>
	<ul>
	<?php
		for($j=0;$j<$final_arr_date_count;$j++)
				{
					//echo $final_arr_date[$j], "<br>";
					 $year=substr($final_arr_date[$j],0,4);
	     $month=substr($final_arr_date[$j],5,2);
		 if($month=='01') {$month_full= "January"; }
	      if($month=='02') {$month_full= "February"; }
		   if($month=='03') {$month_full= "March"; }
		    if($month=='04') {$month_full= "April"; }
			 if($month=='05') {$month_full= "May"; }
			  if($month=='06') {$month_full= "Jun"; }
			   if($month=='07') {$month_full= "July"; }
			    if($month=='08') {$month_full= "August"; }
				 if($month=='09') {$month_full= "Septeber"; }
				   if($month=='10') {$month_full= "October"; }
				    if($month=='11') {$month_full= "November"; }
					 if($month=='12') {$month_full= "December"; }
	      
					
					
					?>
				
					<li> 
			   
			     <a href="archive.php?date=<?php echo $final_arr_date[$j]; ?>"><?php echo $month_full.' '.$year; ?></a>
			
			   </li>
					<?php
				}
			
	 ?>
</ul>
							</div>
							
							<div  class= "image" >
							<img src= "upload/4.jpg" alt= "" width= "200px" height= "200px" /><br>
								<span> Md Shahin Hossen</span>
							</div>
							</div>
							</div>
						</div>
	<div id= "footer">
       	<p> 
		
		<?php
		include("config.php"); 
		
	    $statement= $db->prepare("SELECT * FROM tbl_footer WHERE id=1");
		$statement->execute();
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		{
		  echo $row['ft_description'];
		}
	?>
		
		</p>			
 </div>  
			 
</body>
</html>