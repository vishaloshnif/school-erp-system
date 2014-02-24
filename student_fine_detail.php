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
<?php include_once("includes/library_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">
<h3 style="padding-left:20px; color:#1c75bc">Student fine  Detail</h3>

          <div class="grid_12">

 

           <div class="btn_30_blue" style="float:right">
				<a href="entry_student_fine_detail.php"><span style="width:140px"> Individual Student Fine </span></a>				
			</div>
                            
                            
                            
          </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Student fine Detail</h6>
					</div>
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							
							<th>
								S.No.
							</th>
							<th>
								Student   Name
							</th>
                          <th>
								Class
							</th>
                          <th>
								Book Name
							</th>
                               
                          <th>
								Book number
							</th>
                            <th>
								Fine Amount
							</th>
                             
                            <th>
								Session  
							</th>
							<th>
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                        <?php 
					
					$sql="SELECT * FROM student_fine_detail where session='".$_SESSION['session']."' and fine_amount>0";
					$res=mysql_query($sql);
					    //  $mytablename="student_fees_detail";
				          //include_once("fees_manager_pagination.php");
						  	$i=1;
							/*if($_GET['page']=="")
							{
								$_GET['page']=1;
								
								}
								
								$i=($_GET['page']-1)*$limit+1;*/
							while($row=mysql_fetch_array($res))
							{
								
								$sql="SELECT * FROM student_info where registration_no='".$row[1]."' ";
	                           $student_info=mysql_fetch_array(mysql_query($sql));
							   
							   $sql1="SELECT * FROM class where class_id='".$student_info['class']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
							   $sql1="SELECT * FROM book_manager where book_number='".$row['book_number']."' ";
	                           $book_detail=mysql_fetch_array(mysql_query($sql1));
								
								
								?>
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
						
                            <td class="center">
								<?php echo $student_info['name']; ?>
							</td>
                             <td class="center">
								<?php echo $class['class_name']; ?>
							</td>
							<td class="center">
								<?php echo $book_detail['book_name']; ?>
							</td>
                            <td class="center">
								<?php echo $book_detail['book_number']; ?>
							</td>
							
                            <td class="center">
								<?php echo $row['fine_amount']; ?>
							</td>
							
                            <td class="center">
								<?php echo $row['session']; ?>
							</td>
							
							
							<td class="center">
							<span><a class="action-icons c-edit" href="library_edit_student_fine_detail.php?sid=<?php echo $row[0]; ?>" title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="library_delete_student_fine_detail.php?sid=<?php echo $row[0]; ?>" title="delete" onClick="return checkform1()">Delete</a></span>
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