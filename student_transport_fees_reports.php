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

 
<form action="" method="post" class="form_container left_label">
                                    

              <ul>
               
               
               
          
           
               <li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Search</h4>     </li>
               <li>
								<div class="form_grid_12">
									<label class="field_title"> Fees month </label>
									<div class="form_input">
										<select style=" width:300px" name="fees_term" class="chzn-select" tabindex="13" onChange="getForm('ajax_stream_code.php?class_id='+this.value)">
											<option value="" selected="selected"> - Select fees month - </option>
							<?php
							 $sql="SELECT * FROM month";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
               
               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> DATE FROM  </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="from_date" type="text" class="datepicker" />
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
				</li>
                                
							  
                            <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> TO </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="to_date" type="text" class="datepicker" />
											
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
           <div class="btn_30_blue" style="float:right">
								
			</div>
                            
                            
                            
          </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Student Fees Report</h6>
					</div>
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							
							<th>
								S.No.
							</th>
                             <th>
								Deposit date from
							</th>
                             <th>
								Deposit date to
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
								Session  
							</th>
							
						</tr>
						</thead>
						<tbody>
                        <?php 
						  if($_POST['fees_term']!="")
						  {
							
							 $_SESSION['fees_term']=$_POST['fees_term'];
							}
						  if($_POST['from_date']!="")
						  {
							$_SESSION['from_date']=$_POST['from_date'];
							
							
						  }
							if($_POST['to_date']!="")
						   {
							
							$_SESSION['to_date']=$_POST['to_date'];
							}
					
					/*$sql="SELECT * FROM student_fees_detail where session='".$_SESSION['session']."'";
					$res=mysql_query($sql);*/
					      $mytablename="student_fees_detail";
				          include_once("student_fees_reports_pagination.php");
						  	$i=1;
							if($_GET['page']=="")
							{
								$_GET['page']=1;
								
								}
								
								$i=($_GET['page']-1)*$limit+1;
							while($row=mysql_fetch_array($result_res))
							{
								
								$sql="SELECT * FROM student_info where registration_no='".$row[1]."' ";
	                           $student_info=mysql_fetch_array(mysql_query($sql));
							   
							   $sql1="SELECT * FROM class where class_id='".$student_info['class']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
							   $sql1="SELECT * FROM fees_term where fees_term_id='".$row['fees_term']."' ";
	                           $fees_term=mysql_fetch_array(mysql_query($sql1));
								
								
								?>
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
						 <td class="center">
								<?php echo $_SESSION['from_date']; ?>
							</td>
							
                             <td class="center">
								<?php echo $_SESSION['to_date']; ?>
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
								<?php echo $row['fees_amount']; ?>
							</td>
							
                            
							
                            <td class="center">
								<?php echo $row['session']; ?>
							</td>
							
							
							
						</tr>
						
						<?php $i++;} ?>
                        <?php if($pagination!=""){?>
                        <tr>
                        <td colspan="7"><?php echo $pagination;?></td>
                        
                        
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