<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	$fine_rate = $_POST['fine_rate'];
	 $no_of_days = $_POST['no_of_days'];
	
	//$school_logo = $_POST['school_logo'];
	
	 
	  $sql3="UPDATE library_fine_manager SET `fine_rate` = '".$fine_rate."',no_of_days='".$no_of_days."' WHERE `fine_id` = '" . $_GET['sid'] . "'";
	$res3=mysql_query($sql3) or die("Error : " . mysql_error());
	header("Location:library_fine_manager.php?msg=3");
	
}


if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> Fine Detail Already Exists  </h4></span>";
	}
	
		
	$sql2="SELECT * FROM library_fine_manager WHERE `fine_id` = '" . $_GET['sid'] . "'";
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
<?php include_once("includes/library_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Edit fine detail</h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Fine Rate</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="fine_rate" type="text" value="<?php echo $row2['fine_rate'];?>" />
											
											<span class=" label_intro">Fine Rate</span>
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
									<label class="field_title">Number of days</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="no_of_days" type="text"  value="<?php echo $row2['no_of_days'];?>"  />
											
											<span class=" label_intro">Number Of Days</span>
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
										
										<a href="library_fine_manager.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button></a>
										
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