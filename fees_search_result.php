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
<?php include_once("includes/fees_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">
<h3 style="padding-left:20px; color:#1c75bc">Student Fees Detail</h3>

          <div class="grid_12">

 
<form action="fees_search_result.php" method="post" class="form_container left_label">
                                    

              <ul>
               
               
               
          
           
               <li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Search</h4>     </li>
               
               
               
                                
							  
                                
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Fees term </label>
									<div class="form_input">
										<select style=" width:300px" name="fees_term" class="chzn-select" tabindex="13" onChange="getForm('ajax_stream_code.php?class_id='+this.value)">
											<option value="" selected="selected"> - Select fees term - </option>
							<?php
							 $sql="SELECT * FROM fees_term";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['fees_term_id']; ?>"><?php echo $row['term_name']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Class Name </label>
									<div class="form_input">
										<select style=" width:300px" name="class" class="chzn-select" tabindex="13" onChange="getForm('ajax_stream_code.php?class_id='+this.value)">
											<option value="" selected="selected"> - Select Class - </option>
							<?php
							 $sql="SELECT * FROM class";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                <li id="stream_code">
								
								</li>
                                
                                
                                
                                <li>
								<div class="form_grid_12">
									<div class="form_input">
										
										<button type="submit" name="submit" class="btn_small btn_blue"><span>Search</span></button>
										
										
										
									</div>
								</div>
								</li>
                                
</ul>


                </form>
           <div class="btn_30_blue" style="float:right">
								<a href="add_student_fees.php"><span style="width:140px">Add Student Fees  </span></a>
			</div>
                            
                            
                            
          </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Student Fees Detail</h6>
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
								 Fees Term
							</th>
                               
                          <th>
								Student   Fees
							</th>
                            <th>
								Deposit date
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
						
						$i=1;
						if($_POST['fees_term']!=""&&$_POST['class']==""&&$_POST['stream']=="")
						{
							 $sql10="SELECT * FROM student_fees_detail where fees_term= '".$_POST['fees_term']."' and session='".$_SESSION['session']."'";
							                                                                         
						}
						else if($_POST['fees_term']==""&&$_POST['class']!=""&&$_POST['stream']=="")
						{
							 $sql10="SELECT * FROM student_fees_detail  where registration_no in (select registration_no from student_info where class ='".$_POST['class']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."'";
							                                                                         
						}
						
						else if($_POST['fees_term']==""&&$_POST['class']==""&&$_POST['stream']!="")
						{
								$sql10="SELECT * FROM student_fees_detail where registration_no in (select registration_no from student_info where stream ='".$_POST['stream']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."' ";
							                                                                         
						}
						else if($_POST['fees_term']!=""&&$_POST['class']!=""&&$_POST['stream']=="")
						{
							$sql10="SELECT * FROM student_fees_detail where fees_term= '".$_POST['fees_term']."' and   registration_no in (select registration_no from student_info where class ='".$_POST['class']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."' ";
							                                                                         
						}
						else if($_POST['fees_term']==""&&$_POST['class']!=""&&$_POST['stream']!="")
						{
								$sql10="SELECT * FROM student_fees_detail where registration_no in (select registration_no from student_info where class ='".$_POST['class']."' and stream ='".$_POST['stream']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."'";
							                                                                         
						}
						
						else if($_POST['fees_term']!=""&&$_POST['class']==""&&$_POST['stream']!="")
						{
							$sql10="SELECT * FROM student_fees_detail where fees_term= '".$_POST['fees_term']."' and  registration_no in (select registration_no from student_info where stream ='".$_POST['stream']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."'";
							                                                                         
						}
						
						else if($_POST['fees_term']!=""&&$_POST['class']!=""&&$_POST['stream']!="")
						{
							
							     $sql10="SELECT * FROM student_fees_detail where fees_term= '".$_POST['fees_term']."' and  registration_no in (select registration_no from student_info where class ='".$_POST['class']."' and stream ='".$_POST['stream']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."'";                                                                    
						}
						else
					    {
						   $sql10="SELECT * FROM student_fees_detail where  session='".$_SESSION['session']."'";
						}
						$i=1;
					
					$res=mysql_query($sql10);
				
							while($row=mysql_fetch_array($res))
							{
								
								$sql="SELECT * FROM student_info where registration_no='".$row[1]."'  and  session='".$_SESSION['session']."'";
	                           $student_fees_detail=mysql_fetch_array(mysql_query($sql));
							   
							   $sql1="SELECT * FROM fees_term where fees_term_id='".$row['fees_term']."'";
	                           $fees_term=mysql_fetch_array(mysql_query($sql1));
								
								
								?>
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
						
                            <td class="center">
								<?php echo $student_fees_detail['name']; ?>
							</td>
							<td class="center">
								<?php echo $fees_term['term_name']; ?>
							</td>
                            <td class="center">
								<?php echo $row['fees_amount']; ?>
							</td>
							
                            <td class="center">
								<?php echo date('d-m-Y',strtotime($row['deposit_date'])); ?>
							</td>
							
                            <td class="center">
								<?php echo $row['session']; ?>
							</td>
							
							
							<td class="center">
								<span><a class="action-icons c-edit" href="edit_fees_package.php?sid=<?php echo $row[0]; ?>" title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="delete_fees_package.php?sid=<?php echo $row[0]; ?>" title="delete" onClick="return checkform1()">Delete</a></span>
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