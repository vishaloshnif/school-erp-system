<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	$school_name = $_POST['school_name'];
	$school_address = $_POST['school_address'];
	$path="school_logo/";
	    if(isset($_FILES['school_logo']['name'])&&$_FILES['school_logo']['name']!="")
		{
			$school_logo=$_FILES['school_logo']['name'];
			
			move_uploaded_file($_FILES['school_logo']['tmp_name'],$path.$school_logo);
			$old_photo=$_POST['old_logo'];
			
			 @unlink($path.$old_photo);
			
			}
			else
			{
				$old_photo=$_POST['old_logo'];
				$school_logo=$old_photo;
				
			//move_uploaded_file($_FILES['school_logo']['tmp_name'],$path.$school_logo);
				
				}
		
	  $sql3="UPDATE school_detail SET `school_name` = '".$school_name."',`school_address` = '".$school_address."',`school_logo` = '".$school_logo."' where id='".$_GET['sid']."'";
	$res3=mysql_query($sql3) or die("Error : " . mysql_error());
	header("Location:school_detail.php?msg=3");
}

	
		
	$sql2="SELECT * FROM school_detail WHERE `id` = '" . $_GET['sid'] . "';";
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
					<h3 style="padding-left:20px; color:#1c75bc">Edit school name</h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> School Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="school_name" type="text" value="<?php echo $row2['school_name'];?>"/>
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
											<input name="school_address" type="text" value="<?php echo $row2['school_address'];?>"/>
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
											<span class=" label_intro">School image </span><img src="school_logo/<?php echo $row2['school_logo'];?>" width="50" height="50" /><input type="hidden" name="old_logo" value="<?php echo $row2['school_logo'];?>">
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