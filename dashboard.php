<?php include_once("includes/header.php");?>
<?php 
if($_POST['session']!="")
{
	 $_SESSION['session']=$_POST['session'];
}

?>
	<div class="page_title">
		<span class="title_icon"><span class="computer_imac"></span></span>
		<h3>Dashboard</h3>
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
			<div class="grid_12 full_block">
            
				<div class="widget_wrap">
					<div class="widget_content">
                    <div class="switch_bar">
		<ul>
			<li>
			<a href="school_setting.php"><span class="stats_icon config_sl"></span><span class="label">School Setting</span></a>
			</li>
            
            <li>
			<a href="admission.php"><span class="stats_icon current_work_sl"></span><span class="label">Admission</span></a>
			</li>
            
			<li><a href="student_detail.php"><span class="stats_icon user_sl"></span><span class="label"> Student Details</span></a>
			
			</li>
            <li><a href="fees_setting.php"><span class="stats_icon archives_sl"></span><span class="label">Fees</span></a></li>
              <li><a href="account_setting.php"><span class="stats_icon bank_sl"></span><span class="label">Account</span></a></li>
            
			<li><a href="exam_setting.php"><span class="stats_icon administrative_docs_sl"></span><span class="label">Examination</span></a></li>
            <li><a href="transport_setting.php"><span class="stats_icon category_sl"></span><span class="label">Transport</span></a></li>
             
			<li><a href="staff_setting.php"><span class="stats_icon folder_sl"></span><span class="label">Staff</span></a></li>
            
			<li><a href="library_setting.php"> <span class="stats_icon finished_work_sl"></span><span class="label">Library</span> </a></li>
            
			<br>
</ul><ul style="margin-top:30px; float:left; margin-left:30px;">
            
			
            
			<li><a href="rte_student_detail.php"> <span class="stats_icon finished_work_sl"></span><span class="label">RTE Students</span> </a></li>
            
            
            <li><a href="entry_student_tc.php"> <span class="stats_icon finished_work_sl"></span><span class="label">Student Tc</span> </a></li>
            
            
			<!--<li><a href="#"><span class="stats_icon address_sl"></span><span class="label">Inventory</span></a></li>
           -->
            
			
            
          
           <!-- <li><a href="#"><span class="stats_icon config_sl"></span><span class="label">Settings</span></a></li>
            
			<li><a href="#"><span class="stats_icon calendar_sl"></span><span class="label">Events</span></a></li>
            
			<li><a href="#"><span class="stats_icon lightbulb_sl"></span><span class="label">Support</span></a></li>
            
			-->
            
           
            
            <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

            
		</ul>
	</div>
						
					</div>
                   
				</div>
			</div>
			 
		</div>
       <h1>&nbsp;</h1>
		  <h6 align="center" >Copyright © 2013 </h6>
	</div>
    </div>
  <?php include_once("includes/footer.php");?>
