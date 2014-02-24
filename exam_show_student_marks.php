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
	mysql_query("delete from exam_add_maximum_marks where exam_max_marks_id='".$_GET['sid']."'");	
		
	}
	?>
	
	
	<div id="content">
		<div class="grid_container">
<h3 style="padding-left:20px; color:#1c75bc">Student Exam Marks</h3>
          <div class="grid_12">

 

           <div class="btn_30_blue" style="float:right">
								<a href="entry_exam_add_student_marks.php"><span style="width:140px">Add Student  Marks </span></a>
							</div>
                            
                            
                            
                            </div>
			<div class="grid_12">
				<div class="widget_wrap">
				  <div class="widget_top">
				    <div class="widget_top"> <span class="h_icon list_images"></span>
				      <h6>Student Exam Marks</h6>
			        </div>
				    <h6>&nbsp;</h6>
				  </div>
				  <div class="widget_content">
						
					  <table class="display data_tbl" >
						<thead>
						<tr>
							
                           <th class="center">
							S.No.	
							</th>
                           
							<th>
								Registration No 	
							</th>
							<th>
								Student Name
							</th>
                            <th>
								Class Name
							</th>
                            
                            <th>
							stream Name
							</th>
                            <th>
								Subject Name
							</th>
                            <th>
							 Term Name
							</th>
                           
                            <th>
							 Marks
							</th>
                            
                           
							
                            <th>
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                        <?php 
						$i=1;
				 $sql="SELECT * FROM  exam_subject_marks where session='".$_SESSION['session']."'";
					$res=mysql_query($sql);
				
							while($row=mysql_fetch_array($res))
							{
								 $class_student="select * from student_info where registration_no='".$row['registration_no']."'";
								$values_=mysql_query($class_student);
								$row_student=mysql_fetch_array($values_);
								
								
								
								 $class="select * from class where class_id='".$row['class_id']."'";
								$values=mysql_query($class);
								$rows=mysql_fetch_array($values);
								
								$class1="select * from stream where stream_id='".$row['stream_id']."'";
								$values1=mysql_query($class1);
								$rows1=mysql_fetch_array($values1);
								
								$class2="select * from subject where subject_id='".$row['subject_id']."'";
								$values2=mysql_query($class2);
								$rows2=mysql_fetch_array($values2);
								
								$class3="select * from exam_nuber_of_term where term_id='".$row['term_id']."'";
								$values3=mysql_query($class3);
								$rows3=mysql_fetch_array($values3);
								
								?>		
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
						<td class="center">
								<?php echo $row['registration_no']; ?>
					
							</td>
                            
                            <td class="center">
								<?php echo $row_student['name']; ?>
					
							</td>
                        	<td class="center">
								<?php echo $rows['class_name']; ?>
					
							</td>
                    
                            <td class="center">
								<?php echo $rows1['stream_name']; ?>
					
							</td>
                        
                        	<td class="center">
								<?php echo $rows2['subject_name']; ?>
					
							</td>
                        
                        
                        <td class="center">
								<?php echo $rows3['term_name']; ?>
					
							</td>
                            <td class="center">
								<?php echo $row['marks']; ?>
							</td>
							 
							
							
							
							<td class="center">
								<span><a class="action-icons c-edit" href="exam_edit_maximum_marks.php?sid=<?php echo $row[0]; ?>" title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="exam_show_maximum_marks.php?sid=<?php echo $row['exam_max_marks_id']; ?>" title="delete" onClick="return checkform1()">Delete</a></span>
							</td>
						</tr>
						
						<?php $i++;} ?>
						
						</tbody>
						
						</table>
                        
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
                        
					</div>
				</div>
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
<?php include_once("includes/footer.php");?>