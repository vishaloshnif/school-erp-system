<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
		$delete_detail="delete from student_fine_detail where student_fine_id ='".$_GET['sid']."'";
		mysql_query($delete_detail);
		header("Location:student_fine_detail1.php?msg=2");
	
}
?>
