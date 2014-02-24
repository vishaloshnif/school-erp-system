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
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">Employee Resistration</h3>
                  <?php 
					 include_once('config/config.inc.php');
					?>
                    <?php 
					$msg="";
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
						  $image_name=$_FILES['image']['name'];
						   move_uploaded_file($_FILES['image']['tmp_name'],$path.$image_name);
					
					$select_employee_q="select * from staff_employee where email='".$email."'";
					$select_num_row=mysql_num_rows(mysql_query($select_employee_q));
					
					if($select_num_row==0)
					{
				 $sql="insert into staff_employee(emp_id,first,last,email,gender,staff_department_id,staff_cat_id,staff_pos_id,staff_qualification_id,job_title,exp,marritial_status,father_name,mother_name,blood_group,nationality,address1,address2,image) values('".$emp_id."','".$first."','".$last."','".$email."','".$gender."','".$department."','".$category."','".$position."','".$qualification."','".$job."','".$exp."','".$marritial."','".$father."','".$mother."','".$blood_group."','".$nationality."','".$address1."','".$address2."','".$image_name."')";
					$query=mysql_query($sql);
					
				$msg = "<span style='color:#009900;'><h4> Employee Detail Added Successfully </h4></span>";
					}else
					{
						
						$msg = "<span style='color:#FF0000;'><h4> Employee Detail Already Exists </h4></span>";
						}
					}
					
					
					

					
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
						<input  type="text" name="emp_id"/>
											
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
											<input type="text" name="first"/>
											
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
											<input type="text" name="last"/>
											
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
											<input  type="email" name="email"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Gender</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input  type="radio" name="gender" value="male"/>Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input  type="radio" name="gender" value="female"/>Female
											
										</div>
									
										<span class="clear"></span>
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
											
											<option value="<?php echo $dep['staff_department_id'];?>"><?php echo $dep['staff_department'];?></option><?php }?>
											

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
											
<option value="<?php echo $staff_category['staff_cat_id'];?>"><?php echo $staff_category['staff_category'];?></option><?php }?>
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
											
											
											<option value="<?php echo $pos['staff_pos_id'];?>"><?php echo $pos['staff_position']?></option><?php }?>
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
								<option value="<?php echo $qua['staff_qualification_id'];?>"><?php echo $qua['staff_qualification'];?></option><?php }?>
		</select>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Job Title</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="job_title" type="text"/>
											
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
											<input name="exp" type="text"/>
											
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
											<option value=""></option>
											
											<option>Single</option>
											<option>Married</option>
											<option>Unmarried</option>
											<option>Divorce</option>
                                           

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
											<input name="father_name" type="text"/>
											
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
											<input name="mother_name" type="text"/>
											
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
											<input name="blood_group" type="text"/>
											
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
											<option value=""></option>
											
											<option>India</option>
											<option>American</option>
											<option>China</option>
											<option>Japn</option>
                                           

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
											<input name="address1" type="text"/>
											
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
											<input name="address2" type="text"/>
											
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
											<input name="image" type="file"/>
											
										</div>
									
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