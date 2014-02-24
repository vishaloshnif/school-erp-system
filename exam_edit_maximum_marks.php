<?php include_once("includes/header.php");?>
<?php 
$msgs='';
$id_get=$_GET['sid'];

if(isset($_POST['submit']))
{
	 	if($_POST['marks']!='')
		{
			
	 $sql3="update exam_add_maximum_marks set class_id='".$_POST['class_id']."', stream_id='".$_POST['stream']."', subject_id='".$_POST['subject_id']."',term_id='".$_POST['term_id']."',max_marks='".$_POST['marks']."',session='".$_SESSION['session']."' where exam_max_marks_id='$id_get'";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
	//header("Location:exam_show_maximum_marks.php?msg=1");
			
		}
		else
		{   
		// header("location:exam_add_maximum_marks.php?error=2");
			
		}
		
	}
$sql_maximum="select * from exam_add_maximum_marks where exam_max_marks_id='$id_get'";
$sql_max=mysql_query($sql_maximum);
$row_max=mysql_fetch_array($sql_max);

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
				<div class="widget_wrap" style="min-height:600px;">
					<h3 style="padding-left:20px; color:#1c75bc">Exam Marks Managment</h3>
				<h3><?php
				if($msgs!='')
				{
				 echo $msgs;
				}
				 ?></h3>
				
                	<form action="" method="post" class="form_container left_label">
							<ul  style="height:auto;">
								
								
                                
                                 <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Class  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="class_id">
								<option value="" selected="selected"> - Select Class - </option>
							<?php
							 $sql="SELECT * FROM class ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{   
								if($row['class_id']==$row_max['class_id'])                    {
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
                                <?php if($row_max['stream_id']!=0){?>
                                     <li id="stream_code">
							
								<div class="form_grid_12 multiline">
									<label class="field_title"> Stream  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="stream_id" >
										<?php
							 $sql="SELECT * FROM stream";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{   
								if($row['stream_id']==$row_max['stream_id'])   
								{
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
								if($row['subject_id']==$row_max['subject_id'])                    {
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
											<span class=" label_intro">Subject name</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                
                               
                              <li style="height:40px;">
								<div class="form_grid_12">
									<label class="field_title">Select Term</label>
									<div class="form_input"><div class="form_grid_4 alpha">
										<select name="term_id" >
								<option value="" selected="selected"> - Select Term - </option>
							<?php
							 $sqls1="SELECT * FROM exam_nuber_of_term";
	                           $ress=mysql_query($sqls1);
								while($row22=mysql_fetch_array($ress))
								{
									if($row22['term_id']==$row_max['term_id'])
									{
									$term_count='selected="selected"';
									}
									else
									{
									$term_count='';	
									}
										
								
									?>
									<option <?php echo $term_count;?> value="<?php echo $row22['term_id']; ?>"><?php echo $row22['term_name']; ?></option>
									<?php
								}
							?>
							</select> <span class="clear"></span>
												</div>
						
                                      		</div>
								</div>
								</li>
                                <li  style="height:40px;">
								<div class="form_grid_12">
									<label class="field_title">Enter Max marks</label>
									<div class="form_input"><div class="form_grid_4 alpha">
										<input name="marks" value="<?php echo $row_max['max_marks'];?>" type="text"/> <span class="clear"></span>
												</div>
						
                                       <span class=" label_intro"></span>		</div>
								</div>
								</li>
                                  <li>
								<div class="form_grid_12">
									<div class="form_input"><div class="form_grid_4 alpha">
										
										<button type="submit" name="submit" class="btn_small btn_blue"><span>Save</span></button>
										
									<a href="exam_show_maximum_marks.php">	<button type="button" class="btn_small btn_orange"><span>Back</span></button>
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