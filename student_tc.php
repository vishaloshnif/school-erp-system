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
                
<form action="student_tc_show.php" method="post">    
<input type="hidden" name="registration_no" value="<?php echo $_SESSION['registration_no'];?>"  />           
<table width="100%"id="student" cellpadding="0" cellspacing="0">

<tr>
<td width="100" colspan="2"><img src="school_logo/<?php echo $school_detail['school_logo'];?>" width="150" height="60" /></td>
<td width="350" align="left" style="font-size:32px; font-weight:bold" colspan="2"><?php echo ucwords($school_detail['school_name']);?>
</td>


</tr>
</table>

<table width="100%"id="student1"  cellpadding="0" cellspacing="0">
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
<table width="100%" id="student1" cellpadding="0" cellspacing="0">
<tr height="50px;"><td colspan="7" align="center">Record A</td></tr>

<tr>
<td colspan="2">Date Of Admission</td>
<td colspan="2">Date of Removal</td>
<td colspan="3">Case Of Removal</td>
</tr>
<tr>
<td colspan="2"><input type="text" name="other_details[]" ></td>
<td colspan="2"><input type="text" name="other_details[]" ></td>
<td colspan="3" height="50px"><textarea  name="other_details[]" ></textarea></td>
</tr>
</table>

<!----------------------------------------------------------------------->

<table width="100%" id="student1" cellpadding="0" cellspacing="0">
<tr height="50px;"><td colspan="7" align="center">Record B</td></tr>
<tr>
<td >Name Of Scholar</td>
<td >Date of Birth</td>
<td >Age at date of first Admission</td>
<td   style="padding:0 0 0 0; border:0px;" >
<table border="1" width="100%" height="100" >
<tr>
<td  colspan="3" >Name occupation and address</td>
</tr>
<tr>
<td  >Father </td>
<td  >Mother </td>
<td  >Guardian</td>
</tr>

</table>
</td>
<td width="150">The last school.if any which the scholar attend before joining this school</td>
<td width="150" >The highest class form which the scholar was wounded was fit for promotion for leaving this school</td>
<td >The Date of marriage</td>

</tr>
<tr>
<td><?php echo $rows['name'];?></td>
<td><?php echo $rows['dob'];?></td>
<td><input type="text" name="other_details[]" ></td>
<td   style="padding:0 0 0 0; border:0px;" >
<table border="1" width="100%" height="40" >

<tr>
<td  ><?php echo $rows['f_name'];?></td>
<td  ><?php echo $rows['m_name'];?> </td>
<td  ><?php echo $rows['f_name'];?></td>
</tr>

</table>
</td>
<td><input type="text" name="other_details[]" ></td>
<td><input type="text" name="other_details[]" ></td>
<td><input type="text" name="other_details[]" ></td>
</tr>


</table>


<table width="100%" id="student1" cellpadding="0" cellspacing="0">

<tr height="50px;"><td colspan="7" align="center">Record C</td></tr>

<tr>
<td style="padding:0 0 0 0; border:0px;" ><table border="1" width="100%" height="100" >
<tr>
<td  colspan="2" >Addmission Or Promotion
</td>
</tr>
<tr>
<td  >class </td>
<td  >Date</td>

</tr>

</table></td>
<td >Date of passing standard or class from this school</td>

<td   style="padding:0 0 0 0; border:0px;" >
<table border="1" width="100%" height="100" >
<tr>
<td  colspan="2" >Attendance
</td>
</tr>
<tr>
<td  >Number of school meetings </td>
<td  >Number of school meetings in which present </td>

</tr>

</table>
</td>
<td   style="padding:0 0 0 0; border:0px;" >
<table border="1" width="100%" height="100" >
<tr>
<td  colspan="2" >Rank In class
</td>
</tr>
<tr>
<td  >Number of scholars in class  </td>
<td  >Please as shown by final examination in class </td>

</tr>

</table>
</td>
<td width="150">Subject Taken</td>
<td width="150" colspan="2" >Conduct and work during school year </td>

</tr>
<tr>
<td   style="padding:0 0 0 0; border:0px;" >
<table border="1" width="100%" height="40" >

<tr>
<td  ><input type="text" name="other_details[]" > </td>
<td  ><input type="text" name="other_details[]" > </td>

</tr>

</table>
</td>
<td><input type="text" name="other_details[]" ></td>
<td style="padding:0 0 0 0; border:0px;"><table border="1" width="100%" height="40" >

<tr>
<td  ><input type="text" name="other_details[]" ></td>
<td  ><input type="text" name="other_details[]" ></td>

</tr>

</table></td>
<td   style="padding:0 0 0 0; border:0px;" >
<table border="1" width="100%" height="40" >

<tr>
<td  ><input type="text" name="other_details[]" > </td>
<td  ><input type="text" name="other_details[]" > </td>

</tr>

</table>
</td>
<td><input type="text" name="other_details[]" ></td>
<td colspan="2"><input type="text" name="other_details[]" ></td>

</tr>

</table>

<!----------------------------------->


<!----------------------------------->

<!------------------------------------------------------------------>



<table width="100%" id="student1">
<tr >
<td colspan="6"  style="display:block;"><input type="submit" name="submit" value="Submit" align="center" ></td>
</tr>

</table>

</form>

<!------------------------------------------------------------------>






</body>
</html>
