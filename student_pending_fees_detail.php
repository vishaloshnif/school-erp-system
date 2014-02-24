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
<h3 style="padding-left:20px; color:#1c75bc">Student Pending Fees Detail</h3>

          <div class="grid_12">

 <script language="javascript"></script>
<form action="student_pending_fees_detail.php" method="post" class="form_container left_label">
                                    

              <ul>
               
               
               
          
           
               <li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Search</h4>     </li>
               
               
               
                                
							  
                                
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Fees term </label>
									<div class="form_input">
										<select  style=" width:300px" name="fees_term" class="chzn-select" tabindex="13" onChange="getForm('ajax_stream_code.php?class_id='+this.value)">
											<option value="" selected="selected"> - Select fees term - </option>
							<?php
							 $sql="SELECT * FROM fees_term ";
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
										<select  style=" width:300px" name="class" class="chzn-select" tabindex="13" onChange="getForm('ajax_stream_code.php?class_id='+this.value)">
											<option value="" selected="selected"> - Select Class - </option>
							<?php
							 $sql="SELECT * FROM class ";
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
								<div class="form_grid_12 multiline">
									<label class="field_title">Search By Name<span style="font-size:10px;">&nbsp;&nbsp;&nbsp;(optional)</span></label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="name" type="text" />
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
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
             
                            
                            
          </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Student Pending  Fees Detail</h6>
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
								 Fees Term
							</th>
                               
                          <th>
								Student   Fees
							</th>
                            <th>
								Pending   Fees
							</th>
                            <th>
								Session  
							</th>
							
						</tr>
						</thead>
						<tbody>
                        <?php 
				/*	 $sql="SELECT * FROM student_info where (registration_no not in (SELECT registration_no FROM student_fees_detail where session='".$_SESSION['session']."' and fees_term='".$_POST['fees_term']."') and class='".$_POST['class']."' ) or (name like '%".$_POST['name']."%') and session='".$_SESSION['session']."' ";
						
						if($_POST['stream']!="")
						{
							$sql.=" and stream='".$_POST['stream']."'";
							
							}
							
	                           $student_info11=mysql_query($sql);*/
							   $mytablename="student_info";
							   include_once("student_pending_fees_pagination.php");
					
					$i=1;
					$num=mysql_num_rows($student_info11);
					        if($num!=0)
							{
							
					
							while($row=mysql_fetch_array($student_info11))
							{
								
								$sql="SELECT * FROM student_info where registration_no='".$row[1]."' ";
	                           $student_info=mysql_fetch_array(mysql_query($sql));
							   
							    $sql_pending="select sum(fees_amount) from student_fees_detail where registration_no='".$student_info['registration_no']."'  and session='".$_SESSION['session']."'";
	$deposit_amount=mysql_fetch_array(mysql_query($sql_pending));
							   
							   
							   $sql="SELECT * FROM fees_package where package_id='".$row['admission_fee']."' ";
	                           $res=mysql_query($sql);
								$row3=mysql_fetch_array($res);
								
							   $sql1="SELECT * FROM class where class_id='".$student_info['class']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
							   $sql1="SELECT * FROM fees_term where fees_term_id='".$_POST['fees_term']."' ";
	                           $fees_term=mysql_fetch_array(mysql_query($sql1));
								
								
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
								<?php echo $fees_term['term_name']; ?>
							</td>
                            <td class="center">
								<?php echo $row3['package_fees']; ?>
							</td>
							
                            <td class="center">
								<?php echo $pending_amount=$row3['package_fees']-$deposit_amount[0];?>
							</td>
							
                            <td class="center">
								<?php echo $row['session']; ?>
							</td>
							
							
							
						</tr>
						
						<?php $i++;} ?>
                       
						<?php }else{ ?>
						
						
						<tr><td colspan="7" style="color:#F00;">No result found.......</td></tr>
						
						
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