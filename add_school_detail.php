<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	 $school_name = $_POST['school_name'];
	 $school_address = $_POST['school_address'];
	//$school_logo = $_POST['school_logo'];
	
	 $sql1="SELECT * FROM school_detail ";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
		if(isset($_FILES['school_logo']['name'])&&$_FILES['school_logo']['name']!="")
		{
			$school_logo=$_FILES['school_logo']['name'];
			$path="school_logo/";
			move_uploaded_file($_FILES['school_logo']['tmp_name'],$path.$school_logo);
			
			}
		
		if($_POST['school_name']!=""&&$_POST['school_address']!=""&&$school_logo!="")
		{
		 $sql3="INSERT INTO school_detail(school_name,school_address, school_logo) VALUES ('".$school_name."','".$school_address."', '".$school_logo."')";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		header("Location:school_detail.php?msg=1");
		}else
		{    header("location:add_school_detail.php?error=2");
			
			}
		
	}
	else
	{
		header("location: add_school_detail.php?error=1");
	}
}
else
{
	if($_GET['msg']==1)
	{
		$msg = "<span style='color:#009900;'><h4> School Detail Added Successfully </h4></span>";
	}
	if($_GET['msg']==2)
	{
		$msg = "<span style='color:#009900;'><h4> School Detail Deleted Successfully </h4></span>";
	}
	if($_GET['msg']==3)
	{
		$msg = "<span style='color:#009900;'><h4> School Detail Updated Successfully </h4></span>";
	}
	else if($_GET['error']==1)
	{
		$msg = "<span style='color:#FF0000;'><h4> School Detail Already Exists </h4></span>";
	}
	else if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> Please fill all detail </h4></span>";
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
<?php include_once("includes/school_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Add school name</h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> School Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="school_name" type="text"/>
											<span class=" label_intro">School name</span>
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
									<label class="field_title"> School Address</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="school_address" type="text"/>
											<span class=" label_intro">School Address</span>
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
									<label class="field_title"> School Logo</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="school_logo" type="file"/>
											<span class=" label_intro">School image </span>
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
										
										<a href="school_detail.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button></a>
										
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