<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	$title=$_POST['title'];
	$description=$_POST['description'];
	$amount=$_POST['amount'];
	$date_of_txn=$_POST['date_of_txn'];
	$account_category_id=$_POST['account_category_id'];
	$category_type="Income";
	
		
		$sql1="SELECT * FROM account_exp_income_detail where title='".$title."' and txn_id!='".$_GET['sid']."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
	$sql3="UPDATE account_exp_income_detail SET `title` = '".$title."',description='".$description."', `amount` = '".$amount."',date_of_txn='".$date_of_txn."', `account_category_id` = '".$account_category_id."'  where txn_id='".$_GET['sid']."'";
	$res3=mysql_query($sql3) or die("Error : " . mysql_error());
	header("Location:expense_manager.php?msg=3");
	}else
	{
		header("Location:edit_expense.php?error=2&&sid=".$_GET['sid']);
	}
}

	if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4>Account  Detail Already Exists  </h4></span>";
	}
		
	$sql2="SELECT * FROM account_exp_income_detail WHERE `txn_id` = '" . $_GET['sid'] . "';";
	$res2=mysql_query($sql2);	
	$row2=mysql_fetch_array($res2);
		
  ?>
    <div class="page_title">
	<!--	<span class="title_icon"><span class="computer_imac"></span></span>
		<h3>Dashboard</h3>-->
		<div class="top_search">
			<form action="#" method="post">
				<ul id="search_box">
					<li>
					<input name="" type="text" class="search_input" id="suggest1" placeholder="Search...">
					</li>
					<li>
					<input name="" type="submit" value="" class="search_btn">
					</li>
				</ul>
			</form>
		</div>
	</div>

<?php include_once("includes/account_setting_sidebar.php");?>


<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">Income detail</h3>
                    
                    
                  <?php if($msg!=""){echo $msg; } ?>
               	<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
                                    

              <ul>
               
               
               
               
           
    <h5 style="padding-left:20px; color: #666;">   Fields marked with<span style="color:#F00"> *</span> must be filled.</h5><br>
           
               
               
								
                                
                                
                                
<!--------------------------------------------------------------->
<li style=" border-bottom:1px solid #f2420a;">Income  Details     </li>                           
                                
                               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Title*</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="title" type="text" value="<?php echo $row2['title'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Description*</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<textarea name="description" rows="5" cols="20" ><?php echo 	$row2['description'];?></textarea>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Amount *</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="amount" type="text" value="<?php echo 	$row2['amount'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                
                                
                                
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">  Date </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="date_of_txn" type="text" class="datepicker" value="<?php echo 	$row2['date_of_txn'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<label class="field_title"> Category  </label>
									<div class="form_input">
										<select style=" width:300px" name="account_category_id" class="chzn-select" tabindex="13">
											<option value="" selected="selected"> - Select Category - </option>
							<?php
							 $sql="SELECT * FROM account_category where category_type='Expense' ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
									if($row2['account_category_id']==$row[0])
									{$sel='selected="selected"';}else{
										$sel='';
										}
									?>
									<option <?php echo $sel;?> value="<?php echo $row['account_category_id']; ?>"><?php echo $row['category_name']; ?></option>
								
                                	<?php
								}
							?>
										</select>
									</div>
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12">
									<div class="form_input">
										
										<button type="submit"  name="submit" class="btn_small btn_blue"><span>Save</span></button><a href="expense_manager.php"><button type="button"  name="submit" class="btn_small btn_blue"><span>Back </span></button></a>
										
										
										
									</div>
								</div>
								</li>
                                </ul>
                
                
                </form>  
                 
                 
                 
                 
                 
                 
					
			
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
<?php include_once("includes/footer.php");?>