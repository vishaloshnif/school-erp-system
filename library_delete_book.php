<?php 
include_once("config/config.inc.php");
ob_start();
$sid=$_GET['sid'];
if(isset($_GET['sid']))
{
	$delete_detail="delete from book_manager where book_id='".$_GET['sid']."'";
	mysql_query($delete_detail);
	header("Location:library_book_manager.php?msg=2");
	
	}
?>
