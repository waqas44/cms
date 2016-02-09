<?php 
include "connect.php";


 $user_email = trim($_POST['user_email_lg']);
  $user_pass = trim($_POST['user_pass_lg']);
  
   if (isset($user_email) &&  ($user_email != "")
	    &&    isset($user_pass) &&  ($user_pass != "")){


 
 $user_login = "SELECT * FROM user WHERE email_id='$user_email'";
	 $user_qry = mysqli_query($connect, $user_login);
	 
	  $return_if =  mysqli_fetch_array($user_qry);
	  
	  if (($return_if['email_id'] == $user_email) &&  ($return_if['password'] == $user_pass)){
		 
		 
		 echo "You are loged in suceess fully";
		 
		 	 session_start();
		   $user_name =  $_SESSION['name'] = $return_if['full_name'];
		   echo $user_name ;
		   header('refresh:5; url=index.php');
		  
		  }else {
			  
			  echo "Email or pasword is not matched";
			  
			  }
	  
		 
	 
													}

else{ echo "Please enter the corect email or password";

}
?>