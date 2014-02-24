<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	$term_name = $_POST['term_name'];
	// $class_id = $_POST['class_id'];
	
		$sql1="SELECT * FROM fees_term where term_name='".$term_name."' and fees_term_id!='".$_GET['sid']."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
	  $sql3="UPDATE fees_term SET term_name='".$term_name."'  where fees_term_id='".$_GET['sid']."'";
	$res3=mysql_query($sql3) or die("Error : " . mysql_error());
	header("Location:term_manager.php?msg=3");
	}else
	{
		header("Location:edit_term.php?error=2&&sid=".$_GET['sid']);
	}
}


if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4>Term Detail Already Exists  </h4></span>";
	}

	
		
	$sql2="SELECT * FROM fees_term WHERE `fees_term_id` = '" . $_GET['sid'] . "';";
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
<?php include_once("includes/sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Edit term </h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Term  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="term_name" type="text" value="<?php echo $row2['term_name']; ?>"/>
											<span class=" label_intro">Term name</span>
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
										
										<a href="term_manager.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button></a>
										
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