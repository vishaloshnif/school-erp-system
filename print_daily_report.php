<?php include_once("config/config.inc.php");ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daily Report </title>
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
             //if($_POST['registration_no']!="")
//			 {
//				 
//				  $_SESSION['registration_no']=$_POST['registration_no'];
//				  $_SESSION['fees_term']=$_POST['fees_term'];
//				 
//				 }
//				  if($_GET['registration_no']!="")
//			      {
//				 
//				  $_SESSION['registration_no']=$_GET['registration_no'];
//				 
//				 $_SESSION['fees_term']=$_GET['fees_term'];
//				 }
			 
    /*if( $_SESSION['fees_term']!="all")
	{
		
		header('location:fees_reciept_byterm.php?registration_no='.$_SESSION['registration_no']."&&fees_term=".$_SESSION['fees_term']);
		die();
		}*/
 
			  $registration_no=$_SESSION['registration_no'];
			    $names="select * from student_info where registration_no='".$_SESSION['registration_no']."' and session='".$_SESSION['session']."' ";
			 
				// echo $names;
			   $values=mysql_query($names);
			   $rows=mysql_fetch_array($values);
			   
			   
			   $sql="SELECT * FROM school_detail";
					$res=mysql_query($sql);
				
						$school_detail=mysql_fetch_array($res);
						
						//$sql1="SELECT * FROM class where class_id='".$rows['class']."'";
//					$class=mysql_fetch_array(mysql_query($sql1));
//					$sql2="SELECT * FROM stream where stream_id='".$rows['stream']."'";
//					$stream=mysql_fetch_array(mysql_query($sql2));
					$reciept_no='';
					 $select_fees_detail123=mysql_query("select * from student_fees_detail where registration_no='".$rows['registration_no']."' and session='".$_SESSION['session']."' order by student_fees_id	 ASC");
					while($st_result=mysql_fetch_array($select_fees_detail123))
					{
						$reciept_no.=$st_result[0];
						}		
				
			    ?>
<table width="100%"id="student">

<tr>
<td width="200"><img src="school_logo/<?php echo $school_detail['school_logo'];?>" width="150" height="60" /></td>
<td width="680" align="center" style="font-size:32px; font-weight:bold"><?php echo ucwords($school_detail['school_name']);?>
<p style="font-size:16px"><?php echo ucwords($school_detail['school_address']);?></p>
</td>
<td colspan="2">Serial No. &nbsp;&nbsp;&nbsp; <?php echo $reciept_no;?> </td>


</tr>

</table>


<!----------------------------------------------------------------------->
<table width="100%"  id="student1">
<tr>
<th>S.N.</th>
<th>Deposit Date</th>
<th>S.R.No</th>
<th>Student Name</th>
<th>Class</th>
<th>Amount</th>

</tr>
<?php 
 						$i=1;
						
					$sql="select  si.name AS name,cl.class_name AS class_name,si.registration_no AS registration_no,sfd.fees_amount AS  fees_amount,sfd.deposit_date AS deposit_date FROM student_fees_detail sfd left join student_info si on si.registration_no=sfd.registration_no LEFT JOIN class cl ON cl.class_id=si.class 
					 where sfd.session='".$_SESSION['session']."' ";
					if($_POST['date_from'] !=null){
						$newFromDate = date("Y-m-d", strtotime($_POST['date_from']));
						$sql.=" and DATE(sfd.deposit_date) >='".$newFromDate."' ";
					}
					if($_POST['date_to'] !=null){
						$newToDate = date("Y-m-d", strtotime($_POST['date_to']));
						$sql.=" and DATE(sfd.deposit_date) <='".$newToDate."'";
					}
					$sql.=" group by sfd.student_fees_id ";
					$res=mysql_query($sql);
				$total_collected_fees=0;
							while($rows=mysql_fetch_array($res))
							{
								
								?>
<tr>

<td><?php echo $i;?></td>
<td><?php echo  date('d-M-Y',strtotime($rows['deposit_date']));?></td>
<td><?php echo $rows['registration_no'];?></td>
<td><?php echo ucwords($rows['name']);?></td>
<td><?php echo $rows['class_name']; ?></td>
<td><?php echo $rows['fees_amount'];?></td>
</tr>
<?php $i++; if($rows['fees_amount']!=null){
	$total_collected_fees=$total_collected_fees+$rows['fees_amount'];}} ?>
</table>

