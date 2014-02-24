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
<?php include_once("includes/transport_setting_sidebar.php");
if($_GET['sid']!='')
{
mysql_query("delete from  transport_student_detail where transport_id='".$_GET['sid']."'");	
}

?>


<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">
        <h3 style="padding-left:20px; color:#1c75bc">Student Bus   Detail</h3>

        <div class="grid_12">
				
					
                    
               
               	<form action="transport_student_result.php" method="post" class="form_container left_label">
                                    

              <ul>
               
               
               
          
           
               <li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Search</h4>     </li>
               
               
               
                                
							  
                                
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Class Name </label>
									<div class="form_input">
										<select style=" width:300px" name="class" class="chzn-select" tabindex="13" onChange="getForm('ajax_stream_code.php?class_id='+this.value)">
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
								<div class="form_grid_12">
									<label class="field_title">Select Route</label>
									<div class="form_input">
										<select name="route_id" style=" width:300px; height:30px;"  class="chzn-select" tabindex="13">
											<option value=""></option>
											<?php 
											$sql="select * from transport_add_route";
											$ro=mysql_query($sql);
											while($row=mysql_fetch_array($ro)){
											
											?>
                                            											<option value="<?php echo $row['route_id'];?>"><?php echo $row['route_name'];?></option><?php }?>
										</select>
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

 

           <div class="btn_30_blue" style="float:right">
								<a href="transport_entry_add_student.php"><span style="width:140px">Add Student Bus</span></a>
							</div>
                            
                            
                            
                            </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Vehicle  Managment</h6>
					</div>
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							<th>
								S.No.
							</th>
                              <th>
							Roll Number
							</th>
                            <th>
							Student Name
							</th>
                            <th>
							Class
							</th>
                          
							<th>
							Vehile Number 
							</th>
                           <th>
							Destination 
							</th>
                            
                             <th>
							Bus fees
							</th>
                            
                           <th>
								 Action
							</th>
						
                        </tr>
						</thead>
						<tbody>
						<?php 
						
						$i=1;
						if($_POST['route_id']!=""&&$_POST['class']==""&&$_POST['stream']=="")
						{
							 $sql10="SELECT * FROM transport_student_detail where route_id= '".$_POST['route_id']."' and session='".$_SESSION['session']."'";
							                                                                         
						}
						else if($_POST['route_id']==""&&$_POST['class']!=""&&$_POST['stream']=="")
						{
							 $sql10="SELECT * FROM transport_student_detail  where registration_no in (select registration_no from student_info where class ='".$_POST['class']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."'";
							                                                                         
						}
						
						else if($_POST['route_id']==""&&$_POST['class']==""&&$_POST['stream']!="")
						{
								$sql10="SELECT * FROM transport_student_detail where registration_no in (select registration_no from student_info where stream ='".$_POST['stream']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."' ";
							                                                                         
						}
						else if($_POST['route_id']!=""&&$_POST['class']!=""&&$_POST['stream']=="")
						{
							$sql10="SELECT * FROM transport_student_detail where route_id= '".$_POST['route_id']."' and   registration_no in (select registration_no from student_info where class ='".$_POST['class']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."' ";
							                                                                         
						}
						else if($_POST['route_id']==""&&$_POST['class']!=""&&$_POST['stream']!="")
						{
								$sql10="SELECT * FROM transport_student_detail where registration_no in (select registration_no from student_info where class ='".$_POST['class']."' and stream ='".$_POST['stream']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."'";
							                                                                         
						}
						
						else if($_POST['route_id']!=""&&$_POST['class']==""&&$_POST['stream']!="")
						{
							$sql10="SELECT * FROM transport_student_detail where route_id= '".$_POST['route_id']."' and  registration_no in (select registration_no from student_info where stream ='".$_POST['stream']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."'";
							                                                                         
						}
						
						else if($_POST['route_id']!=""&&$_POST['class']!=""&&$_POST['stream']!="")
						{
							
							     $sql10="SELECT * FROM transport_student_detail where route_id= '".$_POST['route_id']."' and  registration_no in (select registration_no from student_info where class ='".$_POST['class']."' and stream ='".$_POST['stream']."' and session='".$_SESSION['session']."') and session='".$_SESSION['session']."'";                                                                    
						}
						else
					    {
						   $sql10="SELECT * FROM transport_student_detail where  session='".$_SESSION['session']."'";
						}
						//echo  $sql10;
						//$arr=array("ram","shyam","kamlesh","joshi");
						//echo $strng=implode(",",$arr);
						$i=0;
						//$sql="select * from  transport_student_detail";
						$sql_value=mysql_query($sql10);
						while($sql_row=mysql_fetch_array($sql_value)){
						$i++;
                       $qq="select * from student_info where registration_no='".$sql_row['registration_no']."'  and session='".$_SESSION['session']."'";
						$student_info=mysql_fetch_array(mysql_query($qq));
						
						$sql_route="select * from transport_add_route where route_id='".$sql_row['route_id']."'";
						$sql_value_route=mysql_query($sql_route);
						$sql_transport_row=mysql_fetch_array($sql_value_route);
						
						$sql_vechile_id="select * from transport_add_vechile where vechile_id='".$sql_row['vechile_id']."'";
						$sql_value_vechile_id=mysql_query($sql_vechile_id);
						$sql_vechile_id_row=mysql_fetch_array($sql_value_vechile_id);
						
								$sql1="SELECT * FROM class where class_id='".$sql_row['class_id']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
						$sql2="SELECT * FROM stream where stream_id='".$sql_row['stream_id']."'";
					$stream=mysql_fetch_array(mysql_query($sql2));
						
						?>
                        <tr>
                        
                        <td class="center">
								<?php echo $i;?>						</td>
								<td class="center">
								<?php echo $sql_row[1];?>						</td>
                                
                                <td class="center">
								<?php echo $student_info['name'];?>						</td>
							
                            
                            <td class="center">
								<?php echo $class['class_name'];?>						</td>
						
                                 <td class="center">
								<?php echo $sql_vechile_id_row[1];?>
							</td>
                            
							<td class="center">
                            
								<?php echo $sql_transport_row['route_name'];?>
							</td>
                           
                            <td class="center">
                            
								<?php echo $sql_transport_row['cost'];?>
							</td>
                            
							<td class="center">
								<span><a class="action-icons c-edit" href="transport_edit_student.php?sid=<?php echo $sql_row[0]; ?>" title="Edit">Edit</a></span>
                                <span><a class="action-icons c-delete" href=" transport_student_detail.php?sid=<?php echo $sql_row[0]; ?>" title="delete" onClick="return checkform1()">Delete</a></span>
	
							</td>
						</tr>
						<?php }?>
						
						
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
</body>
</html>