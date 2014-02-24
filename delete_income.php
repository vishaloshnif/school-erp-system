<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
	$delete_detail="delete from account_exp_income_detail where txn_id='".$_GET['sid']."'";
	mysql_query($delete_detail);
	header("Location:income_manager.php?msg=2");
	
	}
?>
