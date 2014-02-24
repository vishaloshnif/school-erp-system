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

          
			<div class="grid_12">
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">Student Detail</h3>
                    
                    
               
               	<form action="" method="post" class="form_container left_label">
                                    

              <ul>
               
               
               
          
           
               <li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Search</h4>     </li>
               
               
               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Name</label>
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
									<label class="field_title"> Class Name </label>
									<div class="form_input">
										<select style=" width:300px" name="class" class="chzn-select" tabindex="13"  onChange="getForm('ajax_stream_code.php?class_id='+this.value)">
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
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Stream</label>
									<div class="form_input">
										<select style=" width:300px" name="stream" class="chzn-select" tabindex="13">
										<option value="">---select stream---</option>
                                        	<?php
							 $sql="SELECT * FROM stream";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['stream_id']; ?>"><?php echo $row['stream_name']; ?></option>
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
								 S R Number
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
						if($_POST['name']!=""&&$_POST['class']==""&&$_POST['stream']=="")
						{
							 $sql10="SELECT * FROM student_info where name like '%".$_POST['name']."%' and session='".$_SESSION['session']."'";
							                                                                         
						}
						else if($_POST['name']==""&&$_POST['class']!=""&&$_POST['stream']=="")
						{
							$sql10="SELECT * FROM student_info where class ='".$_POST['class']."' and session='".$_SESSION['session']."'";
							                                                                         
						}
						
						else if($_POST['name']==""&&$_POST['class']==""&&$_POST['stream']!="")
						{
								$sql10="SELECT * FROM student_info where stream ='".$_POST['stream']."' and session='".$_SESSION['session']."'";
							                                                                         
						}
						else if($_POST['name']!=""&&$_POST['class']!=""&&$_POST['stream']=="")
						{
							$sql10="SELECT * FROM student_info where name like '%".$_POST['name']."%' and  class ='".$_POST['class']."' and session='".$_SESSION['session']."'";
							                                                                         
						}
						else if($_POST['name']==""&&$_POST['class']!=""&&$_POST['stream']!="")
						{
								$sql10="SELECT * FROM student_info where stream ='".$_POST['stream']."'  and  class ='".$_POST['class']."' and session='".$_SESSION['session']."'";
							                                                                         
						}
						
						else if($_POST['name']!=""&&$_POST['class']==""&&$_POST['stream']!="")
						{
							$sql10="SELECT * FROM student_info where name like '%".$_POST['name']."%' and  stream ='".$_POST['stream']."' and session='".$_SESSION['session']."'";
							                                                                         
						}
						
						else if($_POST['name']!=""&&$_POST['class']!=""&&$_POST['stream']!="")
						{
							
							     $sql10="SELECT * FROM student_info where name like '%".$_POST['name']."%' and  stream ='".$_POST['stream']."' and  class ='".$_POST['class']."' and session='".$_SESSION['session']."'";                                                                    
						}
						
						$res=mysql_query($sql10);
						$num=mysql_num_rows($res);
						if($num!=0)
						{
						while($row_value=mysql_fetch_array($res))
						{
							$sql1="SELECT * FROM class where class_id='".$row_value['class']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
						
						?>
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
                            <td class="center">
								<?php echo $row_value['registration_no'];?>
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
							<a class="action-icons c-add" href="add_student_fees.php?registration_no=<?php echo $row_value['registration_no'];?>" original-title="select">Go</a>	
							</td>
						</tr>
                        
						<?php $i++;} } else{?>
                        <tr>
							
							<td class="center" colspan="5" style="color:#F00;">Result not found
								
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