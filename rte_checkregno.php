<?php 
include_once("config/config.inc.php");
$registration_no=$_GET['registration_no'];
 $sql1="SELECT * FROM rte_student_info where registration_no='".$registration_no."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num>0)
	{	?>
	<input name="registration_no"    type="text" style=" margin-left:-192px;"  required onBlur="getCheckreg('rte_checkregno.php?registration_no='+this.value)"/><span style="color:#F00; font-size:14px;">S R Number Already Exists</span>	
	
	<?php	
	}else
	{
?><input name="registration_no"   onBlur="getCheckreg('rte_checkregno.php?registration_no='+this.value)" type="text" style=" margin-left:-192px;"  required  value="<?php echo $registration_no;?>"/>
<?php } ?>