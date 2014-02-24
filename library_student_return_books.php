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
<?php include_once("includes/library_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">
<h3 style="padding-left:20px; color:#1c75bc">Student return books Detail</h3>

          <div class="grid_12">

 

           <div class="btn_30_blue" style="float:right">
								
			</div>
                            
                            
                            
          </div>
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list_images"></span>
						<h6>Student Books Detail</h6>
					</div>
					<div class="widget_content">
						
						<table class="display data_tbl" >
						<thead>
						<tr>
							
							<th>
								S.No.
							</th>
							<th>
								Student   Name
							</th>
                          <th>
								Class
							</th>
                          <th>
								Book Name
							</th>
                               
                          <th>
								Book number
							</th>
                            <th>
								Issue date
							</th>
                              <th>
								 Fine Amount
							</th>
                            <th>
								Session  
							</th>
							<th>
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                        <?php 
					if($_GET['registration_no']!="")
					{
						$_SESSION['registration_no']=$_GET['registration_no'];
						
					}
						
						if($_POST['registration_no']!="")
						{
							$_SESSION['registration_no']=$_POST['registration_no'];
							}
					
					$sql="SELECT * FROM student_books_detail where session='".$_SESSION['session']."' and registration_no='".$_SESSION['registration_no']."' and booking_status='1'";
					$res=mysql_query($sql);
					    //  $mytablename="student_fees_detail";
				          //include_once("fees_manager_pagination.php");
						  	$i=1;
							/*if($_GET['page']=="")
							{
								$_GET['page']=1;
								
								}
								
								$i=($_GET['page']-1)*$limit+1;*/
							while($row=mysql_fetch_array($res))
							{
								
								$select_fine_days="select * from library_fine_manager where session='".$_SESSION['session']."'";
$res_select=mysql_query($select_fine_days);
$row_fine=mysql_fetch_array($res_select);

$row_fine_days=$row_fine['no_of_days']-1;
$row_fine_rate=$row_fine['fine_rate'];

 $return_date=date('Y-m-d',strtotime($row['issue_date']."+".$row_fine_days."days"));

$now = time(); // or your date as well
     $your_date = strtotime($return_date);
     $datediff = $now - $your_date;
      $number_of_days=floor($datediff/(60*60*24));
	 
				
				if($number_of_days>0)
				{
					$total_fine=$number_of_days*$row_fine_rate;
				}else
				{
					$total_fine=0;
				}
								
								$sql="SELECT * FROM student_info where registration_no='".$row[1]."' ";
	                           $student_info=mysql_fetch_array(mysql_query($sql));
							   
							   $sql1="SELECT * FROM class where class_id='".$student_info['class']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
							   $sql1="SELECT * FROM book_manager where book_number='".$row['book_number']."' ";
	                           $book_detail=mysql_fetch_array(mysql_query($sql1));
								
								
								?>
						<tr>
							
							<td class="center">
								<a href="#"><?php echo $i;?></a>
							</td>
						
                            <td class="center">
								<?php echo $student_info['name']; ?>
							</td>
                             <td class="center">
								<?php echo $class['class_name']; ?>
							</td>
							<td class="center">
								<?php echo $book_detail['book_name']; ?>
							</td>
                            <td class="center">
								<?php echo $book_detail['book_number']; ?>
							</td>
							
                            <td class="center">
								<?php echo date('d-m-Y',strtotime($row['issue_date'])); ?>
							</td>
							<td class="center"><?php echo $total_fine;?></td>
                            <td class="center">
								<?php echo $row['session']; ?>
							</td>
							
							
							<td class="center">
							<span><a class="action-icons c-edit" href="library_return_student_books_page.php?sid=<?php echo $row[0]; ?>" onClick="return checkform1()" title="Return Book">Return Book</a></span>
							</td>
						</tr>
						
						<?php $i++;} ?>
                       
						</tbody>
						
						</table>
                        
                      <script type="text/javascript" language="javascript">
									frm2=document.del;
									function checkform1()
									{
										if(confirm("Are you sure you want to return book"))
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