<?php session_start();
 include_once('config/config.inc.php');
$staff=$_GET['staff_id'];
$sql="delete  from staff_employee where staff_id='".$staff."'";
$res=mysql_query($sql);
header('location:view_staff.php');
die();



?>