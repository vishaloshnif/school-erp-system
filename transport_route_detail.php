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
<?php include_once("includes/transport_setting_sidebar.php");
if($_GET['sid']!='')
{
mysql_query("delete from transport_add_route where route_id='".$_GET['sid']."'");	
}

?>


<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">
<h3 style="padding-left:20px; color:#1c75bc">Route Detail</h3>
          <div class="grid_12">

 

           <div class="btn_30_blue" style="float:right">
								<a href="transport_add_route.php"><span style="width:140px">Add New Route</span></a>
							</div>
                            
                            
                            
                            </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Route Managment</h6>
					</div>
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							<th>
								S.No.
							</th>
							<th>
							Destination 
							</th>
                           <th>
							Cost
							</th>
                           <th>
								 Action
							</th>
						
                        </tr>
						</thead>
						<tbody>
						<?php 
						$i=0;
						$sql="select * from transport_add_route";
						$sql_value=mysql_query($sql);
						while($sql_row=mysql_fetch_array($sql_value)){
						$i++;?>
                        <tr>
                        
                        <td class="center">
								<?php echo $i;?>						</td>
								<td class="center">
								<?php echo $sql_row['route_name'];?>						</td>
							<td class="center">
							<span style="color:#f04508">	<?php echo $sql_row['cost'];?></span>
							</td>
							<td class="center">
								<span><a class="action-icons c-edit" href="transport_route_edit.php?sid=<?php echo $sql_row[0]; ?>" title="Edit">Edit</a></span>
                                <span><a class="action-icons c-delete" href="transport_route_detail.php?sid=<?php echo $sql_row[0]; ?>" title="delete" onClick="return checkform1()">Delete</a></span>
	
							</td>
						</tr>
						<?php }?>
						
						
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
</body>
</html>