<?php include_once("includes/header.php");?>
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

<?php include_once("includes/sidebar.php");?>

<?php 

if(isset($_POST['submit']))
{ 
	
	$update="update admin set username='".$_POST['username']."' ,password='".$_POST['password']."' where id='".$_SESSION['user_id']."' ";
	mysql_query($update);
	$msg = "<span style='color:#009900;'><h4>  Admin Detail UpdatedSuccessfully </h4></span>";
	
} 

    
	
	
	$sql10="SELECT * FROM admin where  id='".$_SESSION['user_id']."' ";
	$registration_no_res=mysql_fetch_array(mysql_query($sql10));

?>
<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				
					<h3 style="padding-left:20px; color:#1c75bc; border-bottom:1px solid #e2e2e2;">Change Admin detail</h3>
                    
                    
                  <?php if($msg!=""){echo $msg; } ?>
               	<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
                                    

              <ul>
               
               
               
               
           
    <h5 style="padding-left:20px; color: #666;">   Fields marked with<span style="color:#F00"> *</span> must be filled.</h5><br>
           
               
               
								
                                
                                
                                
<!--------------------------------------------------------------->
<li style=" border-bottom:1px solid #f2420a;"><h4 style=" color:#f2420a; ">Edit Login Details</h4>     </li>                           
                                
                               <li>
								<div class="form_grid_12 multiline">
									<label class="field_title">Username* </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="username" type="text" value="<?php echo $registration_no_res['username'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> password* </label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="password" type="text" value="<?php echo $registration_no_res['password'];?>"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>
								</li>
                                
                                
                                
                                <li>
								<div class="form_grid_12">
									<div class="form_input">
										
										<button type="submit"  name="submit" class="btn_small btn_blue"><span>Save</span></button>
										
										
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