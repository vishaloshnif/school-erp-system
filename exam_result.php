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
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">Student Result</h3>
                    
                    <?php 
					if(isset($_POST['submit_number']))
					{
					header('location:exam_result.php?id='.$_POST['registration_no']);
					}
					?>
               
               	<form action="" method="post" class="form_container left_label">
                                    

              <ul>
               
               
               
          
           
               <li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Search</h4>     </li>
               
               
               <li>
								<div class="form_grid_12">
									<label class="field_title">Registration No </label>
									<div class="form_input">
										<select style=" width:300px"  class="chzn-select" tabindex="13" name="registration_no">
											<option value="" selected="selected"> - Select Registration No - </option>
							<?php
							 $sql="SELECT * FROM student_info";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['registration_no']; ?>"><?php echo $row['registration_no']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                
                                
							  <li>
								<div class="form_grid_12">
									<div class="form_input">
										
										<button type="submit" name="submit_number" class="btn_small btn_blue"><span>Search</span></button>
										
										
										
									</div>
								</div>
								</li>
                    
</ul>


                </form>  

				<form action="" method="post" class="form_container left_label">
                                    

              <ul>
               
               
               
          
           
               
               <?php
			   $id=$_GET['id'];
			   $id1=$_GET['id1'];
			   $names="select * from student_info where registration_no='$id'";
			   $values=mysql_query($names);
			   $rows=mysql_fetch_array($values);
			   
			    ?>
               
               <li>
								<div class="form_grid_12">
									<label class="field_title">Student Name</label>
									<div class="form_input">
								<?php echo $rows['name']?>
									</div>
								</div>
								</li>
                                
				
</ul>


                </form>	
			
			</div>
            
            <div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Student Detail</h6>
					</div>
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							
							<th>
								S.No.
							</th>
							<th>
								 Student Name 
							</th>
                            <th>
								Class
							</th>
                             <th>
								Email
							</th>
							
							<th>
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                       <?php 
					   $i=1;
					   
					   $mytablename="student_info";
						   //$sql10="SELECT * FROM student_info";
						include("student_detail_pagination.php");
						//$res=mysql_query($sql10);
						 $num=mysql_num_rows($result_res);
						if($total_pages!=0)
						{
						while($row_value=mysql_fetch_array($result_res))
						{
							$sql1="SELECT * FROM class where class_id='".$row_value['class']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
						
						?>
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
						<td class="center">
								<?php echo $row_value['name'];?>
							</td>
                            <td class="center">
								<?php echo $class['class_name'];?>
							</td>
							
							<td class="center">
								<?php echo $row_value['s_email'];?>
							</td>
							
							
							<td class="center">
							<a class="action-icons c-add" href="view_student_detail.php?student_id=<?php echo $row_value[0];?>" original-title="View Profile">View Profile</a>	<span><a class="action-icons c-edit" href="edit_admission.php?student_id=<?php echo $row_value[0];?>" title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="delete_admission.php?sid=<?php echo $row_value[0];?>" title="delete" onClick="return checkform1()">Delete</a></span>
							</td>
						</tr>
                        
						<?php $i++;} } else{?>
                        <tr>
							
							<td class="center" colspan="5" style="color:#F00;">Result not found
								
							</td>
						
						</tr>
                        <?php } ?>
						
                        <?php if($pagination!=""){?>
						
						<tr>
							
							<td class="center" colspan="5" style="color:#F00;"><?php echo $pagination;?>
								
							</td>
						
						</tr>
						<?php } ?>
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