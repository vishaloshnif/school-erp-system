<?php include_once("config/config.inc.php");ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fees Reciept</title>
</head>

<body>
<style type="text/css">
#student
{
	background:#0052a6;
	border:1px solid #003c7a;
	text-align:center;
	color:#FFF;
	}
	#student2
{
	background:#ededed;
	border:1px solid #333;
	
	}
	#student1
{
	background:#ededed;
	border:1px solid #003c7a;
	text-align:center;
	
	}
	#student1 td,#student1 th
	{
		border:1px solid #003c7a;
		padding:3px 7px 2px 7px;
		text-align:center;
		}
		#student1 th
		{
			font-size:1.1em;

padding-top:5px;
padding-bottom:4px;
text-align: center;
background-color:#0052a6;
color:#ffffff;

			}

</style>

 <?php
             if($_POST['registration_no']!="")
			 {
				 
				  $_SESSION['registration_no']=$_POST['registration_no'];
				  $_SESSION['fees_term']=$_POST['fees_term'];
				 
				 }
				  if($_GET['registration_no']!="")
			      {
				 
				  $_SESSION['registration_no']=$_GET['registration_no'];
				 
				 $_SESSION['fees_term']=$_GET['fees_term'];
				 }
   
    if( $_SESSION['fees_term']=="all")
	{
		
		header('location:fees_reciept.php?registration_no='.$_SESSION['registration_no']);
		die();
		}
 
			  $registration_no=$_SESSION['registration_no'];
			    $names="select * from student_info where registration_no='".$_SESSION['registration_no']."' and session='".$_SESSION['session']."' ";
			 
				// echo $names;
			   $values=mysql_query($names);
			   $rows=mysql_fetch_array($values);
			   
			   
			   $sql="SELECT * FROM school_detail";
					$res=mysql_query($sql);
				
						$school_detail=mysql_fetch_array($res);
						
						$sql1="SELECT * FROM class where class_id='".$rows['class']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
					$sql2="SELECT * FROM stream where stream_id='".$rows['stream']."'";
					$stream=mysql_fetch_array(mysql_query($sql2));
					$reciept_no='';
					 $select_fees_detail123=mysql_query("select * from student_fees_detail where registration_no='".$rows['registration_no']."' and session='".$_SESSION['session']."' and fees_term='".$_SESSION['fees_term']."'   order by student_fees_id	 ASC");
					while($st_result=mysql_fetch_array($select_fees_detail123))
					{
						$reciept_no.=$st_result[0];
						}		
					
			    ?>
<table width="100%"id="student">

<tr>
<td width="200"><img src="school_logo/<?php echo $school_detail['school_logo'];?>" width="150" height="60" /></td>
<td width="700" align="center" style="font-size:32px; font-weight:bold"><?php echo ucwords($school_detail['school_name']);?>
<p style="font-size:14px"><?php echo ucwords($school_detail['school_address']);?></p>
</td>
<td colspan="2">Serial No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $reciept_no;?></td>


</tr>

</table>


<!----------------------------------------------------------------------->
<table width="100%"  id="student1">
<tr>
<th>Roll Number</th>
<th>Distic</th>
<th>Date Of Birth</th>
<th>REGULAR</th>
<th>Class</th>

</tr>
<tr>
<td><?php echo $rows['registration_no'];?></td>
<td><?php echo $rows['city'];?></td>
<td><?php echo  date('d-M-Y',strtotime($rows['dob']));?></td>
<td>Regular</td>
<td><?php echo $class['class_name']; if($rows['stream']!=0){echo "-".$stream['stream_name'];}?></td>

</tr>

</table>

<!----------------------------------->
<table width="100%" id="student2">
<tr>
<td>Student Name</td>
<td><?php echo ucwords($rows['name']);?></td>

</tr>
<tr>
<td>Father Name</td>
<td><?php echo ucwords($rows['f_name']);?></td>

</tr>
<tr>
<td>Mother Name</td>
<td><?php echo ucwords($rows['m_name']);?></td>

