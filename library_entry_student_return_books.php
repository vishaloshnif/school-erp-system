<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	// $package_name = $_POST['package_name'];
	 //$class_id = $_POST['class_id'];
	//$school_logo = $_POST['school_logo'];
	if($_POST['pending_amount']>=$_POST['fees_amount'])
	{
	 $sql1="SELECT * FROM student_fees_detail where registration_no='".$_POST['registration_no']."' and fees_term='".$_POST['fees_term']."' and session='".$_SESSION['session']."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
		
		
		if($_POST['registration_no']!=""&&$_POST['fees_term']!=""&&$_POST['fees_amount']!="")
		{
		 $sql3="INSERT INTO student_fees_detail(registration_no,fees_term,fees_amount,session) VALUES ('".$_POST['registration_no']."','".$_POST['fees_term']."','".$_POST['fees_amount']."','".$_SESSION['session']."')";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		header("Location:fees_manager.php?msg=1");
		}else
		{    header("location:add_student_fees.php?error=2");
			
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
<?php include_once("includes/library_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Student return   book detail </h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
		  <form action="library_student_return_books.php" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title" style="width:15%"> S R Number<span style="color:#F00"> *</span>
</label>
                                    <div class="form_input" >
										
                                        <div class="form_grid_4 alpha"  >
											<input name="registration_no"   onBlur="getCheckreg('checkregno.php?registration_no='+this.value)" type="text" style=" margin-left:-192px;" />										
										</div>
                                        
                                        <label class="field_title" style=" margin-left:110px; width:16%">
OR <span style="color:#F00"> *</span>
</label>
                                        <div class="form_grid_4" style="margin-left:-25px;">
											<a  href="library_student_returnbook_searchby_name.php" style="text-decoration:underline"><input type="button" name="search" value="search by name" class="btn_small btn_orange"></a>
								</div>
									
										<span class="clear"></span>
									</div>
                                    
                                    
                                    

									
									
								</div>
								</li>
                                
                                
								<li>
								<div class="form_grid_12">
									<div class="form_input">
										
										<button type="submit" class="btn_small btn_blue" name="submit12"><span>Save</span></button>
										
										
										
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