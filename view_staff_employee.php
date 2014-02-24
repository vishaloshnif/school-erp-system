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
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">View Employee Registration</h3>
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
				$row=mysql_fetch_array($res);
				
					
					
					
					
					
 $staff="select * from staff_department where staff_department_id='".$row['staff_department_id']."'";
					$staff_sel=mysql_query($staff);
					$staff_sel_row=mysql_fetch_array($staff_sel);
					
					
					 $staff_cat="select * from staff_category where staff_cat_id='".$row['staff_cat_id']."'";
					$staff_cat_sel=mysql_query($staff_cat);
					$staff_sel_cat=mysql_fetch_array($staff_cat_sel);
					
					 $staff_pos="select * from staff_position where staff_pos_id='".$row['staff_pos_id']."'";
					$staff_pos_sel=mysql_query($staff_pos);
					$staff_sel_pos=mysql_fetch_array($staff_pos_sel);
					
					 $staff_qua="select * from staff_qualification where staff_qualification_id='".$row['staff_qualification_id']."'";
					$staff_qua_sel=mysql_query($staff_qua);
					$staff_sel_qua=mysql_fetch_array($staff_qua_sel);
					
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
									<label class="field_title">Employee Photo</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<img style="width:40px; height:40px" src="employee_image/<?php echo $row['image']?>">
                                           
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
               
               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Employee Id</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
						<?php echo $row['emp_id']; ?>
											
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
											 <?php echo $row['first']; ?>
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
											<?php echo $row['last'];?>
											
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
											<?php echo $row['email'];?>
											
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
										<?php echo $row['gender'];?>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Departmant</label>
									<div class="form_input">
										<?php echo $staff_sel_row['staff_department'];?>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Staff Category</label>
									<div class="form_input">
										<?php echo $staff_sel_cat['staff_category'];?>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Staff Position</label>
									<div class="form_input">
										<?php echo $staff_sel_pos['staff_position'];?>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Qualification</label>
									<div class="form_input">
										<?php echo $staff_sel_qua['staff_qualification'];?>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Job Title</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<?php echo $row['job_title'];?>
											
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
											<?php echo $row['exp']?>
											
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
										<?php echo $row['marritial_status'];?>
									</div>
								</div>
								</li>
                               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Father Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<?php echo $row['father_name'];?>
											
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
											<?php echo $row['mother_name'];?>
											
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
											<?php echo $row['blood_group'];?>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Nationality</label>
									<div class="form_input">
										<?php echo $row['nationality'];?>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">

									<label class="field_title">Address1</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<?php echo $row['address1'];?>
											
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
											<?php echo $row['address2'];?>
											
										</div>
									
										<span class="clear"></span>
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