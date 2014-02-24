<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
	$delete_detail="delete from account_category where account_category_id='".$_GET['sid']."'";
	mysql_query($delete_detail);
	header("Location:account_category_manager.php?msg=2");
	
	}
?>
