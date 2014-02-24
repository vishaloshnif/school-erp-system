<?php session_start();
 include_once('config/config.inc.php');
$staff=$_GET['staff_position_id'];
$sql="delete  from  staff_position where staff_pos_id='".$staff."'";
$res=mysql_query($sql);
header('location:view_staff_position.php');
die();



?>