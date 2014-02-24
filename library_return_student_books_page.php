<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
		//$issue_date=$_POST['issue_date'];
		
		  $sql3="UPDATE student_books_detail set booking_status='0'   where issue_id='".$_GET['sid']."'";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		header("Location:library_student_return_books.php");
		
		
		
		$select_fine_days="select * from library_fine_manager where session='".$_SESSION['session']."'";
$res_select=mysql_query($select_fine_days);
$row_fine=mysql_fetch_array($res_select);

$row_fine_days=$row_fine['no_of_days']-1;
$row_fine_rate=$row_fine['fine_rate'];


	 $sql="SELECT * FROM student_books_detail where issue_id='".$_GET['sid']."'";
					$res=mysql_query($sql);
					  
							
				$row=mysql_fetch_array($res);
				
				
				 $return_date=date('Y-m-d',strtotime($row['issue_date']."+".$row_fine_days."days"));

$now = time(); // or your date as well
     $your_date = strtotime($return_date);
     $datediff = $now - $your_date;
     $number_of_days=floor($datediff/(60*60*24));
	 
				
				if($number_of_days>0)
				{
					$total_fine=$number_of_days*$row_fine_rate;
					
					
					$insert_fine_detail_q="insert into student_fine_detail(registration_no,book_number,no_of_days,fine_amount,session)values('".$row['registration_no']."','".$row['book_number']."','".$number_of_days."','".$total_fine."','".$_SESSION['session']."')";
					mysql_query($insert_fine_detail_q);
					}
							
	 
	 
	 
		
	}
	?>