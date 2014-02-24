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
<h3 style="padding-left:20px; color:#1c75bc">Staff Qualification List</h3>
          <div class="grid_12">

 

           <div class="btn_30_blue" style="float:right">
								<a href="add_staff_qualification.php"><span style="width:140px">Add Qualification </span></a>
							</div>
                            
                            
                            
                            </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Staff Qualification</h6>
					</div>
                   
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							
							<th>
								S.No.
							</th>
							<th>
								 Staff Qualification 
							</th>
							
							<th>
								 Action
							</th>
						</tr>
						</thead>
                         <?php
                include_once('config/config.inc.php');
				?>
                <?php $i=1;
				
               $sql="select * from staff_qualification order by staff_qualification asc";
				$res=mysql_query($sql);
				while($row=mysql_fetch_array($res))
				
				{
				?>
						<tbody>
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
						<td class="center">
								<?php echo $row['staff_qualification'];?>
							</td>
							
							
							
							
							<td class="center">
								<span><a class="action-icons c-edit" href="edit_staff_qualification.php?staff_qualification_id=<?php echo $row['staff_qualification_id']?>" title="Edit">Edit</a></span> <a class="action-icons c-delete" href="delete_staff_qualification.php?staff_qualification_id=<?php echo $row['staff_qualification_id'];?>" title="delete"><span>Delete</span></a>
							</td>
						</tr><?php $i++; }?>
						
						
						
						</tbody>
						
						</table>
                        
                        
                        
					</div>
				</div>
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
<?php include_once("includes/footer.php");?>