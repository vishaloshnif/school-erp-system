<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	// $package_name = $_POST['package_name'];
	 //$class_id = $_POST['class_id'];
	//$school_logo = $_POST['school_logo'];
	
	 $sql1="SELECT * FROM student_books_detail where registration_no='".$_POST['registration_no']."' and book_number='".$_POST['book_number']."' and session='".$_SESSION['session']."' and booking_status='1'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	
	if($num==0)
	{
		
		$issue_date=$_POST['issue_date'];
		
		 $sql3="INSERT INTO student_books_detail(registration_no,book_number,issue_date,booking_status,session) VALUES ('".$_POST['registration_no']."','".$_POST['book_number']."','".date('Y-m-d',strtotime($issue_date))."','1','".$_SESSION['session']."')";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		header("Location:library_student_books_manager.php");
		
		
	}
	else
	{
		header("location:library_add_student_books.php?error=1");
	}
	
	
}
else
{
	if($_GET['msg']==1)
	{
		$msg = "<span style='color:#009900;'><h4> Student Books  Detail Added Successfully </h4></span>";
	}
	if($_GET['msg']==2)
	{
		$msg = "<span style='color:#009900;'><h4>Student Books Detail Deleted Successfully </h4></span>";
	}
	if($_GET['msg']==3)
	{
		$msg = "<span style='color:#009900;'><h4> Student Books Detail Updated Successfully </h4></span>";
	}
	else if($_GET['error']==1)
	{
		$msg = "<span style='color:#FF0000;'><h4>Student Books Detail Already Exists </h4></span>";
	}
	else if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> Please fill all detail </h4></span>";
	}
	
}

if($_GET['registration_no']!="")
{
$_SESSION['registration_no']=$_GET['registration_no'];
}


if($_POST['registration_no']!="")
{
$_SESSION['registration_no']=$_POST['registration_no'];
}
$registration_no=$_SESSION['registration_no'];
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
<?php include_once("includes/library_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Add student books </h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Registration no.</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="registration_no"   onBlur="getCheckreg('checkregno.php?registration_no='+this.value)" type="text" value="<?php echo $registration_no;?>" />
                                            
											<span class=" label_intro">Registration number</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                
                                
                                
                                
                                <?php 
//$registration_no=$_GET['registration_no'];
//$fees_term=$_GET['fees_term'];
 $studentinfo="select * from student_info where registration_no='".$registration_no."' and session='".$_SESSION['session']."'";
$row=mysql_fetch_array(mysql_query($studentinfo));


	      $sql_pending="select sum(fees_amount) from student_fees_detail where registration_no='".$registration_no."'  and session='".$_SESSION['session']."'";
	$deposit_amount=mysql_fetch_array(mysql_query($sql_pending));
	
	


//$student_fees_detail="select ";
?>

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
								<div class="form_grid_12 multiline">
									<label class="field_title">  Book Number</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha" id="Checkbook">
                                      
											<input name="book_number" type="text" onBlur="getCheckbook('checkbookno.php?book_number='+this.value)"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Issue Date</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha" >
                                      
											<input name="issue_date" type="text" class="datepicker" required />
											
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
									<div class="form_input">
										
										<button type="submit" class="btn_small btn_blue" name="submit"><span>Save</span></button>
										
										<a href="library_student_books_manager.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button></a>
										
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