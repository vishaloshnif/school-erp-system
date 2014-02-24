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

<?php include_once("includes/staff_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">
        	<div class="grid_12">
 <div class="btn_30_blue" style="float:right; margin-top:10px;">
								<a href="add_new_staff_detail.php"><span style="width:140px">Add Staff  </span></a>
			</div>
         
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">Staff Detail</h3>
                    
                    
               
               	  

					
			
			</div>
            
            <div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Staff Detail</h6>
					</div>
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							
							<th>
								Emp Id
							</th>
							<th>
								 First Name 
							</th>
                            
                            <th>
								 Email 
							</th>
                            <th>
								 Gender 
							</th>
                            
                            <th>
								 Department
							</th>
							
							<th>
								Category
							</th>
                            <th>
								 Position 
							</th>
                            <th>
								 Qualification 
							</th>
                            <th>
								Job Title 
							</th>
                            <th>
								 Experience
							</th>
                              <th>
								 Employee photo
							</th>
                            <th>
								 Action
							</th>
						</tr>
						</thead>
                         <?php 
						 $i='1';
						 include_once('config/config.inc.php');
				
					$sql="select * from staff_employee";
					$res=mysql_query($sql);
				while($row=mysql_fetch_array($res))
				{
					 $staff="select * from staff_department where staff_department_id='".$row['staff_department_id']."'";
					$staff_sel=mysql_query($staff);
					$staff_sel_row=mysql_fetch_array($staff_sel);
					
					
					 $staff_cat="select * from staff_category where staff_cat_id='".$row['staff_cat_id']."'";
					$staff_cat_sel=mysql_query($staff_cat);
					$staff_sel_cat=mysql_fetch_array($staff_cat_sel);
					
					 $staff_pos="select * from staff_position where staff_pos_id='".$row['staff_pos_id']."'";
					$staff_pos_sel=mysql_query($staff_pos);
					$staff_sel_pos=mysql_fetch_array($staff_pos_sel);
					
					 $staff_qua="select * from staff_qualification where staff_qualification_id='".$row['staff_qualification_id']."'";
					$staff_qua_sel=mysql_query($staff_qua);
					$staff_sel_qua=mysql_fetch_array($staff_qua_sel);
					
					
					
					
					?>
						<tbody>
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $row['emp_id'];?></a>
							</td>
						<td class="center">
							<?php echo $row['first'];?>
							</td>
                            <td class="center">
								<?php echo $row['email'];?>
							</td>
                            <td class="center">
								<?php echo $row['gender'];?>
							</td>
                            <td class="center">
						<?php echo $staff_sel_row['staff_department'];?>
							</td>
                            <td class="center">
							<?php echo $staff_sel_cat['staff_category'];?>
							</td>
                            <td class="center">
						<?php echo $staff_sel_pos['staff_position'];?>
							</td>
                            <td class="center">
				<?php echo $staff_sel_qua['staff_qualification'];?>
							</td>
                            <td class="center">
							<?php echo $row['job_title'];?>
							</td>
                            <td class="center">
								<?php echo $row['exp'];?>
							</td>
                            <td class="center">
								<img style="height:40px; width:40px" src="employee_image/<?php echo $row['image'];?>">
							</td>
							
							
							
							
							<td class="center">
							<a class="action-icons c-add" href="view_staff_employee.php?staff_id=<?php echo $row['staff_id'];?>" original-title="View full Profile">View Profile</a>	<span><a class="action-icons c-edit" href="edit_staf_employee_detail.php?staff_id=<?php echo $row['staff_id']?>" title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="delete_staff.php?staff_id=<?php echo $row['staff_id'];?>" title="delete" onClick="return checkform1()">Delete</a></span>
							</td>
						</tr><?php $i++; }?>
						
						
						
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