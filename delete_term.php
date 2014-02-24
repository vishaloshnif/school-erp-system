<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
	$delete_detail="delete from fees_term where fees_term_id='".$_GET['sid']."'";
	mysql_query($delete_detail);
	header("Location:term_manager.php?msg=2");
	
	}
?>
