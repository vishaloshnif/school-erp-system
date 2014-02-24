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
<?php include_once("includes/account_setting_sidebar.php");?>
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap" >
					<h3 style="padding-left:20px; color:#1c75bc">Account Management</h3>
				
				
                	<form action="account_report.php" method="post" class="form_container left_label">
							
                                
                              
                              <ul style="height:auto; min-height:80px;">
								
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Category type</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="category_type" >
							<option value="Income">Income</option>
                            <option value="Expense">Expense</option>
							</select>
											<span class=" label_intro">Category name</span>
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
									<label class="field_title"> Date From</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input type="text" name="date_from" class="datepicker">
											<span class=" label_intro">date from</span>
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
									<label class="field_title"> Date To</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input type="text" name="date_to" class="datepicker">
											<span class=" label_intro">date to</span>
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