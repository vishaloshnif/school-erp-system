<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	// $package_name = $_POST['package_name'];
	 //$class_id = $_POST['class_id'];
	//$school_logo = $_POST['school_logo'];
	if($_POST['pending_amount']>=$_POST['fees_amount'])
	{
	 $sql1="SELECT * FROM  student_transport_fees_detail where registration_no='".$_POST['registration_no']."' and fees_term='".$_POST['fees_term']."' and session='".$_SESSION['session']."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
		
		
		if($_POST['registration_no']!=""&&$_POST['fees_term']!=""&&$_POST['fees_amount']!="")
		{
		 $sql3="INSERT INTO  student_transport_fees_detail(registration_no,fees_term,fees_amount,session) VALUES ('".$_POST['registration_no']."','".$_POST['fees_term']."','".$_POST['fees_amount']."','".$_SESSION['session']."')";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		header("Location:student_transport_fees.php?msg=1");
		}else
		{    header("location:add_student_transport_fees.php?error=2");
			
			}
		
	}
	else
	{
		header("location:add_student_fees.php?error=1");
	}
	}
	else
	{
		header("location:add_student_fees.php?error=3");
	}
}
else
{
	if($_GET['msg']==1)
	{
		$msg = "<span style='color:#009900;'><h4> Student Fees  Detail Added Successfully </h4></span>";
	}
	if($_GET['msg']==2)
	{
		$msg = "<span style='color:#009900;'><h4>Student Fees Detail Deleted Successfully </h4></span>";
	}
	if($_GET['msg']==3)
	{
		$msg = "<span style='color:#009900;'><h4> Student Fees Detail Updated Successfully </h4></span>";
	}
	else if($_GET['error']==1)
	{
		$msg = "<span style='color:#FF0000;'><h4>Student Fees Detail Already Exists </h4></span>";
	}
	else if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> Please fill all detail </h4></span>";
	}
	else if($_GET['error']==3)
	{
		$msg = "<span style='color:#FF0000;'><h4> Deposit fees amount is greater than  pending amount.</h4></span>";
	}
}


?>
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
<div id="left_bar">
	
	
	<div id="sidebar">
		<div id="secondary_nav">
			<ul id="sidenav" class="accordion_mnu collapsible">
				<li><a href="session.php"><span class="nav_icon computer_imac"></span> Session </a>
				
				</li>
                <!-- <li><a href="#"><span class="nav_icon frames"></span> Category<span class="up_down_arrow">&nbsp;</span></a>
				<ul class="acitem">
					<li><a href="category.php"><span class="list-icon">&nbsp;</span>Super Category</a></li>
					<li><a href="sub_category.html"><span class="list-icon">&nbsp;</span>Sub Category</a></li>
					
				</ul>
				</li>-->
                </ul>
                <!--<ul>
				<li><a href="fees_setting.php"><span class="nav_icon frames"></span> Fees setting<span class="up_down_arrow">&nbsp;</span></a>
				
				</li>
                <li><a href="fees_package.php"><span class="nav_icon frames"></span>Fees Package<span class="up_down_arrow">&nbsp;</span></a>
				
				</li>
                
                <li><a href="term_manager.php"><span class="nav_icon frames"></span>Term Manager<span class="up_down_arrow">&nbsp;</span></a>
				
				</li>
                 <li><a href="fees_manager.php"><span class="nav_icon frames"></span> Fees Manager<span class="up_down_arrow">&nbsp;</span></a>
				
				</li>
                 <li><a href="student_transport_fees.php"><span class="nav_icon frames"></span> Transport Fees Manager<span class="up_down_arrow">&nbsp;</span></a>
				
				</li>
                
                <li><a href="student_pending_fees_detail.php"><span class="nav_icon frames"></span> Student Pending Fees <span class="up_down_arrow">&nbsp;</span></a>
				
				</li>
                
                  <li><a href="student_transport_pending_fees_detail.php"><span class="nav_icon frames"></span> Student Pending Bus Fees <span class="up_down_arrow">&nbsp;</span></a>
				
				</li>
                				
			</ul>-->
		</div>
	</div>
</div>
    
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">  Select Session</h3>
                     
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="dashboard.php" method="post" class="form_container left_label">
							<ul  style="height:auto; min-height:40px;">
														
                                
                                 	<li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Select Session</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="session" >
								
							<?php
							 $sql="SELECT * FROM session";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['session']; ?>"><?php echo $row['session']; ?></option>
									<?php
								}
							?>
							</select>
											<span class=" label_intro">Class name</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                          </ul>
                                <ul  style="height:auto; min-height:40px;">
                               
                                <li id="stream_code"></li>
                                
                              </ul>
                              
                              <ul style="height:auto; min-height:80px;">
								
                                
                                
                                
                                <li style="height:40px;">
								<div class="form_grid_12">
									<div class="form_input"><div class="form_grid_4 alpha">
										
										<button type="submit" name="entry_submit" class="btn_small btn_blue"><span>Submit</span></button>
										
										<a href="transport_student_detail.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button>
									</a>	</div>
									</div>
								</div>
								</li>
							</ul>
						</form>
				</div>
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
<?php include_once("includes/footer.php");?>