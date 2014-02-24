<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
	$delete_detail="delete from library_fine_manager where fine_id='".$_GET['sid']."'";
	mysql_query($delete_detail);
	header("Location:library_fine_manager.php?msg=2");
	
	}
?>
