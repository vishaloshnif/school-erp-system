<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	
	 	
		if($_POST['destination']!="")
		{
		echo $sql3="update transport_add_route set route_name='".$_POST['destination']."',cost='".$_POST['cost']."' where route_id='".$_GET['sid']."'";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		header("Location:transport_route_detail.php?msg=1");
		}else
		{    header("location:transport_route_edit.php?error=2");
			
			}
	
}
else
{
	if($_GET['msg']==1)
	{
		$msg = "<span style='color:#009900;'><h4> Section Detail Added Successfully </h4></span>";
	}
	if($_GET['msg']==2)
	{
		$msg = "<span style='color:#009900;'><h4>Section Detail Deleted Successfully </h4></span>";
	}
	if($_GET['msg']==3)
	{
		$msg = "<span style='color:#009900;'><h4> Section Detail Updated Successfully </h4></span>";
	}
	else if($_GET['error']==1)
	{
		$msg = "<span style='color:#FF0000;'><h4> Route Detail Already Exists </h4></span>";
	}
	else if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> Please fill all detail </h4></span>";
	}
}
echo $sql1="SELECT * FROM transport_add_route where route_id='".$_GET['sid']."'";
	$res1=mysql_query($sql1);
		$row=mysql_fetch_array($res1);
		
	

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
<?php include_once("includes/transport_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Add New Route</h3> <?php if($msg!=""){echo $msg; } ?>
					<form action="#" method="post" class="form_container left_label">
							<ul>
								<li>
								<div class="form_grid_12">
									<label class="field_title">Desitation</label>
									 <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="destination" value="<?php echo $row['route_name'];?>" type="text"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>

								</li>
								<li>
								<div class="form_grid_12">
									<label class="field_title">Cost</label>
									 <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="cost" type="text" value="<?php echo $row['cost'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>

								</li>
                                <li>
								<div class="form_grid_12">
									<div class="form_input"><div class="form_grid_4 alpha">
										
										<button type="submit" name="submit" class="btn_small btn_blue"><span>Save</span></button>
										
										<button type="submit" class="btn_small btn_orange"><span>Back</span></button>
										</div>
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
</body>
</html>