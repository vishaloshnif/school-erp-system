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

<?php include_once("includes/staff_setting_sidebar.php");?>
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">Employee Registration</h3>
                  <?php 
					 include_once('config/config.inc.php');
					?>
                    <?php 
					$msg="";
					$get=$_GET['staff_id'];
					if(isset($_POST['submit']))
					{
					$emp_id=$_POST['emp_id'];
					$first=$_POST['first'];
					$last=$_POST['last'];
					$email=$_POST['email'];
					$gender=$_POST['gender'];
					$department=$_POST['staff_department'];
					$category=$_POST['staff_category'];
					$position=$_POST['staff_position'];
					$qualification=$_POST['staff_qualification'];
					$job=$_POST['job_title'];
					$exp=$_POST['exp'];
					$marritial=$_POST['marritial_status'];
					$father=$_POST['father_name'];
					$mother=$_POST['mother_name'];
					$blood_group=$_POST['blood_group'];
					$nationality=$_POST['nationality'];
					$address1=$_POST['address1'];
					$address2=$_POST['address2'];
					 $image_size=$_FILES['image']['size'];
						 $path="employee_image/";
					
				if(isset($_FILES['image']['name']) && $_FILES['image']['name']!="")
				{
			 $image=$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);
					$old_image=$_POST['oldimage'];
					if($oldphoto="")
					{
						unlink($path.$oldimage);
					}
					
				
				}
				else
					{
						 $image=$_POST['oldimage'];
					}

					
					$sql1="SELECT * FROM staff_employee where email='".$email."' and staff_id!='".$get."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
					
					
				 $sql="update  staff_employee set emp_id='".$emp_id."',first='".$first."',last='".$last."',email='".$email."',gender='".$gender."',staff_cat_id='".$category."',staff_pos_id='".$position."',staff_qualification_id='".$qualification."',staff_department_id='".$department."',job_title='".$job."',exp='".$exp."',marritial_status='".$marritial."',father_name='".$father."',mother_name='".$mother."',blood_group='".$blood_group."',nationality='".$nationality."',address1='".$address1."',address2='".$address2."',image='".$image."'  where staff_id='".$get."'";
					$query=mysql_query($sql);
					$msg = "<span style='color:#009900;'><h4> Employee Detail Updated Successfully </h4></span>";
					
	}else
	{
		
		$msg = "<span style='color:#FF0000;'><h4>Employee Detail Already Exists  </h4></span>";
		}
					
					}
					$sql="select * from staff_employee where staff_id='".$get."'";
					$res=mysql_query($sql);
				while($row=mysql_fetch_array($res))
				{
					
					
					
					
					

					
					?>
                <?php if($msg!=""){echo $msg; } ?>
               	<form action="#" method="post" class="form_container left_label" enctype="multipart/form-data">
                                    

              <ul>
               
               
               
               
           <br>
<br>


    <div class="grid_12">

 <div class="btn_30_light" style="float:right">
<a href="#">
<span class="icon find_co"></span>
<span class="btn_link">Advance Search</span>
</a>
</div>

<div class="btn_30_light" style="float:right">
<a href="#">
<span class="icon database_co"></span>
<span class="btn_link">View All</span>
</a>
</div>

           
                            
                            
                            
                            </div><br><br>
<br>
  
           
               <li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">General Details</h4>     </li>
               
               
               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Employee Id</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
						<input  type="text" name="emp_id" value="<?php echo $row['emp_id'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">First Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input type="text" name="first" value="<?php echo $row['first'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Last Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input type="text" name="last" value="<?php echo $row['last'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Email</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input  type="email" name="email" value="<?php echo $row['email'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
                                <?php if($row['gender']=="male")
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
									<label class="field_title">Departmant</label>
									<div class="form_input">
										<select style=" width:300px" class="chzn-select" tabindex="13" name="staff_department">
											 <?php
                     $category="select * from staff_department";
				 $value=mysql_query($category);
					 while($dep=mysql_fetch_array($value))
					 {
			?>
											
											<option value="<?php echo $dep['staff_department_id'];?>" selected="selected"><?php echo $dep['staff_department'];?></option><?php }?>
											

										</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Staff Category</label>
									<div class="form_input">
										<select style=" width:300px" class="chzn-select" tabindex="13" name="staff_category">
                                         <?php
                     $cat="select * from staff_category";
				 $val=mysql_query($cat);
					 while($staff_category=mysql_fetch_array($val))
					 {
			?>
											
<option value="<?php echo $staff_category['staff_cat_id'];?>" selected="selected"><?php echo $staff_category['staff_category'];?></option><?php }?>
						</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Staff Position</label>
									<div class="form_input">
										<select style=" width:300px" class="chzn-select" tabindex="13" name="staff_position">
                                         <?php
                     $cate="select * from staff_position";
				 $val1=mysql_query($cate);
					 while($pos=mysql_fetch_array($val1))
					 {
			?>
											
											
											<option value="<?php echo $pos['staff_pos_id'];?>" selected="selected"><?php echo $pos['staff_position']?></option><?php }?>
											</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Qualification</label>
									<div class="form_input">
										<select style=" width:300px" class="chzn-select" tabindex="13" name="staff_qualification">
                                         <?php
                     $categ="select * from staff_qualification";
				 $value1=mysql_query($categ);
					 while($qua=mysql_fetch_array($value1))
					 {
			?>
								<option value="<?php echo $qua['staff_qualification_id'];?>" selected="selected"><?php echo $qua['staff_qualification'];?></option><?php }?>
		</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Job Title</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="job_title" type="text" value="<?php echo $row['job_title']?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Experiance</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="exp" type="text" value="<?php echo $row['exp']?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Personal Details</h4>     </li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Marrital Status</label>
									<div class="form_input">
										<select style=" width:300px" class="chzn-select" tabindex="13" name="marritial_status">
											
											
											<option selected="selected">Single</option>
											<option selected="selected">Married</option>
											<option selected="selected">Unmarried</option>
											<option selected="selected">Divorce</option>
                                           

<option>Other</option>


										</select>
									</div>
								</div>
								</li>
                               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Father Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="father_name" type="text" value="<?php echo $row['father_name'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Mother Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="mother_name" type="text" value="<?php echo $row['mother_name'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Blood Group</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="blood_group" type="text" value="<?php echo $row['blood_group'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Nationality</label>
									<div class="form_input">
										<select style=" width:300px" class="chzn-select" tabindex="13" name="nationality">
											
											
											<option selected="selected">India</option>
											<option selected="selected">American</option>
											<option selected="selected">China</option>
											<option selected="selected">Japn</option>
                                           

<option>Other</option>


										</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">

									<label class="field_title">Address1</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="address1" type="text" value="<?php echo $row['address1'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Address2</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="address2" type="text" value="<?php echo $row['address2'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Employee Photo</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="image" type="file"/><img style="width:40px; height:40px" src="employee_image/<?php echo $row['image']?>">
                                            <input type="hidden" name="oldimage" value="<?php echo $row['image'];?>">
											
										</div><?php }?>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li> 
       
                                
                                <li>
								<div class="form_grid_12">
									<div class="form_input">
										
										<button type="submit" class="btn_small btn_blue" name="submit"><span>Submit</span></button>
										
										
										
									</div>
								</div>
								</li>
                                



                </form>  

					
			
			</div>
            
            
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
<?php include_once("includes/footer.php");?>