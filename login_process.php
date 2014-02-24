<?php 
ob_start();
session_start();
include_once("config/config.inc.php");

if(isset($_POST['login']))
{ 
   
	$username=$_POST['username'];
	$password=$_POST['password'];
	  $query="SELECT * FROM admin WHERE username='".$username."'";
	 
	 $result=mysql_query($query);
	 $row=mysql_fetch_array($result);
	 $num=mysql_num_rows($result);
	 if($num>0)
	 {
	 if($row['username']==$username)
	 {
	    if($row['password']==$password) 
		{
			// $_SESSION['hotel_id']=1;
			//$_SESSION['session']='2013-2014';
			$_SESSION['user_id']=$row['id'];
		    $_SESSION['username']=$row['username'];
			 header('location:session.php');	
	    }
		 else
	    {
	         header('location:index.php?errormsg=1');
			 	 
	    }	 
	   	 
	 }
	 else
	 {
	   $errormsg="Username or Password incorrect";	 
	     header('location:index.php?errormsg=1');
	 }
	
	}
	else
	{
		 header('location:index.php?errormsg=2');
		}
}


?>