<?php include_once("config/config.inc.php");ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student TC</title>
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
            	 if($_GET['registration_no']!="")
				{
					$_SESSION['registration_no']=$_GET['registration_no'];
				}
				
				
				if($_POST['registration_no']!="")
				{
					$_SESSION['registration_no']=$_POST['registration_no'];
				}
//$registration_no=$_SESSION['registration_no'];
			  $id=$_SESSION['registration_no'];
			    $names="select * from student_info where registration_no='".$_SESSION['registration_no']."' and session='".$_SESSION['session']."' ";
			  if($_SESSION['stream_id']!="")
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
</td>
<td>Serial No.</td>
<td><?php echo $rows['student_id'];?></td>

</tr>
</table>

<table width="100%"id="student1" >
<tr>
<td  align="center" colspan="4" style="font-size:22px;"> Student T.C.</td>

</tr>

<tr>
<td>Scholar Register No.</td>
<td width="300" align="left"><?php echo $rows['registration_no'];?>
</td>
<td >Admission Register No.</td>
<td width="300"><?php echo $rows['student_id'];?></td>

</tr>

</table>
<table width="100%" id="student1">
<tr>
<td>Date Of Admission</td>
<td>Date of Removal</td>
<td colspan="2">Case Of Removal</td>
</tr>
<tr>
<td></td>
<td></td>
<td colspan="2" height="50px">aadasdas</td>
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

<!------------------------------------------------------------------>
<table width="100%" id="student1">
<tr>
<td>Total No.</td>
<td>Total Obtained</td>
<td>Percantage</td>
<td>Result</td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td>

</td>
</tr>
</table>
<table width="100%" id="student1">
<tr >
<td colspan="6" id="hidebutton" style="display:block;"> <a href="entry_student_tc.php"  style="text-decoration:none;"><input type="button" name="search" value="Back" class="btn_small btn_orange"></a>  <a href="#" onclick="return printdata()"  style="text-decoration:none; margin-left:50px;"><input type="button" name="search" value="Print" class="btn_small btn_orange"></a></td>
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


<!------------------------------------------------------------------>






</body>
</html>
