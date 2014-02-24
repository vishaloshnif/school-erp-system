<?php session_start();
 include_once('config/config.inc.php');
$staff=$_GET['staff_department_id'];
$sql="delete  from  staff_department where staff_department_id='".$staff."'";
$res=mysql_query($sql);
header('location:view_staff_department.php');
die();



?>