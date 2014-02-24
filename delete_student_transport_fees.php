<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
	$delete_detail="delete from student_transport_fees_detail where student_fees_id='".$_GET['sid']."'";
	mysql_query($delete_detail);
	header("Location:student_transport_fees.php?msg=2");
	
	}
?>
