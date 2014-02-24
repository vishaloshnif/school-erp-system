<?php include_once("includes/header.php");?>
<div class="page_title">
	<!--	<span class="title_icon"><span class="computer_imac"></span></span>
		<h3>Dashboard</h3>-->
		<div class="top_search">
			<form action="#" method="post">
				<ul id="search_box">
					<li>
					<input name="" type="text" class="search_input" id="suggest1" placeholder="Search...">
					</li>
					<li>
					<input name="" type="submit" value="" class="search_btn">
					</li>
				</ul>
			</form>
		</div>
	</div>
<?php include_once("includes/exam_setting_sidebar.php");?>

<div id="container">
	<?php 
	if(isset($_GET['sid']))
	{
	mysql_query("delete from exam_time_table where time_table_id='".$_GET['sid']."'");	
		
	}
	?>
	
<div id="container">
	
	<script type="text/javascript" language="javascript">
									frm2=document.del;
									function checkform1()
									{
										if(confirm("Are you sure you want to delete"))
										{
											return true;
										}else
										{
											return false;
											
											}
									}
								</script>
	
	<div id="content">
		<div class="grid_container">
<h3 style="padding-left:20px; color:#1c75bc">Exam Time Table</h3>
          <div class="grid_12">

 

           <div class="btn_30_blue" style="float:right">
								<a href="exam_date.php"><span style="width:140px">Add New Exam Date </span></a>
							</div>
                            
                            
                            
                            </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Exam Time Table Detail</h6>
					</div>
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							
							<th>
								S.No.
							</th>
							<th>
							Class Name
							</th>
                            <th>
								Streem Name
							</th>
							
							
						    <th>
								Subject
							</th>
							
							<th>
								 Exam Date
							</th>
						<th>
								 Action
							</th>
						
                        </tr>
						</thead>
						<tbody>
						 <?php 
						$i=0;
			 $sql="SELECT * FROM  exam_time_table where session='".$_SESSION['session']."'";
					$res=mysql_query($sql);
				
							while($row=mysql_fetch_array($res))
							{
								$i++;
						 $class="select * from class where class_id='".$row['class_id']."'";
								$values=mysql_query($class);
								$rows=mysql_fetch_array($values);
							
					 $class1="select * from stream where stream_id='".$row['stream_id']."'";
								$values1=mysql_query($class1);
								$rows_stream=mysql_fetch_array($values1);
								
						 $class_subject="select * from subject where subject_id='".$row['subject_id']."'";
								$values_subject=mysql_query($class_subject);
								$rows_subject=mysql_fetch_array($values_subject);
								
								
								?>		
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
						<td class="center">
								<?php echo $rows['class_name']; ?>
					
							</td>
                        
                       	<td class="center">
							<span style="color:#f04508"><?php echo $rows_stream['stream_name']; ?>
					</span>
							</td>
							
						<td class="center">
							<?php echo $rows_subject['subject_name']; ?>
							</td>
							<td class="center">
							<span style="color:#f04508"><?php echo $row['date']; ?></span>
							</td>
							
							
							
							
							<td class="center">
								<span><a class="action-icons c-edit" href="exam_edit_time_table.php?sid=<?php echo $row[0]; ?>" title="Edit">Edit</a></span>
                                <span><a class="action-icons c-delete" href="exam_time_table_detail.php?sid=<?php echo $row['time_table_id']; ?>" title="delete" onClick="return checkform1()">Delete</a></span>
							</td>
						</tr>
						
						
						<?php }?>
						</tbody>
						
						</table>
                        
                        
                        
					</div>
				</div>
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div></div>
</body>
</html>