</tr>
</table>

<!----------------------------------->
<table width="100%" id="student1">
<tr>
<th>Fees term</th><th>Fees Amount</th><th>Deposite Date</th><th>Session</th>

</tr>
<?php 
                            $registration_no=$rows['registration_no'];
				            $select_fees_detail=mysql_query("select * from student_fees_detail where registration_no='".$rows['registration_no']."' and session='".$_SESSION['session']."' and fees_term='".$_SESSION['fees_term']."'  order by fees_term ASC");
							while($row=mysql_fetch_array($select_fees_detail))
							{
								
								/*$sql1="SELECT * FROM class where class_id='".$row['class_id']."'";
					            $class=mysql_fetch_array(mysql_query($sql1));
						        $sql2="SELECT * FROM stream where stream_id='".$row['stream_id']."'";
					            $stream=mysql_fetch_array(mysql_query($sql2));
								$sql3="SELECT * FROM subject where subject_id='".$row['subject_id']."'";
								$subject=mysql_fetch_array(mysql_query($sql3));
					
					          $sql12="SELECT * FROM exam_nuber_of_term ";
	                           $res12=mysql_query($sql12);*/
							   
							    $sql="SELECT * FROM fees_term where fees_term_id='".$_SESSION['fees_term']."' ";			
 	                            $res=mysql_query($sql);
								$month=mysql_fetch_array($res);
							  
					?>		
<tr>
<td><strong><?php echo $month['term_name'];?></strong></td><td><?php echo $row['fees_amount'];?></td><td><?php echo date('d-m-Y',strtotime($row['deposit_date'])); ?></td><td><?php echo $row['session'];?></td>
</tr>
<?php } ?>
<!--<tr>
<th>Hindi</th><td>20</td><td>20</td><td>80</td><td>20</td><td>90</td>


</tr>
<tr>
<th>Hindi</th><td>20</td><td>20</td><td>80</td><td>20</td><td>90</td>


</tr>-->
</table>
 <?php 
 
//$registration_no=$_GET['registration_no'];
//$fees_term=$_GET['fees_term'];
			 $studentinfo="select * from student_info where registration_no='".$registration_no."' and session='".$_SESSION['session']."'";
			 $row=mysql_fetch_array(mysql_query($studentinfo));


	        


//$student_fees_detail="select ";
   $sql_pending="select sum(fees_amount) from student_fees_detail where registration_no='".$registration_no."'  and session='".$_SESSION['session']."'";
	$deposit_amount=mysql_fetch_array(mysql_query($sql_pending));
	
	 $sql="SELECT * FROM fees_package where package_id='".$row['admission_fee']."' ";
	                           $res=mysql_query($sql);
								$row3=mysql_fetch_array($res);
								?>

<!------------------------------------------------------------------>
<!--<table width="100%" id="student1">
<tr>
<td><strong>Total fees</strong></td>
<td><strong>Total Deposit Fees</strong></td>
<td colspan="2"><strong>Total Pending Fees</strong></td>

</tr>
<tr>
<td><?php echo $row3['package_fees'];?></td>
<td><?php echo $deposit_amount[0];?></td>
<td><?php echo $pending_amount=$row3['package_fees']-$deposit_amount[0];?></td>

</tr>
</table>-->
<!------------------------------------------------------------------>


<table width="100%" id="student1">
<tr >
<td colspan="6" id="hidebutton" style="display:block;"> <a href="fees_manager.php"  style="text-decoration:none;"><input type="button" name="search" value="Back" class="btn_small btn_orange"></a>  <a href="#" onclick="return printdata()"  style="text-decoration:none; margin-left:50px;"><input type="button" name="search" value="Print" class="btn_small btn_orange"></a></td>
</tr>

</table>

<script language="javascript">
function printdata()
{
	document.getElementById('hidebutton').style.display='none';
	javascript:window.print();
	
	return true;
	}

</script>






</body>
</html>
