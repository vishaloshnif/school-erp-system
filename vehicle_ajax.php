<?php include_once("config/config.inc.php");?>
<?php $route_id=$_GET['route_id'];
											 $sql="select * from transport_add_vechile where find_in_set('".$route_id."',route_id)";
											$ro=mysql_query($sql);?>
                              <div class="form_grid_12">
									<label class="field_title">Select Vehicle</label>
									<div class="form_input">
										<select name="vechile_id" style=" width:300px; height:30px;"  class="chzn-select" tabindex="20">
											<option value="">--select vehicle--</option>
											<?php 
											while($row=mysql_fetch_array($ro)){
												
												
												
												if($_GET['vechile_id']==$row[0])
								          {
									$vechile_id_sel='selected="selected"';
									}else
									{
										  $vechile_id_sel="";
										}
											
											?>
                                            											<option <?php echo $vechile_id_sel;?> value="<?php echo $row[0];?>"><?php echo $row['vechile_number'];?></option><?php }?>
										</select>
									</div>
								</div>
					