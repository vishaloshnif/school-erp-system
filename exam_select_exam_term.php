<?php include_once("includes/header.php");?>
<?php 
$msgs='';

if(isset($_POST['submit']))
{
		header("Location:exam_marks_add_student.php?term_id=".$_POST['term_id']);
			
			
		
	
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
<?php include_once("includes/exam_setting_sidebar.php");?>
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Exam Marks Managment</h3>
					<form action="exam_marks_add_student.php" method="post" class="form_container left_label">
							<ul  style="height:auto; min-height:40px;">
								
								
                                
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
                          </ul>
                                <ul  style="height:auto; min-height:40px;">
                               
                                <li id="stream_code"></li>
                                
                              </ul>
                              
                              <ul style="height:auto; min-height:80px;">
								
                                <li style="height:40px;">
								<div class="form_grid_12">
									<label class="field_title">Select Term</label>
									<div class="form_input"><div class="form_grid_4 alpha">
										<select name="term_id" >
								<option value=""> - Select term - </option>
							<?php
							 $sqls1="SELECT * FROM exam_nuber_of_term";
	                           $ress=mysql_query($sqls1);
								while($row22=mysql_fetch_array($ress))
								{
									?>
									<option value="<?php echo $row22['term_id']; ?>"><?php echo $row22['term_name']; ?></option>
									<?php
								}
							?>
							</select> <span class="clear"></span>
												</div>
						
                                      		</div>
								</div>
								</li>
                                
                                
                                <li style="height:40px;">
								<div class="form_grid_12">
									<div class="form_input"><div class="form_grid_4 alpha">
										
										<button type="submit" name="entry_submit" class="btn_small btn_blue"><span>Submit</span></button>
										
										<a href="exam_show_student_marks.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button>
									</a>	</div>
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