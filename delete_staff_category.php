<?php session_start();
 include_once('config/config.inc.php');
$staff=$_GET['staff_category_id'];
$sql="delete  from  staff_category where staff_cat_id='".$staff."'";
$res=mysql_query($sql);
header('location:view_staff_category.php');
die();



?>