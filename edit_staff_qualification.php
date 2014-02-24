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
               
					<h3 style="padding-left:20px; color:#1c75bc">Edit Staff Qualification</h3> <?php
                include_once('config/config.inc.php');
				?>
                <?php
				$get=$_GET['staff_qualification_id'];
								if(isset($_POST['submit']))
				{
					$staff=$_POST['staff_qualification'];
			   
                $sql="update staff_qualification set staff_qualification='".$staff."' where staff_qualification_id='".$get."'";
				$res=mysql_query($sql);
				}
			$select_sql="select * from staff_qualification where staff_qualification_id='".$get."'";	
			$select_res=mysql_query($select_sql);
		$row=mysql_fetch_array($select_res)
		
			
				
				?>
					<form action="#" method="post" class="form_container left_label">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Staff Qualification </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="staff_position" type="text"  value="<?php echo $row['staff_qualification']?>"/>
											<span class=" label_intro">Staff Position</span>
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
										
										<a href="view_staff_qualification.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button></a>
										
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