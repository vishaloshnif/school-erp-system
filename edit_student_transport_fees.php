<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	$package_name = $_POST['package_name'];
	$package_fees = $_POST['package_fees'];
	// $class_id = $_POST['class_id'];
	
		if($_POST['pending_amount']>=$_POST['fees_amount'])
	{
	 $sql1="SELECT * FROM student_transport_fees_detail where registration_no='".$_POST['registration_no']."' and fees_term='".$_POST['fees_term']."' and session='".$_SESSION['session']."' and student_fees_id!='".$_GET['sid']."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
	  $sql3="UPDATE student_transport_fees_detail SET registration_no='".$_POST['registration_no']."',fees_term='".$_POST['fees_term']."',fees_amount='".$_POST['fees_amount']."' where student_fees_id='".$_GET['sid']."'";
	$res3=mysql_query($sql3) or die("Error : " . mysql_error());
	header("Location:student_transport_fees.php?msg=3");
	}else
	{
		header("Location:edit_student_transport_fees.php?error=2&&sid=".$_GET['sid']);
	}
}
else
	{
		header("location:edit_student_transport_fees.php?error=3&&sid=".$_GET['sid']);
	}
}

if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4>Transport Fees  Detail Already Exists  </h4></span>";
	}

if($_GET['error']==3)
	{
		$msg = "<span style='color:#FF0000;'><h4> Deposit fees amount is greater than  pending amount.</h4></span>";
	}
	
		
	$sql2="SELECT * FROM student_transport_fees_detail WHERE `student_fees_id` = '" . $_GET['sid'] . "';";
	$res2=mysql_query($sql2);	
	$row22=mysql_fetch_array($res2);
		
		
	  $studentinfo="select * from student_info where registration_no='".$row22['registration_no']."' and session='".$_SESSION['session']."'";
$row=mysql_fetch_array(mysql_query($studentinfo));

 $sql_pending="select sum(fees_amount) from student_transport_fees_detail where registration_no='".$row22['registration_no']."'  and session='".$_SESSION['session']."'";
	$deposit_amount=mysql_fetch_array(mysql_query($sql_pending));

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
<?php include_once("includes/fees_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Edit bus fees </h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Registration no.</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="registration_no"   onBlur="getCheckreg('checkregno.php?registration_no='+this.value)" type="text"  value="<?php echo $row['registration_no'];?>"/>
											<span class=" label_intro">Registration number</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                <span id="stream_code">
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Student Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="name" type="text" value="<?php echo $row['name'];?>"/>
											<span class=" label_intro">student name</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Class Name </label>
									<div class="form_input">
										<select style=" width:300px" name="class" class="chzn-select" tabindex="13">
											
							<?php
							 $sql="SELECT * FROM class  where class_id='".$row['class']."'";
	                           $res=mysql_query($sql);
								while($row1=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row1['class_id']; ?>"><?php echo $row1['class_name']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                <?php if($row['stream']!=0){?>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Stream</label>
									<div class="form_input">
										<select style=" width:300px" name="stream" class="chzn-select" tabindex="13">
										
                                        	<?php
							 $sql="SELECT * FROM stream where stream_id='".$row['stream']."' ";
	                           $res=mysql_query($sql);
								while($row2=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row2['stream_id']; ?>"><?php echo $row2['stream_name']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
								
								<?php } ?>
                                <li>
                                <?php
							 $sql="SELECT * FROM transport_student_detail where registration_no='".$row['registration_no']."' and session='".$_SESSION['session']."' ";
	                           $res=mysql_query($sql);
								$row3=mysql_fetch_array($res);
								
								 $sql_route="select * from transport_add_route where route_id='".$row3['route_id']."'";
						$sql_value_route=mysql_query($sql_route);
						$sql_transport_row=mysql_fetch_array($sql_value_route);
								?>
								<div class="form_grid_12 multiline">
									<label class="field_title">  Fees Amount</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
                                        
											<input name="fees_amount" type="text" value="<?php echo $row22['fees_amount'];?>"/>
											<span class=" label_intro" style="color:#F00;">pending fees amount is:<?php echo $pending_amount=$sql_transport_row['cost']-$deposit_amount[0];?> <input name="pending_amount" type="hidden" value="<?php echo $pending_amount=$sql_transport_row['cost']-$deposit_amount[0];?>"/></span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
								
                                
                                </span>
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Fees Term</label>
									<div class="form_input">
										<select style=" width:300px" name="fees_term" class="chzn-select" tabindex="13">
											<option value="" selected="selected"> - Select fees term  - </option>
							<?php
							 $sql="SELECT * FROM month ";
	                           $res=mysql_query($sql);
								while($row1=mysql_fetch_array($res))
								{
									if($row22['fees_term']==$row1[0])
									{ 
									$fees_term='selected="selected"';
										
										}
										else
									    {
											$fees_term="";
											
											}
									
									?>
									<option <?php echo $fees_term;?> value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
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
										
										<button type="submit" class="btn_small btn_blue" name="submit"><span>Save</span></button>
										
										<a href="student_transport_fees.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button></a>
										
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