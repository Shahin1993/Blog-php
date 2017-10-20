<?php
if(!isset($_REQUEST['date'] ) )
{
	header("location: index.php");
}
else
{
	$date1=$_REQUEST['date'];
	$year1=substr($date1,0,4);
	$month1=substr($date1,5,2);
}

?>

<?php include("header.php"); ?>

<?php
	 include("config.php"); 
	 
	  /*============pagination code start================*/
	 
	 $adjacents= 7;
	 
	 
	 $statement= $db->prepare("SELECT * FROM tbl_post WHERE year=? AND month=? ORDER BY p_id DESC");
		$statement->execute(array($year1,$month1) );
		$total_pages= $statement->rowCount();
		$targetpage= $_SERVER["PHP_SELF"];
		$limit=5;
		$page= @$_GET["page"];
		if($page)
			$start=($page-1) * $limit;
		else
			$start=0;
		
	 
	 $statement= $db->prepare("SELECT * FROM tbl_post WHERE year=? AND month=? ORDER BY p_id DESC LIMIT $start, $limit");
		$statement->execute(array($year1,$month1) );
		$result= $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if($page==0) $page=1;
		$prev=$page-1;
		$next=$page+1;
		$lastpage=ceil($total_pages/$limit);
		$lpm1=$lastpage-1;
		$pagination= "";
		if($lastpage>1)
		{
			$pagination .= "<div class=\"pagination\">";
			if($page>1)
				$pagination.= "<a href=\" $targetpage?date=$date1&page=$prev\">&#171; previous</a>";
			else
				$pagination.= "<span class=\"disabled\">&#171; previous</span>";
			if($lastpage < 7 + ($adjacents * 2) )
			{
				for($counter=1; $counter <=$lastpage; $counter++)
				{
					if($counter==$page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?date=$date1&page=$counter\">$counter</a>";
				}
			}
			elseif($lastpage >5 + ($adjacents * 2) )
			{
				if($page <1 + ($adjacents * 2) )
				{
					for($counter= 1; $counter<4 + ($adjacents * 2); $counter++ )
					{
						if($counter==$page)
							$pagination.= "<span class=\" current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?date=$date1&page=$counter\">$counter</a>";
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?date=$date1&page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?date=$date1&page=$lastpage\">$lastpage</a>";
				}
				elseif($lastpage= ($adjacents *2) > $page && $page > ($adjacents * 2) )
				{
					$pagination.= "<a href=\"$targetpage?date=$date1&page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?date=$date1&page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $page-$adjacents; $counter<=$page + $adjacents; $counter++)
					{
						if($counter==$page)
							$pagination.= "<span class=\"current\">$counter</span> ";
						else
							$pagination.="<a href=\"$targetpage?date=$date1&page=$counter\">$counter</a>";
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?date=$date1&page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?date=$date1&page=$lastpage\">$lastpage</a>";
				}
				else
				{
					$pagination.= "<a href=\"$targetpage?date=$date1&page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?date=$date1&page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage-(2 + ($adjacents * 2) ) ; $counter<=$lastpage; $counter++)
					{
						if($counter==$page)
							$pagination.= "<span class=\"current\">$counter</span> ";
							else
								$pagination.= "<a href=\"$targetpage?date=$date1&page=$counter\">$counter</a>";
					}
				}
			}
			if($page < $counter-1 )
				$pagination.= "<a href=\" $targetpage?date=$date1&page=$next\">next &#187;</a>";
			else
				$pagination.= "<span class=\" disabled\">next &#187;</span>";
			$pagination.= "</div>\n";
		}
	
	  
	 /*============pagination code end================*/
	  
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
	  
	  
	  </span></div> <div><span class= "categories">
	  Tages:&nbsp;
	  <?php
	$arr = explode(",",$row['tag_id'] );
	$count_arr = count(explode(",",$row['tag_id']) );
	$k=0;
	for($j=0;$j<$count_arr;$j++)
	{
		$statement1 = $db->prepare("SELECT * FROM tbl_tag WHERE tag_id=?");
		$statement1->execute(array($arr[$j]));
		$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
		foreach($result1 as $row1)
		{
			$arr1[$k] = $row1['tag_name'];
		}
          $k++;
	}
	$tag_names = implode(",",$arr1);
		  echo  $tag_names;
	?>
	  
	  </span></div>
	  <div class= "description">
	     <p><img src= "upload/<?php echo $row["p_image"]; ?>" alt= "" width= "250" />
		 
		 <?php
		 $piceces=explode(" ",$row["p_description"]);
		 $final_words=implode(" ",array_splice($piceces, 0, 50) );
		 
		 $final_words=$final_words.'...';
		 
		 ?>
	         <?php echo $final_words; ?>
			 </p></div>
			 <p class= "comments"> 
			 <span>Comments </span>
			 <?php
			 
			 $statement= $db->prepare("SELECT * FROM tbl_comment WHERE p_id=? AND active=1");
		     $statement->execute(array($row['p_id']));
		      $result= $statement->rowCount();
		     echo $result;
			 
			 
			 ?>
			 
			 <span>|</span> <a href= "index2.php?id=<?php echo $row["p_id"]; ?>">Continue Reading</a></p>
			 </div>
			
			
			<?php
			 
		}
	 
	 ?>

	 
	 <div class= "pagination">
	 <?php echo $pagination; ?>
			</div> 
			 
	<?php include("footer.php"); ?>