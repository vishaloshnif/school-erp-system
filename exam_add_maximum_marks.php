<?php include_once("includes/header.php");?>
<?php 
$msgs='';
if(isset($_POST['submit']))
{
	

	
	 $sql1="SELECT * FROM exam_add_maximum_marks where class_id='".$_POST['class_id']."'  and session='".$_SESSION['session']."' and term_id='".$_POST['term_id']."'  ";
	if($_POST['stream']!="")
	{
		
		$sql1.="and stream_id='".$_POST['stream']."'";
		}
	
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
		if($_POST['subject_id']!='')
		{
			$subject_id=$_POST['subject_id'];
			$marks=$_POST['marks'];
			$no_of_subject=sizeof($subject_id);
			for($i=0;$i<$no_of_subject;$i++)
			{
	 $sql3="INSERT INTO  exam_add_maximum_marks(class_id,stream_id,subject_id,term_id,max_marks,session) VALUES ('".$_POST['class_id']."','".$_POST['stream']."', '".$subject_id[$i]."','".$_POST['term_id']."', '".$marks[$i]."','".$_SESSION['session']."')";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
			}
		//header("Location:exam_show_maximum_marks.php?msg=1");
			
			
		}
		else
		{   
		 header("location:exam_add_maximum_marks.php?error=2");
			
		}
		
	}
	else
	{
		header("location:exam_add_maximum_marks.php?error=1");
	}
}


if($_GET['msg']==1)
	{
		$msg = "<span style='color:#009900;'><h4> Subject Maximum marks Detail Added Successfully </h4></span>";
	}
	 if($_GET['error']==1)
	{
		$msg = "<span style='color:#FF0000;'><h4> Subject Maximum marks Detail Already Exists </h4></span>";
	}

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
<?php include_once("includes/exam_setting_sidebar.php");?>
<?php if(isset($_POST['entry_submit'])){
	
	$_SESSION['class_id']=$_POST['class_id'];
	$_SESSION['stream_id']=$_POST['stream'];
	$_SESSION['term_id']=$_POST['term_id'];
	
	
	}?>
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap" >
					<h3 style="padding-left:20px; color:#1c75bc">Exam Marks Managment</h3>
				<?php if($msg!=""){echo $msg; } ?>
				
                	<form action="" method="post" class="form_container left_label">
							<ul  style="height:auto; min-height:40px;">
								
								
                                
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
									if($_SESSION['class_id']==$row['class_id'])
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
     <?php  if($_SESSION['stream_id']!="")
				 {?>                      
                               
<li>
<div class="form_grid_12">
									<label class="field_title">Stream</label>
									<div class="form_input">
										<select name="stream" tabindex="13">
										<option value="">---select stream---</option>
                                        	 <?php 
						$i=1;
					$sql="SELECT * FROM allocate_class_stream where class_id='".$_SESSION['class_id']."' ";
					$res=mysql_query($sql);
				
							while($row=mysql_fetch_array($res))
							{
								if($_SESSION['stream_id']==$row['stream_id'])
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
									if($_SESSION['term_id']==$row22['term_id'])
									{
										$term_sel='selected="selected"';
										
										}else
										{  
										   $term_sel="";
											
											}
									?>
									<option <?php echo $term_sel;?> value="<?php echo $row22['term_id']; ?>"><?php echo $row22['term_name']; ?></option>
									<?php
								}
							?>
							</select> <span class="clear"></span>
												</div>
						
                                      		</div>
								</div>
								</li>
                 <?php  if($_SESSION['stream_id']!="")
				 {
							 $sql="SELECT * FROM allocate_class_subject where class_id='".$_SESSION['class_id']."' and stream_id='".$_SESSION['stream_id']."' ";
				 }else
				 {
					 $sql="SELECT * FROM allocate_class_subject where class_id='".$_SESSION['class_id']."' ";
			
					 
					 }
					 $res=mysql_query($sql);?>
                     <?php 
				
							while($row=mysql_fetch_array($res))
							{
								
								$sql3="SELECT * FROM subject where subject_id='".$row['subject_id']."'";
					           $subject=mysql_fetch_array(mysql_query($sql3));
									?>
							<li>	<div class="form_grid_12 multiline">
									<label class="field_title"> <?php echo ucfirst($subject['subject_name']); ?></label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input type="text" name="marks[]" required>
                                            <input type="hidden" name="subject_id[]" value="<?php echo $subject['subject_id']?>">
											<span class=" label_intro"><?php echo ucfirst($subject['subject_name']); ?></span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div></li>
                                <?php
								}
							?>
                                
                                
                              </ul>
                              
                              <ul style="height:auto; min-height:40px;">
								
                                
                                
                                
                                <li style="height:40px;">
								<div class="form_grid_12">
									<div class="form_input"><div class="form_grid_4 alpha">
										
										<button type="submit" name="submit" class="btn_small btn_blue"><span>Save</span></button>
										
										<a href="entry_add_max_marks.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button>
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