<!----------------------------------->
<table width="100%" id="student2">
<tr>
<td align="right"> Income &nbsp;&nbsp;&nbsp;Total Amount&nbsp;::&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $total_collected_fees;?></td>

</tr>
</table>

<!----------------------------------->
<table width="100%" id="student1">
<tr>


<?php 
                         $registration_no=$rows['registration_no'];
	
$select_fees_detail=mysql_query("select * from student_fees_detail where registration_no='".$rows['registration_no']."' and session='".$_SESSION['session']."' order by fees_term ASC");
//							while($row=mysql_fetch_array($select_fees_detail))
//							{
//								
//								/*$sql1="SELECT * FROM class where class_id='".$row['class_id']."'";
//					            $class=mysql_fetch_array(mysql_query($sql1));
//						        $sql2="SELECT * FROM stream where stream_id='".$row['stream_id']."'";
//					            $stream=mysql_fetch_array(mysql_query($sql2));
//								$sql3="SELECT * FROM subject where subject_id='".$row['subject_id']."'";
//								$subject=mysql_fetch_array(mysql_query($sql3));
//					
//					          $sql12="SELECT * FROM exam_nuber_of_term ";
//	                           $res12=mysql_query($sql12);*/
//							   
//							    $sql="SELECT * FROM fees_term where fees_term_id='".$row['fees_term']."' ";			
// 	                            $res=mysql_query($sql);
//								$month=mysql_fetch_array($res);						  
				?>		
<?php /*?><td><strong><?php echo $month['term_name'];?></strong></td><td><?php echo $row['fees_amount'];?></td><td><?php echo date('d-m-Y',strtotime($row['deposit_date'])); ?></td><td><?php echo $row['session'];?></td><td><?php echo $row['session'];?></td><td><?php echo $row['session'];?></td><td><?php echo $row['session'];?></td>
</tr>
<?php } ?><?php */?>
<!--<tr>
<th>Hindi</th><td>20</td><td>20</td><td>80</td><td>20</td><td>90</td>


</tr>
<tr>
<th>Hindi</th><td>20</td><td>20</td><td>80</td><td>20</td><td>90</td>


</tr>-->
</table>

 <?php /*?><?php 
 
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
<?php */?>
<!------------------------------------------------------------------>
<!--<table width="100%" id="student1">


<tr>
<th>S.No.</th>
<th>Deposit Date</th>
<th>Title</th>
<th>Description</th>
<th>&nbsp;</th>
<th>Amount</th>
</tr>
</table>-->
<!------------------------------------------------------------------>

<table width="100%" id="student1">


<tr>
<?php                $total_expence=0;
					$sql1="select date_of_txn,title,description,amount FROM account_exp_income_detail WHERE category_type='Expense' AND  
					session='".$_SESSION['session']."' ";
					if($_POST['date_from'] !=null){
						$sql1.=" and date_of_txn >='".$_POST['date_from']."'";
					}
					if($_POST['date_to'] !=null){
						$sql1.=" and date_of_txn <='".$_POST['date_to']."'";
					}
					$res1=mysql_query($sql1);
				
							while($rows1=mysql_fetch_array($res1))
							{
								
								?>
                                </tr>
<tr>

<td><?php echo $i;?></td>
<td><?php echo  date('d-M-Y',strtotime($rows1['date_of_txn']));?></td>
<td><?php echo $rows1['title'];?></td>

<td><?php echo ucwords($rows1['description']);?></td>
<td>-<?php echo $rows1['amount'];?></td>
</tr>
<?php $i++; if($rows1['amount']!=null){
	$total_collected_fees=$total_collected_fees-$rows1['amount'];
	$total_expence=$total_expence+$rows1['amount'];}} ?>

</table>
<table width="100%" id="student2">
<tr>
<td align="right">Expence &nbsp;&nbsp;&nbsp;Total Amount&nbsp;::&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -<?php echo $total_expence;?></td>

</tr>
</table>
<table width="100%" id="student2">
<tr>
<td align="right">Total Amount : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $total_collected_fees;?></td>

</tr>
</table>
<table width="100%" id="student1">
<tr >
<td colspan="6" id="hidebutton" style="display:block;"> <a href="daily_report.php"  style="text-decoration:none;"><input type="button" name="search" value="Back" class="btn_small btn_orange"></a>  <a href="#" onclick="return printdata()"  style="text-decoration:none; margin-left:50px;"><input type="button" name="search" value="Print" class="btn_small btn_orange"></a></td>
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
