<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
	$delete_detail="delete from allocate_class_section where allocate_id='".$_GET['sid']."'";
	mysql_query($delete_detail);
	header("Location:allocate_section.php?msg=2");
	
	}
?>
