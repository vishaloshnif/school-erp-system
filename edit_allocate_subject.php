<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	$stream_id = $_POST['stream'];
	 $class_id = $_POST['class_id'];
	$subject_id=$_POST['subject_id'];
		
		if($_POST['stream']!="")
	{
	 $sql1="SELECT * FROM allocate_class_subject where stream_id='".$stream_id."'  and class_id='".$class_id."' and subject_id='".$subject_id."' and `allocate_id` != '" . $_GET['sid'] . "'";
	}else
	{
		
		 $sql1="SELECT * FROM allocate_class_subject where  class_id='".$class_id."' and subject_id='".$subject_id."' and `allocate_id` != '" . $_GET['sid'] . "'";
		}
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
	
	  $sql3="UPDATE allocate_class_subject SET `class_id` = '".$class_id."',stream_id='".$stream_id."',subject_id='".$subject_id."'   WHERE `allocate_id` = '" . $_GET['sid'] . "'";
	$res3=mysql_query($sql3) or die("Error : " . mysql_error());
	header("Location:allocate_subject.php?msg=3");
	}else
		{    header("location:edit_allocate_subject.php?error=2&&sid=".$_GET['sid']);
			
			}
}
if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> subject Detail Already Exists  </h4></span>";
	}
	
		
	$sql2="SELECT * FROM allocate_class_subject WHERE `allocate_id` = '" . $_GET['sid'] . "'";
	$res2=mysql_query($sql2);	
	$row2=mysql_fetch_array($res2);
		
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
					<h3 style="padding-left:20px; color:#1c75bc">Edit Allocated stream </h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Class  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="class_id" >
								<option value="" selected="selected"> - Select Class - </option>
							<?php
							 $sql="SELECT * FROM class ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{   
								if($row['class_id']==$row2['class_id'])                    {
									 $class='selected="selected"';
					
					             }else
								 {
									 $class="";
									 }
									?>
									<option <?php echo $class;?> value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
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
                                <?php if($row2['stream_id']!=0){?>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Stream  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="stream" >
								<option value="" selected="selected"> - Select stream - </option>
							<?php
							 $sql="SELECT * FROM stream  ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{   
								if($row['stream_id']==$row2['stream_id'])                    {
									 $stream='selected="selected"';
					
					             }else
								 {
									 $stream="";
									 }
									?>
									<option <?php echo $stream;?> value="<?php echo $row['stream_id']; ?>"><?php echo $row['stream_name']; ?></option>
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
                                
                                <?php }?>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Subject  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="subject_id" >
								<option value="" selected="selected"> - Select Subject - </option>
							<?php
							 $sql="SELECT * FROM subject  ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{   
								if($row['subject_id']==$row2['subject_id'])                    {
									 $subject='selected="selected"';
					
					             }else
								 {
									 $subject="";
									 }
									?>
									<option <?php echo $subject;?> value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_name']; ?></option>
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