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
<?php include_once("includes/school_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">
<h3 style="padding-left:20px; color:#1c75bc">Class Stream Detail</h3>
          <div class="grid_12">

 

           <div class="btn_30_blue" style="float:right">
								<a href="add_allocate_stream.php"><span style="width:140px">Allocate stream  </span></a>
			</div>
                            
                            
                            
          </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Class Stream detail</h6>
					</div>
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							
							<th>
								S.No.
							</th>
                             <th>
								Class
						  </th>
							<th>
								Stream Name
							</th>
                          
							<th>
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                        <?php 
						$i=1;
					$sql="SELECT * FROM allocate_class_stream";
					$res=mysql_query($sql);
				
							while($row=mysql_fetch_array($res))
							{
								
								$sql1="SELECT * FROM class where class_id='".$row['class_id']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
						$sql2="SELECT * FROM stream where stream_id='".$row['stream_id']."'";
					$stream=mysql_fetch_array(mysql_query($sql2));
					?>		
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
						
                           
							
							 <td class="center">
								<?php echo $class['class_name']; ?>
							</td>
							 <td class="center">
								<?php echo $stream['stream_name']; ?>
							</td>
							
							<td class="center">
								<span><a class="action-icons c-edit" href="edit_allocate_stream.php?sid=<?php echo $row[0]; ?>" title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="delete_allocate_stream.php?sid=<?php echo $row[0]; ?>" title="delete" onClick="return checkform1()">Delete</a></span>
							</td>
						</tr>
						
						<?php $i++;} ?>
						
						</tbody>
						
						</table>
                        
                      <script type="text/javascript" language="javascript">
									frm2=document.del;
									function checkform1()
									{
										if(confirm("Are you sure you want to delete"))
										{
											return true;
										}else
										{
											return false;
											
											}
									}
								</script>
                        
					</div>
				</div>
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
<?php include_once("includes/footer.php");?>