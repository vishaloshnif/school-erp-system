<?php include_once("includes/header.php");?>
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

<?php include_once("includes/staff_setting_sidebar.php");?>
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
               
					<h3 style="padding-left:20px; color:#1c75bc"> Staff Department</h3> <?php
                include_once('config/config.inc.php');
				?>
                <?php
				if(isset($_POST['submit']))
				{
					 $insert_check="select * from staff_department  where staff_department='".$_POST['staff_department']."'"; 
	 $num=mysql_fetch_array(mysql_query($insert_check));
			if($num==0)
			{   
                $sql="insert into staff_department(staff_department) values('".$_POST['staff_department']."')";
				$res=mysql_query($sql);
				$msg = "<span style='color:#009900;'><h4> Staff Department  Detail Added Successfully </h4></span>";
				}
				else
				{ 
					$msg = "<span style='color:#FF0000;'><h4> Staff Department Detail already exist </h4></span>";
				
				}}
				
				
				?>
                <?php if($msg!=""){echo $msg; } ?>
					<form action="#" method="post" class="form_container left_label">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Department Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="staff_department" type="text" required="required"/>
											<span class=" label_intro">New Department</span>
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
										
									<a href="view_staff_department.php">	<button type="button" class="btn_small btn_orange"><span>Back</span></button>
				</a>						
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