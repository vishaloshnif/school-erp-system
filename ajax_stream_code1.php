<?php include_once("config/config.inc.php");ob_start();

$class_id=$_GET['class_id'];
$sql2="SELECT * FROM class where class_id='".$class_id."' and stream_status='1'";
					$class=mysql_fetch_array(mysql_query($sql2));
if($class['class_name']!="")
{
?>


<div class="form_grid_12">
									<label class="field_title">Stream</label>
									<div class="form_input">
										<select name="stream" class="chzn-select" tabindex="13">
										<option value="">---select stream---</option>
                                        	 <?php 
						$i=1;
					$sql="SELECT * FROM allocate_class_stream where class_id='".$class_id."' ";
					$res=mysql_query($sql);
				
							while($row=mysql_fetch_array($res))
							{
								
								
						$sql2="SELECT * FROM stream where stream_id='".$row['stream_id']."'";
					$stream=mysql_fetch_array(mysql_query($sql2));
					?>			<option value="<?php echo $row['stream_id']; ?>"><?php echo $stream['stream_name']; ?></option>
									<?php
								}
							?>
										</select>
                                        <span class=" label_intro">Stream name</span>
									</div>
								</div>
                                <?php } ?>