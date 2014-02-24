<?php
	/*
		Place code to connect to your DB here.
	*/
	include_once('admin/config/config.inc.php');	// include your code to connect to DB.

	$tbl_name="article";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	 $sql="select * from category order by catid";

							  $qry=mysql_query($sql);
							  $i=0;
							  $res=mysql_fetch_array($qry);
							  
								  
	$query = "SELECT COUNT(*) as num FROM $tbl_name  where status='1' and category='".$res['categoryname']."' order by date desc";
                               
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "browse_all_cat_articles.php"; 	//your file name  (the name of this file)
	$limit =2; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;
		
		$page_no=$start;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name  LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">&laquo; previous&nbsp; </a>";
		else
			$pagination.= "<span class=\"disabled\">&laquo;previous&nbsp; </span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">&nbsp; $counter&nbsp; </span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">&nbsp; $counter&nbsp; </a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">&nbsp; $counter&nbsp; </span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">&nbsp; $counter&nbsp;  </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">&nbsp; $lastpage&nbsp; </a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">&nbsp; 1&nbsp; </a>";
				$pagination.= "<a href=\"$targetpage?page=2\">&nbsp; 2&nbsp; </a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">&nbsp; $counter&nbsp; </span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">&nbsp; $counter&nbsp; </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">&nbsp; $lastpage&nbsp; </a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">&nbsp; 1&nbsp; </a>";
				$pagination.= "<a href=\"$targetpage?page=2\">&nbsp; 2&nbsp; </a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">&nbsp; $counter &nbsp; </span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">&nbsp; $counter &nbsp; </a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">&nbsp; next &raquo;</a>";
		else
			$pagination.= "<span class=\"disabled\"> &nbsp; next &raquo;</span>";
		$pagination.= "</div>\n";		
	}
?>
<html>
<head>
</head>
<style type="text/css">
{
iv.pagination {
	padding: 3px;
	margin: 3px;
}

div.pagination a {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #AAAADD;
	
	text-decoration: none; /* no underline */
	color: #000099;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #000099;

	color: #000;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
		border: 1px solid #000099;
		
		font-weight: bold;
		background-color: #000099;
		color: #FFF;
	}
	div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
	
		color: #DDD;
	}
	
}
<body>
	
</body>

	