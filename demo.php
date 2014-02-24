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
					<input name="search" type="submit" value="" class="search_btn">
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
        <div class="widget_wrap" style="height:1000px">
          <form action="#" method="post" class="form_container left_label">
            <ul style="height:auto">
              <li>
                <div style="width:640px; height:auto; float:left; margin-left:10px;">
                  <div style="width:540px; height:30px;  float:left; ">
                    <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                      <div style="width:200px; height:30px;  float:left; margin-left:-100px">
                        <div id="container2">
                          <div id="content2">
                            <div class="grid_container">
                              <div class="grid_12">
                                <div class="widget_wrap" style="height:600px">
                                  <h3 style="padding-left:20px; color:#1c75bc">Employee Details</h3>
                           
                                  <ul style="height:auto">
                                         <?php include_once('config/config.inc.php');
					$get=$_GET['staff_id'];
		$sql="select * from staff_employee where staff_id='".$get."'";
					$res=mysql_query($sql);
				while($row=mysql_fetch_array($res))
				{
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
                                    <li>
                                      <div style="width:150px; height:auto; margin-left:10px; border:2px solid #dfdfdf; float:left; margin-top:3px">
                                        <div style="width:180px; height:150px; margin-left:0px "> <a href="change_piture.php?menu=6"> <img src="img/employee_image/<?php echo $row['image'];?>" width="150" height="150" ></a> </div>
                                        <div style="width:150px; height:30px; margin-top:-10px;background:#CCC">
                                          <h3 align="center" style=" padding-top:1px;"><a href="change_piture.php?menu=6" style="text-decoration:none;color:#0059AC">Change Picture</a></h3>
                                        </div>
                                      </div>
                                      <div style="width:640px; height:auto; float:left; margin-left:50px; margin-top:-250px">
                                        <div style="width:540px; height:30px;  float:left; ">
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Emp Id.</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['emp_id']; ?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>First Name</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp; <?php echo $row['first']; ?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Last Name</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['last'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Email</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['email'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Gender </h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['gender'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Department</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $staff_sel_row['staff_department'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Category</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $staff_sel_cat['staff_category'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Position </h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $staff_sel_pos['staff_position'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Qualification </h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $staff_sel_qua['staff_qualification'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Job Title </h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['job_title'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Experience </h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['exp'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Marritial Status </h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['marritial_status'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Father Name</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['father_name'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Mother Name</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['mother_name'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Blood Group</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['blood_group'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Nationality</h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['nationality'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Address1 </h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['address1'];?></h3>
                                            </div>
                                          </div>
                                          <div style="width:540px; height:30px;  float:left; margin-left:160px;">
                                            <div style="width:180px; height:30px;  float:left;">
                                              <h3>Address2 </h3>
                                            </div>
                                            <div style="width:250px; height:30px;  float:left; margin-left:50px">
                                              <h3 style="color:#333">:&nbsp;&nbsp;<?php echo $row['address2'];?></h3>
                                            </div><?php }?>
                                          </div>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <span class="clear"></span> </div>
                            <span class="clear"></span> </div>
                        </div>
                        <h3>&nbsp;</h3>
                      </div>
                    </div>
                  </div>
                </div>
                </li>
              </ul>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once("includes/footer.php");?>