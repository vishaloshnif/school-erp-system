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
	$sql10="SELECT * FROM student_info where student_type='1' and  student_id='".$_GET['student_id']."' ";
	$row_value=mysql_fetch_array(mysql_query($sql10));

?>
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">RTE Admission</h3>
                    
                    
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
											<?php echo $row_value['student_admission_no'];?>									
										</div>
                                        
                                        <label class="field_title" style=" margin-left:110px; width:16%">
Admission Date <span style="color:#F00"> *</span>
</label>
                                        <div class="form_grid_4" style="margin-left:-25px;">
											<?php echo $row_value['addmission_date'];?>
								</div>
									
										<span class="clear"></span>
									</div>
                                    
                                    
                                    

									
									
								</div>
								</li>
                                
                                
                                
<!--------------------------------------------------------------->
<li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Personal Details</h4>     </li>                           
                                
                               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Roll Number* </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<?php echo $row_value['registration_no'];?>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Name* </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<?php echo $row_value['name'];?>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">  Date of Birth * </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<?php echo $row_value['dob'];?>											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Class Name </label>
									<div class="form_input">
										
							<?php
							 $sql="SELECT * FROM class where class_id='".$row_value['class']."' ";
	                           $class=mysql_fetch_array(mysql_query($sql));
							   echo $class['class_name'];
								?>
									</div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title">School Fees</label>
									<div class="form_input">
										<?php
							 $sql="SELECT * FROM fees_package where package_id='".$row_value['admission_fee']."' ";
	                           $admission_fee=mysql_fetch_array(mysql_query($sql));
							   echo $admission_fee['package_fees'];
								?>
									</div>
								</div>
								</li>
                                
                                 <li>
								<div class="form_grid_12">
									<label class="field_title">Student Type</label>
									<div class="form_input">
										<?php
							 $sql="SELECT * FROM student_type where student_type_id='".$row_value['student_type']."' ";
	                           $student_type=mysql_fetch_array(mysql_query($sql));
							   echo $student_type['student_type'];
								?>
									</div>
								</div>
								</li>
                                <?php if($row_value['stream']!=0){?>
                                <li>
								<div class="form_grid_12">
									<label class="field_title">Stream</label>
									<div class="form_input">
										<?php
							 $sql="SELECT * FROM stream where stream_id='".$row_value['stream']."' ";
	                           $stream=mysql_fetch_array(mysql_query($sql));
							   echo $stream['stream_name'];
								?>
									</div>
								</div>
								</li><?php } ?>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Category</label>
									<div class="form_input">
                                    <?php
							 $sql="SELECT * FROM category where cat_id='".$row_value['category']."' ";
	                           $category=mysql_fetch_array(mysql_query($sql));
							   echo $category['category'];
								?>
										
									</div>
								</div>
								</li>
                                
                                
                                <li>
								<div class="form_grid_12">
                              
									<label class="field_title">Gender</label>
									<div class="form_input">
                                      <?php
								echo $row_value['gender'];								
											
											?>
										
									</div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Upload User Photo (500KB max)</label>
									<div class="form_input">
										
                                        <img src="student_image/<?php echo $row_value['image'];?>" width="50" height="50">
                                        
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
											<?php echo $s_address[0];?>
											
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
											<?php echo $s_address[1];?>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Country</label>
									<div class="form_input">
										India
									</div>
								</div>
								</li>
                 
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> State </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<?php echo $row_value['state'];?>
											
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
											<?php echo $row_value['city'];?>											
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
											<?php echo $row_value['pin_code'];?>
											
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
											<?php echo $row_value['s_mobile_no'];?>
											
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
											<?php echo $row_value['s_email'];?>
											
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
											<?php echo $row_value['f_name'];?>
											
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
											<?php echo $row_value['m_name'];?>
											
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
											<?php echo $f_address[0];?>
											
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
											<?php echo $f_address[1];?>
											
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
											<?php echo $row_value['f_mobile_no'];?>
											
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
											<?php echo $row_value['f_email'];?>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>

                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Certificate Details</label>
                                    <div class="form_input">
                                    <?php if($row_value['caste_certificate']==1)
								{?>
										<div class="form_grid_5 alpha" style="height:40px;">
											Caste Certificate
											
                                            
										</div> <?php } ?> 
                                        <?php if($row_value['bonafied_certificate']==1)
								{?>
                                        
                                        <div class="form_grid_5 alpha" style="height:40px;">
										Bonafied Certificate
										</div> 
                                        <?php } ?>

                                        <?php if($row_value['income_certificate']==1)
								        {?>
                                        <div class="form_grid_5 alpha" style="height:40px;">
											Income Certificate
											
										</div> 
                                        <?php } ?>
                                         <?php if($row_value['Previous_class_certificate']==1)
								{?><div class="form_grid_5 alpha" style="height:40px;">
											Previous class documents
											
										</div><?php } ?>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
     <!-------------------------------------------------------------------------------------------------------------------->
                                
                                
							</ul>
                
                
                </form>  
                 
                 
                 
                 
                 
                 
					
			
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
<?php include_once("includes/footer.php");?>