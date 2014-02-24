<?php 
include_once("config/config.inc.php");
$book_number=$_GET['book_number'];
 $sql1="SELECT * FROM book_manager where book_number='".$book_number."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{	?>
    
	<input name="book_number"    type="text"  required onBlur="getCheckbook('checkbookno.php?book_number='+this.value)"/><br />
<span style="color:#F00; font-size:14px;">Book number does not  exists</span>	
	
	<?php	
	}else
	{
?>

<input name="book_number"    type="text"  required onBlur="getCheckbook('checkbookno.php?book_number='+this.value)"value="<?php echo $book_number;?>"/>

<?php } ?>