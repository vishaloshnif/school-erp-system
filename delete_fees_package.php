<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
	$delete_detail="delete from fees_package where package_id='".$_GET['sid']."'";
	mysql_query($delete_detail);
	header("Location:fees_package.php?msg=2");
	
	}
?>
