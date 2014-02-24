<?php session_start();
 include_once('config/config.inc.php');
$staff=$_GET['staff_qualification_id'];
$sql="delete  from  staff_qualification where staff_qualification_id='".$staff."'";
$res=mysql_query($sql);
header('location:view_staff_qualification.php');
die();



?>