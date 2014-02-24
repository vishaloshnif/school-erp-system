<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	
	 $sql1="SELECT * FROM transport_student_detail where registration_no='".$_POST['registration_no']."' and class_id='".$_POST['class_id']."' and session='".$_SESSION['session']."'";
	if($_POST['stream_id']!="")
	{
		
		$sql1.="and stream_id='".$_POST['stream_id']."'";
		
	}
	
	
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	
	$student_detail="select * from student_info where registration_no='".$_POST['registration_no']."' and class='".$_POST['class_id']."' and session='".$_SESSION['session']."'";
	if($_POST['stream_id']!="")
	{
		
		$student_detail.="and stream='".$_POST['stream_id']."'";
		
	}
	$admission_no=mysql_fetch_array(mysql_query($student_detail));
	if($num==0)
	{
		$route_id=$_POST['route_id'];
		
		 $sql3="INSERT INTO transport_student_detail(registration_no,class_id,stream_id,vechile_id,route_id,session) VALUES ('".$admission_no['student_admission_no']."','".$_POST['class_id']."','".$_POST['stream_id']."','".$route_id."','".$_POST['vechile_id']."','".$_SESSION['session']."')";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		header("Location:transport_add_student.php?msg=1");
		
		
		
	}
	else
	{
		$msg = "<span style='color:#FF0000;'><h4> Student Bus  Detail already exist </h4></span>";

	}
}
else
{
	if($_GET['msg']==1)
	{
		$msg = "<span style='color:#009900;'><h4> Student Bus Detail Added Successfully </h4></span>";
	}
	if($_GET['msg']==2)
	{
		$msg = "<span style='color:#009900;'><h4>Student Bus Detail Deleted Successfully </h4></span>";
	}
	if($_GET['msg']==3)
	{
		$msg = "<span style='color:#009900;'><h4> Student Bus Detail Updated Successfully </h4></span>";
	}
	else if($_GET['error']==1)
	{
		$msg = "<span style='color:#FF0000;'><h4> Student Bus  Detail Already Exists </h4></span>";
	}
	else if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> Please fill all detail </h4></span>";
	}
}


if($_GET['registration_no']!="")
{
$_SESSION['registration_no']=$_GET['registration_no'];
}


if($_POST['registration_no']!="")
{
$_SESSION['registration_no']=$_POST['registration_no'];
}
$registration_no=$_SESSION['registration_no'];

?>
<div class="page_title">
	<!--	<span class="title_icon"><span class="computer_imac"></span></span>
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
									</script>	<h3>Dashboard</h3>-->
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
<?php 
//$registration_no=$_GET['registration_no'];
//$fees_term=$_GET['fees_term'];
 $studentinfo="select * from student_info where registration_no='".$registration_no."' and session='".$_SESSION['session']."'";
$row_value=mysql_fetch_array(mysql_query($studentinfo));
?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap" >
					<h3 style="padding-left:20px; color:#1c75bc">Transport Managment</h3>
				<?php if($msg!=""){echo $msg; } ?>
				
                	<form action="" method="post" class="form_container left_label">
							<ul>
								
								
                                
                                <li style="height:40px;">
								<div class="form_grid_12">
									<label class="field_title">S R Number</label>
									<div class="form_input"><div class="form_grid_4 alpha">
										<input name="registration_no"   onBlur="getCheckreg('checkregno.php?registration_no='+this.value)" required type="text" id="suba"  value="<?php echo $row_value['registration_no'];?>" /> <span class="clear"></span>
												</div>
						</div>
                                       </div>
							
								</li>
                                
                               </ul>
							<ul  style="height:auto; min-height:80px;">
								
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Student Name</label>
                                    <div class="form_input">
										<div class="form_grid_4 alpha">
											<input name="name" type="text" value="<?php echo $row_value['name'];?>"/>
											<span class=" label_intro">student name</span>
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
									<label class="field_title"> Class  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="class_id"   onChange="getForm('ajax_stream_code2.php?class_id='+this.value)">
								<option value="" selected="selected"> - Select Class - </option>
							<?php
							 $sql="SELECT * FROM class ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									if($row_value['class']==$row['class_id'])
									{
										$class_sel='selected="selected"';
										
										}else
										{
											$class_sel="";
											}
									?>
									<option <?php echo $class_sel;?> value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
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
     <?php  if($row_value['stream']!=0)
				 {?>                      
                               
<li>
<div class="form_grid_12">
									<label class="field_title">Stream</label>
									<div class="form_input">
										<select name="stream" tabindex="13">
										<option value="">---select stream---</option>
                                        	 <?php 
						$i=1;
					$sql="SELECT * FROM allocate_class_stream where class_id='".$row_value['class']."' ";
					$res=mysql_query($sql);
				
							while($row=mysql_fetch_array($res))
							{
								if($row_value['stream']==$row['stream_id'])
								{
									$stream_sel='selected="selected"';
									}else
									{
										$stream_sel="";
										}
								
						$sql2="SELECT * FROM stream where stream_id='".$row['stream_id']."'";
					$stream=mysql_fetch_array(mysql_query($sql2));
					?>			<option <?php echo $stream_sel;?> value="<?php echo $row['stream_id']; ?>"><?php echo $stream['stream_name']; ?></option>
									<?php
								}
							?>
										</select>
                                        <span class=" label_intro">Stream name</span>
									</div>
								</div></li><?php } ?>
                 </ul>
                            
                            <ul>
                 <li>
								<div class="form_grid_12">
									<label class="field_title">Select Route</label>
									<div class="form_input">
										<select name="route_id" onChange="getVehicle('vehicle_ajax.php?route_id='+this.value)" style=" width:300px; height:30px;"  class="chzn-select" tabindex="20">
											<option value=""></option>
											<?php 
											$sql="select * from transport_add_route";
											$ro=mysql_query($sql);
											while($row=mysql_fetch_array($ro)){
											
											?>
                                            											<option value="<?php echo $row['route_id'];?>"><?php echo $row['route_name'];?></option><?php }?>
										</select>
									</div>
								</div>
								</li>
                                
                                <li id="vehicle_code">
								<div class="form_grid_12">
									<label class="field_title">Select Vehicle</label>
									<div class="form_input">
										<select name="vechile_id" style=" width:300px; height:30px;"  class="chzn-select" tabindex="20">
											<option value="">--select vehicle--</option>
												</select>									
									</div>
								</div>
								</li>
                           
                                
                              </ul>
                              
                              <ul style="height:auto; min-height:40px;">
								
                                
                                
                                
                                <li style="height:40px;">
								<div class="form_grid_12">
									<div class="form_input"><div class="form_grid_4 alpha">
										
										<button type="submit" name="submit" class="btn_small btn_blue"><span>Save</span></button>
										
										<a href="entry_transport_add_student.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button>
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