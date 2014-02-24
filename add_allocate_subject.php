<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	 $stream_id = $_POST['stream'];
	 $class_id = $_POST['class_id'];
	 $subject_id=$_POST['subject_id'];
	//$school_logo = $_POST['school_logo'];
	if($_POST['stream']!="")
	{
	 $sql1="SELECT * FROM allocate_class_subject where stream_id='".$stream_id."'  and class_id='".$class_id."' and subject_id='".$subject_id."'";
	}else
	{
		
		 $sql1="SELECT * FROM allocate_class_subject where  class_id='".$class_id."' and subject_id='".$subject_id."'";
		}
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
		
		
		if($_POST['class_id']!=""&&$_POST['subject_id']!="")
		{
		 $sql3="INSERT INTO allocate_class_subject(class_id,stream_id,subject_id) VALUES ('".$class_id."','".$stream_id."','".$subject_id."')";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		header("Location:allocate_subject.php?msg=1");
		}else
		{    header("location:add_allocate_subject.php?error=2");
			
			}
		
	}
	else
	{
		header("location: add_allocate_subject.php?error=1");
	}
}
else
{
	if($_GET['msg']==1)
	{
		$msg = "<span style='color:#009900;'><h4> subject Detail Added Successfully </h4></span>";
	}
	if($_GET['msg']==2)
	{
		$msg = "<span style='color:#009900;'><h4>subject Detail Deleted Successfully </h4></span>";
	}
	if($_GET['msg']==3)
	{
		$msg = "<span style='color:#009900;'><h4> subject Detail Updated Successfully </h4></span>";
	}
	else if($_GET['error']==1)
	{
		$msg = "<span style='color:#FF0000;'><h4> subject Detail Already Exists </h4></span>";
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
					<h3 style="padding-left:20px; color:#1c75bc">Allocate class stream </h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Class  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="class_id"   onChange="getForm('ajax_stream_code1.php?class_id='+this.value)">
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
											<span class=" label_intro">Class name</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                
                                <li id="stream_code">
								<div class="form_grid_12 multiline">
									<label class="field_title"> Stream  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="stream" >
								<option value="" selected="selected"> - Select Stream - </option>
							<?php
							 $sql="SELECT * FROM stream ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['stream_id']; ?>"><?php echo $row['stream_name']; ?></option>
									<?php
								}
							?>
							</select>
											<span class=" label_intro">Stream name</span>
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
									<label class="field_title"> Subject  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="subject_id" >
								<option value="" selected="selected"> - Select Subject - </option>
							<?php
							 $sql="SELECT * FROM subject ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_name']; ?></option>
									<?php
								}
							?>
							</select>
											<span class=" label_intro">Subject name</span>
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
										
										<a href="stream.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button></a>
										
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