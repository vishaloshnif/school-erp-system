<?php include_once("includes/header.php");?>
<?php 
$msgs='';
if(isset($_POST['submit']))
{
	

	
	 $sql1="SELECT * FROM exam_add_maximum_marks where subject_id='".$_POST['subject_id']."' and session='".$_SESSION['session']."'  ";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	
	if($num==0)
	{
		if($_POST['subject_id']!='')
		{
			
	       $sql3="INSERT INTO  exam_add_maximum_marks(class_id,stream_id,subject_id,term_id,max_marks,session) VALUES ('".$_POST['class_id']."','".$_POST['stream']."', '".$_POST['subject_id']."','".$_POST['term_id']."', '".$_POST['marks']."','".$_SESSION['session']."')";
		   $res3=mysql_query($sql3) or die("Error : " . mysql_error());
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
<?php include_once("includes/sidebar.php");?>
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap" >
					<h3 style="padding-left:20px; color:#1c75bc">Student transfer certificate</h3>
				
				
                	<form action="student_tc.php" method="post" class="form_container left_label">
							<ul  style="height:auto; min-height:80px;">
								
								
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title" style="width:15%"> S R Number<span style="color:#F00"> *</span>
</label>
                                    <div class="form_input" >
										
                                        <div class="form_grid_4 alpha"  >
											<input name="registration_no"   onBlur="getCheckreg('checkregno.php?registration_no='+this.value)" type="text" style=" margin-left:-192px;" />										
										</div>
                                        
                                        <label class="field_title" style=" margin-left:110px; width:16%">
OR <span style="color:#F00"> *</span>
</label>
                                        <div class="form_grid_4" style="margin-left:-25px;">
											<a  href="student_tc_search_by_name.php" style="text-decoration:underline"><input type="button" name="search" value="search by name" class="btn_small btn_orange"></a>
								</div>
									
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
									<div class="form_input"><div class="form_grid_4 alpha">
										
										<button type="submit" name="entry_submit" class="btn_small btn_blue"><span>Submit</span></button>
										
										<a href="exam_show_maximum_marks.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button>
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