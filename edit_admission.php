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

<?php include_once("includes/sidebar.php");?>

<?php 
if(isset($_POST['submit']))
{ 
	$registration_no=$_POST['registration_no'];
	$addmission_date=$_POST['addmission_date'];
	$name=$_POST['name'];
   $dob=date('d-m-Y',strtotime(implode("-",$_POST['dob'])));
	
	$class=$_POST['class'];
	$stream=$_POST['stream'];
	$subject=$_POST['subject'];
	$category=$_POST['category'];
	$gender=$_POST['gender'];
	$student_type=$_POST['student_type'];
	$admission_fee=$_POST['admission_fee'];
	if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!="")
	{
		 $path="student_image/";
		$image="st_image_".rand(100,999999999)."_".$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);
		
		
		}else
		{
			
			$image=$_POST['oldphoto'];
			}
		$s_address=$_POST['s_address1']."<br/>".$_POST['s_address2'];	
		$country=$_POST['country'];
		$state=$_POST['state'];
		$city=$_POST['city'];
		$pin_code=$_POST['pin_code'];
		$s_mobile_no=$_POST['s_mobile_no'];
		$s_email=$_POST['s_email'];
		$f_name=$_POST['f_name'];
		$m_name=$_POST['m_name'];
		$f_address=$_POST['f_address1']."<br/>".$_POST['f_address2'];	
	    $f_mobile_no=$_POST['f_mobile_no'];
		$f_email=$_POST['f_email'];
		 $caste_certificate=$_POST['caste_certificate'];
					$bonafied_cetificate=$_POST['bonafied_cetificate'];
					$income_certificate=$_POST['income_certificate'];
					$previous_class_certificate=$_POST['previous_class_certificate'];
					
					 $sql1="SELECT * FROM student_info where registration_no='".$registration_no."' and student_id!='".$_GET['student_id']."' ";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
		 $sql_update_q="update student_info set caste_certificate='".$caste_certificate."',income_certificate='".$income_certificate."',previous_class_certificate='".$previous_class_certificate."',bonafied_cetificate='".$bonafied_cetificate."', name='".$name."',dob='".$dob."',class='".$class."',stream='".$stream."',subject='".$subject."',student_type='".$student_type."',admission_fee='".$admission_fee."',category='".$category."',gender='".$gender."',image='".$image."',s_address='".$s_address."',country='".$country."',state='".$state."',city='".$city."',pin_code='".$pin_code."',s_mobile_no='".$s_mobile_no."',s_email='".$s_email."',f_name='".$f_name."',m_name='".$m_name."',f_address='".$f_address."',f_mobile_no='".$f_mobile_no."',f_email='".$f_email."' where student_id='".$_GET['student_id']."' ";
	mysql_query($sql_update_q);
	header('location:edit_admission.php?msg=1&&student_id='.$_GET['student_id']);
	}else
	{ 
	header('location:edit_admission.php?error=2&&student_id='.$_GET['student_id']);
		
		
		}
	
	
} 

     if($_GET['msg']==1)
	{
		$msg = "<span style='color:#009900;'><h4> Student Detail Updated Successfully </h4></span>";
	}
	 if($_GET['error']==1)
	{
		$msg = "<span style='color:#FF0000;'><h4> Student Detail Already Exists </h4></span>";
	}
	
	 if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> S. R. Number  Detail Already Exists </h4></span>";
	}
	
	
	$sql10="SELECT * FROM student_info where student_id='".$_GET['student_id']."' ";
	$row_value=mysql_fetch_array(mysql_query($sql10));

?>
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">Admission</h3>
                    
                    
                  <?php if($msg!=""){echo $msg; } ?>
               	<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
                                    

              <ul>
               
               
               
               
           
    <h5 style="padding-left:20px; color: #666;">   Fields marked with<span style="color:#F00"> *</span> must be filled.</h5><br>
           
               
               
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title" style="width:15%"> S R Number<span style="color:#F00"> *</span>
</label>
                                    <div class="form_input" >
										
                                        <div class="form_grid_4 alpha"  >
											<input name="registration_no"    type="text" style=" margin-left:-192px;" value="<?php echo $row_value['registration_no'];?>" required/>										
										</div>
                                        
                                        <label class="field_title" style=" margin-left:110px; width:16%">
Admission Date <span style="color:#F00"> *</span>
</label>
                                        <div class="form_grid_4" style="margin-left:-25px;">
											<input name="addmission_date" type="text" value="<?php echo $row_value['addmission_date'];?>" readonly/>
								</div>
									
										<span class="clear"></span>
									</div>
                                    
                                    
                                    

									
									
								</div>
								</li>
                                
                                
                                
