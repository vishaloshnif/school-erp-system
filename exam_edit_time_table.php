<?php include_once("includes/header.php");?>
<?php 
$msgs='';
if(isset($_POST['submit']))
{
	
		if($_POST['subject_id']!='')
		{
			
	 $sql3="update exam_time_table set class_id='".$_POST['class']."', stream_id='".$_POST['stream']."', subject_id='".$_POST['subject_id']."',date='".$_POST['date']."' where time_table_id='".$_GET['sid']."'";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		//header("Location:exam_time_table_detail.php?msg=1");
			
			
	
		
		
	}
	
	}
	$sql_edit=mysql_fetch_array(mysql_query("select * from exam_time_table where time_table_id='".$_GET['sid']."'"));

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

          <script>
									function subcat()
									{
										var s=document.getElementById("subc").value;
										var xmlhttp;
										//alert(s);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("subd").innerHTML=xmlhttp.responseText;
  // alert(subd);
    }
  }
xmlhttp.open("GET","ajax_exam_date.php?s="+s,true);
xmlhttp.send();	
									}
									</script>
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Add New Exam Date</h3>
					<form action="#" method="post" class="form_container left_label">
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
								if($row['class_id']==$sql_edit['class_id'])                    {
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
                                <?php if($sql_edit['stream_id']!=0){?>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Stream  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="stream_id" >
								<option value="" selected="selected"> - Select stream - </option>
							<?php
							 $sql="SELECT * FROM stream  ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{   
								if($row['stream_id']==$sql_edit['stream_id'])                    {
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
								if($row['subject_id']==$sql_edit['subject_id'])                    {
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
									<label class="field_title">Select Examination Date</label>
									<div class="form_input">
                                    <div class="form_grid_4 alpha">
										<input name="date" type="text" class="datepicker" value="<?php echo $sql_edit['date']?>"/> <span class="clear"></span> </div>
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