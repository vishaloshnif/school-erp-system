<?php include_once("config/config.inc.php");ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
             if(isset($_POST['entry_submit']))
			 {
				 
				  $_SESSION['registration_no']=$_POST['registration_no'];
				  $_SESSION['class_id']=$_POST['class_id'];
				  $_SESSION['stream_id']=$_POST['stream'];
				  $_SESSION['term_id']=$_POST['term_id'];
			
				 
				 }
				  $studentinfo="select * from student_info where registration_no='". $_SESSION['registration_no']."' and session='".$_SESSION['session']."'";
$row_value=mysql_fetch_array(mysql_query($studentinfo));
$_SESSION['class_id']=$row_value['class'];
$_SESSION['stream_id']=$row_value['stream'];
				 
   if($_SESSION['term_id']!='all')
   {
	   
	   header('location:marksheet.php');
	   
	   
	   }
 
			  $id=$_SESSION['registration_no'];
			    $names="select * from student_info where registration_no='".$_SESSION['registration_no']."' and session='".$_SESSION['session']."' and class='".$_SESSION['class_id']."'";
			  if($_SESSION['stream_id']!=0)
			  {
				  $names.="and stream='".$_SESSION['stream_id']."'";
				  }
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
			    ?>
<table width="100%"id="student">

<tr>
<td width="200"><img src="school_logo/<?php echo $school_detail['school_logo'];?>" width="150" height="60" /></td>
<td width="700" align="center" style="font-size:32px; font-weight:bold"><?php echo ucwords($school_detail['school_name']);?>
<p style="font-size:16px;"><?php echo ucwords($school_detail['school_address']);?></p>
</td>
<td>Serial No.</td>
<td>1234567</td>

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
<td colspan="6"><strong>Student Name</strong>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($rows['name']);?></td>


</tr>
<tr>
<td colspan="6"><strong>Father Name</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($rows['f_name']);?></td>

</tr>
<tr>
<td colspan="6"><strong>Mother Name</strong>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($rows['m_name']);?></td>

</tr>
</table>

<!----------------------------------->
<table width="100%" id="student1">
<tr>
<th>Subject</th>
<?php
	   $total_maximum_marks=0;
	      $total_obt_marks=0;
	   $percent=0;
	   

                               $sql12="SELECT * FROM exam_nuber_of_term ";
	                           $res12=mysql_query($sql12);
							   while($exam_terms=mysql_fetch_array($res12)){?><th ><?php echo $exam_terms['term_name'];?></th><?php }?>

</tr>
<?php 
$sql="SELECT * FROM allocate_class_subject where class_id='".$rows['class']."' ";
				
				if($rows['stream']!="")
								{
									$sql.="and stream_id='".$rows['stream']."'";
									
									}
					$res=mysql_query($sql);
				
							while($row=mysql_fetch_array($res))
							{
								
								$sql1="SELECT * FROM class where class_id='".$row['class_id']."'";
					$class=mysql_fetch_array(mysql_query($sql1));
						$sql2="SELECT * FROM stream where stream_id='".$row['stream_id']."'";
					$stream=mysql_fetch_array(mysql_query($sql2));
					$sql3="SELECT * FROM subject where subject_id='".$row['subject_id']."'";
					$subject=mysql_fetch_array(mysql_query($sql3));
					
					          $sql12="SELECT * FROM exam_nuber_of_term ";
	                           $res12=mysql_query($sql12);
							   
							 		
							  
					?>		
<tr>
<td><strong><?php echo $subject['subject_name'];?></strong></td><?php  while($exam_terms=mysql_fetch_array($res12))
							   {
								      $exam_add_maximum_marks_q="select * from exam_add_maximum_marks where  class_id='".$rows['class']."'  and subject_id='".$row['subject_id']."' and term_id='".$exam_terms['term_id']."'  and session='".$_SESSION['session']."'";
								
								if($rows['stream']!="")
								{
									$exam_add_maximum_marks_q.="and stream_id='".$rows['stream']."'";
									
									}
					              $exam_add_maximum_marks_res=mysql_query($exam_add_maximum_marks_q);	
								  while( $row_exam_add_maximum_marks=mysql_fetch_array($exam_add_maximum_marks_res))
								  {
									  $total_maximum_marks+=$row_exam_add_maximum_marks['max_marks'];
									  
									  
									  }			
							   
							       $select_marks_sql="select * from exam_subject_marks where registration_no='".$id."' and class_id='".$rows['class']."' and stream_id='".$rows['stream']."' and subject_id='".$row['subject_id']."' and term_id='".$exam_terms['term_id']."' and session='".$_SESSION['session']."'";
					               $res_subject=mysql_query($select_marks_sql);
								  $st_marks=mysql_fetch_array($res_subject);   ?><td><?php  $total_obt_marks+=$st_marks['marks']; echo $st_marks['marks'];?></td>
								  
								  <?php } ?>


</tr>
<?php } ?>
<!--<tr>
<th>Hindi</th><td>20</td><td>20</td><td>80</td><td>20</td><td>90</td>


</tr>
<tr>
<th>Hindi</th><td>20</td><td>20</td><td>80</td><td>20</td><td>90</td>


</tr>-->
</table>
<!------------------------------------------------------------------>
<table width="100%" id="student1">
<tr>
<td>Total No.</td>
<td>Total Obtained</td>
<td>Percantage</td>
<td>Result</td>
</tr>
<tr>
<td><?php echo  $total_maximum_marks;?></td>
<td><?php echo  $total_obt_marks;?></td>
<td><?php  $percentage=($total_obt_marks/$total_maximum_marks)*100; echo $percentage=round($percentage,2);?></td>
<td>
<?php if($percentage>=60){
	$result="I Division";
	
	}
	
	if($percentage>=45&&$percentage<60){
	$result="II Division";
	
	}
	if($percentage>=36&&$percentage<45){
	$result="III Division";
	
	}
	if($percentage<36){
	$result="Fail";
	
	}
	
	echo $result;
	?>

</td>
</tr>
</table>
<!------------------------------------------------------------------>

<table width="100%" id="student1">
<tr >
<td colspan="6" id="hidebutton" style="display:block;"> <a href="entry_exam_marksheet.php"  style="text-decoration:none;"><input type="button" name="search" value="Back" class="btn_small btn_orange"></a>  <a href="#" onclick="return printdata()"  style="text-decoration:none; margin-left:50px;"><input type="button" name="search" value="Print" class="btn_small btn_orange"></a></td>
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
