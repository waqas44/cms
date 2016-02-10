<?php include"header.php"; ?>



<?php

// echo var_dump($user_name1);
if(isset($_POST['submit_f']) && $_POST['submit_f'] !== ""){
	
	

if (isset($_POST['user_first_f']) && ($_POST['user_first_f'] != "") 
&& isset($_POST['user_last_f']) && ($_POST['user_last_f'] != "") 
&& isset($_POST['user_email_f']) && ($_POST['user_email_f'] != "") 
&& isset($_POST['user_pass_f']) && ($_POST['user_pass_f'] != "") 
//&& isset($_POST['user_conf_pass_f']) && ($_POST['user_conf_pass_f'] != "")
){
	
	if($_POST['user_pass_f'] == $_POST['user_conf_pass_f']){
	
	$user_first = trim($_POST['user_first_f']);
	 $user_first = data_clean($user_first);
	
	 $user_last = trim($_POST['user_last_f']);
	$user_last = data_clean($user_last);
	
	$user_email = trim($_POST['user_email_f']);
	$user_email = data_clean($user_email);
	
	$user_pass = trim($_POST['user_pass_f']);
	$user_pass = data_clean($user_pass);
	$user_pass = sha1($user_pass);
	
	$user_conf_pass = trim($_POST['user_conf_pass_f']);
	$user_conf_pass = data_clean($user_conf_pass);
	
	//$register_date = date('d F Y');
	
	$user_already = "SELECT * FROM users WHERE email_id='$user_email'";
	$pre_user = mysqli_query($connect, $user_already);
	$return_if = mysqli_fetch_array($pre_user);
	if ($return_if['email_id'] == '')
		{
		$qur = "INSERT INTO users (first_name, last_name,  email_id, password ) VALUES ('$user_first' , '$user_last' , '$user_email', '$user_pass')";
		$result = mysqli_query($connect, $qur);
		//echo var_dump($return_if);
		echo "<h4 style='color:green'>Query executed sucessfully.</h4>";
		echo "<h4 style='color:green'>User data added successfully</h4>";
		}
	  else
		{
		echo "<h4 style='color:blue'>user already exist use another email</h4>";

		// echo var_dump($pre_user);

		}
	
	
	} else{
		echo "<h4 style='color:red'>Password Do not match with confirm password</h4>";
		
		}




}
  else
	{
	echo "<h4 style='color:red'>User  could not be Created </h4><br />";
	echo "<h4 style='color:red'>Please fill all the required fields correctly. </h4>";
	echo mysqli_error($connect);

	// echo "<br />".var_dump($result);

	header('refresh:55; url=index.php');
	}
 }
?>








<div class="row"><div class="col-sm-5"><form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">


<div class="form-group"><input type="text" class="form-control" name="user_first_f"  placeholder="First Name"> </div>
<div class="form-group"><input type="text" class="form-control" name="user_last_f"  placeholder="Last Name"> </div>
 <div class="form-group"> <input type="email" class="form-control"  name="user_email_f" placeholder="Email" >  </div>
<div class="form-group"><input type="password" class="form-control"  name="user_pass_f" placeholder="Password" >  </div>
<div class="form-group"><input type="password" class="form-control"  name="user_conf_pass_f" placeholder="Confirm Password" >  </div>

<input type="submit" name="submit_f" value="submit"  class="btn btn-primary">

</form></div></div>

</div>
</div>
</div>
</div>
</body>
</html>
