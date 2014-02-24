<?php include_once("includes/header.php");?>
<?php 
$msgs='';
if(isset($_POST['submit']))
{
	
	
										
	 $sql1="SELECT * FROM exam_time_table where subject_id='".$_POST['subject_id']."' and session='".$_SESSION['session']."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
		if($_POST['subject_id']!='')
		{
			
 $sql3="INSERT INTO  exam_time_table(class_id,stream_id,subject_id,date,session) VALUES ('".$_POST['class_id']."','".$_POST['stream']."', '".$_POST['subject_id']."', '".$_POST['date']."','".$_SESSION['session']."')";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		//header("Location:exam_date.php?msg=1");
			
			
		}
		
		
	}
	
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
                                
                                <li id="stream_code">
								<div class="form_grid_12 multiline">
									<label class="field_title"> Stream  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="stream_id" >
								<option value="" selected="selected"> - Select Stream - </option>
							<?php
							 $sql="SELECT * FROM stream";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['stream_id']; ?>"><?php echo $row['stream_name']; ?></option>
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
								<div class="form_grid_12 multiline">
									<label class="field_title"> Subject  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="subject_id" >
								<option value="" selected="selected"> - Select Subject - </option>
							<?php
							 $sql="SELECT * FROM subject ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									?>
									<option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_name']; ?></option>
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
								
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Select Examination Date</label>
									<div class="form_input">
                                    <div class="form_grid_4 alpha">
										<input name="date" type="text" class="datepicker"/> <span class="clear"></span> </div>
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