<!--------------------------------------------------------------->
<li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Personal Details</h4>     </li>                           
                                
                               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Name* </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="name" type="text"  value="<?php echo $row_value['name'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                
                                
                                
                                <?php 
								$arr_dob=explode("-",$row_value['dob']);
								?>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">  Date of Birth * </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha" style="width:400px;">
                                        
											<select name="dob[]">
                                            
                                            <?php for($i=1;$i<=31;$i++){
												
												if($i==$arr_dob[0])
												{
													$day_sel='selected="selected"';
													
													}
													else
													{
														$day_sel=" ";
													}
												?>
                                            <option <?php echo $day_sel;?>  value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php } ?>
                                            </select>
                                            <select name="dob[]">
                                         
                                            <?php for($i=1;$i<=12;$i++){
												
												if($i==$arr_dob[1])
												{
													$month_sel='selected="selected"';
													
													}
													else
													{
														$month_sel=" ";
													}
												?>
                                            <option <?php echo $month_sel;?> value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php } ?>
                                            </select>
                                            <select name="dob[]">
                                           
                                            <?php for($i=2012;$i>=1950;$i--){
												if($i==$arr_dob[2])
												{
													$year_sel='selected="selected"';
													
													}
													else
													{
														$year_sel=" ";
													}
												
												?>
                                            <option <?php echo $year_sel;?> value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php } ?>
                                            </select>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Class Name </label>
									<div class="form_input">
										<select style=" width:300px" name="class" class="chzn-select" tabindex="13">
											<option value="" selected="selected"> - Select Class - </option>
							<?php
							 $sql="SELECT * FROM class ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									if($row['class_id']==$row_value['class'])
									{
										$class='selected="selected"';
										}else
										{
											$class="";
											
											}
									?>
									<option  <?php echo $class;?> value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Stream</label>
									<div class="form_input">
										<select style=" width:300px" name="stream" class="chzn-select" tabindex="13">
										<option value="">---select stream---</option>
                                        	<?php
							 $sql="SELECT * FROM stream ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									if($row['stream_id']==$row_value['stream'])
									{
										$stream='selected="selected"';
										}else
										{
											$stream="";
											
											}
									?>
									<option <?php echo $stream; ?> value="<?php echo $row['stream_id']; ?>"><?php echo $row['stream_name']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Optional Subject</label>
									<div class="form_input">
										<select style=" width:300px" name="subject" class="chzn-select" tabindex="13">
										<option value="">---Select Subject---</option>
                                        	<?php
							 $sql="SELECT * FROM subject ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									if($row['subject_id']==$row_value['subject'])
									{
										$stream='selected="selected"';
										}else
										{
											$stream="";
											
											}
									?>
									<option <?php echo $stream; ?> value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_name']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>

                                <li>
								<div class="form_grid_12">
									<label class="field_title">Student  Type </label>
									<div class="form_input">
										<select style=" width:300px" name="student_type" class="chzn-select" tabindex="13"  >
											<option value="" selected="selected"> - Select Studnet Type - </option>
							<?php
							 $sql="SELECT * FROM student_type ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									if($row_value['student_type']==$row[0]){
										$student_type_select='selected="selected"';
										}else
										{
																					$student_type_select='';
											}
									
									?>
									<option <?php echo $student_type_select;?> value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> School fees</label>
									<div class="form_input">
										<select style=" width:300px" name="admission_fee" class="chzn-select" tabindex="13">
											<option value="" selected="selected"> - Select Class - </option>
							<?php
							 $sql="SELECT * FROM fees_package ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									if($row[0]==$row_value['admission_fee'])
									{
										$class='selected="selected"';
										}else
										{
											$class="";
											
											}
									?>
									<option  <?php echo $class;?> value="<?php echo $row[0]; ?>"><?php echo $row['package_name']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Category</label>
									<div class="form_input">
										<select style=" width:300px" name="category" class="chzn-select" tabindex="13">
                                        <option value="">---select category---</option>
											<?php
							 $sql="SELECT * FROM category ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									
									if($row['cat_id']==$row_value['category'])
									{
										$category='selected="selected"';
										}else
										{
											$category="";
											
											}
									?>
									<option <?php echo $category;?> value="<?php echo $row['cat_id']; ?>"><?php echo $row['category']; ?></option>
									<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                
                                
                                <li>
								<div class="form_grid_12">
                                <?php if($row_value['gender']=="male")
									{
										$male='checked="checked"';
										}else
										{
											$female='checked="checked"';
											
											}?>
									<label class="field_title">Gender</label>
									<div class="form_input">
										<span>
										<input <?php echo $male;?> name="gender" class="radio" type="radio" value="male" tabindex="10">
										<label class="choice">Male</label>
										</span><span>
										<input name="gender"  <?php echo $female;?> class="radio" type="radio" value="female" tabindex="11">
										<label class="choice">Female</label>
										</span><span>
										
										
										</span>
									</div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Upload User Photo (500KB max)</label>
									<div class="form_input">
										<input name="image" type="file">
                                        <img src="student_image/<?php echo $row_value['image'];?>" width="50" height="50">
                                        <input type="hidden" name="oldphoto" value="<?php echo $row_value['image'];?>">
									</div>
								</div>
								</li>
                                
                                
                                
                                
                                
                                
                                
  <!------------------------------------------------------------>                            
                                
								<li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Contact Details </h4>     </li>
                                
                                   <li>
                                   <?php $s_address=explode("<br/>",$row_value['s_address']);?>
								<div class="form_grid_12 multiline">
									<label class="field_title">  Address Line 1</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="s_address1" type="text" value="<?php echo $s_address[0];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Address Line 2</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="s_address2" type="text" value="<?php echo $s_address[1];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Country</label>
									<div class="form_input">
										<select style=" width:300px" class="chzn-select" name="country" tabindex="13">
											
											
											<option value="India" selected="selected">India</option>
												</select>
									</div>
								</div>
								</li>
                 
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> State </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="state" type="text" value="<?php echo $row_value['state'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> City </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="city" type="text" value="<?php echo $row_value['city'];?>" />
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Pin Code </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="pin_code" type="text"  value="<?php echo $row_value['pin_code'];?>" />
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Mobile No. / Telephone No.</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="s_mobile_no" type="text" value="<?php echo $row_value['s_mobile_no'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Email Id</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="s_email" type="text" value="<?php echo $row_value['s_email'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                
                                
                                
 <!---------------------------------------------------------------->                               
                                
                                
                                
                               
                             
      
                                
                                  <!--------------------------------------------------------------->
<li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Parents Details</h4>     </li>                           
                                
                               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">  Father's Name* </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="f_name" type="text" value="<?php echo $row_value['f_name'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">  Mother's Name* </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="m_name" type="text" value="<?php echo $row_value['m_name'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                 <?php $f_address=explode("<br/>",$row_value['f_address']);?>
                                  <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">  Address Line 1</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="f_address1" type="text" value="<?php echo $f_address[0];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Address Line 2</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="f_address2" type="text" value="<?php echo $f_address[1];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                 <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Mobile No. / Telephone No.</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="f_mobile_no" type="text" value="<?php echo $row_value['f_mobile_no'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Email Id</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="f_email" type="text" value="<?php echo $row_value['f_email'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <?php $caste_certificate="";
								$previous_class_certificate="";
								$income_certificate="";
								$bonafied_cetificate="";
								if($row_value['caste_certificate']==1)
								{
									$caste_certificate='checked="checked"';
									
									}
								
								if($row_value['bonafied_cetificate']==1)
								{
									$bonafied_cetificate='checked="checked"';
									
									
									}
								
								if($row_value['income_certificate']==1)
								{
									
									$income_certificate='checked="checked"';
									
									}
								
								if($row_value['Previous_class_certificate']==1)
								{
									
									$previous_class_certificate='checked="checked"';
								}
								
								
								?>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Certificate details</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="caste_certificate" <?php echo $caste_certificate;?> type="checkbox" value="1"/> Caste Certificate
											
										</div><div class="form_grid_5 alpha">
											<input name="bonafied_cetificate" <?php echo $bonafied_cetificate;?> type="checkbox" value="1"/> Bonafied Certificate
											
										</div><div class="form_grid_5 alpha">
											<input name="income_certificate" <?php echo $income_certificate;?> type="checkbox" value="1"/> Income  Certificate
											
										</div><div class="form_grid_5 alpha">
											<input <?php echo $previous_class_certificate;?> name="previous_class_certificate" type="checkbox" value="1"/> Previous Class Documents
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>

                                
     <!-------------------------------------------------------------------------------------------------------------------->
                                <li>
								<div class="form_grid_12">
									<div class="form_input">
										
										<button type="submit"  name="submit" class="btn_small btn_blue"><span>Save </span></button> <a href="student_detail.php"><button type="button"  name="submit" class="btn_small btn_blue"><span>Back </span></button></a>
										
										
										
									</div>
								</div>
								</li>
                                
							</ul>
                
                
                </form>  
                 
                 
                 
                 
                 
                 
					
			
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
<?php include_once("includes/footer.php");?>