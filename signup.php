<?php include"header.php"; ?>



<?php

// echo var_dump($user_name1);
if(isset($_POST['submit_f']) && $_POST['submit_f'] !== ""){
	
	

if (isset($_POST['user_fullname_f']) && ($_POST['user_fullname_f'] != "") && isset($_POST['user_email_f']) && ($_POST['user_email_f'] != "") && isset($_POST['user_pass_f']) && ($_POST['user_pass_f'] != ""))
	{
	$user_fullname = trim($_POST['user_fullname_f']);
	 $user_fullname = data_clean($user_fullname);
	$user_email = trim($_POST['user_email_f']);
	$user_email = data_clean($user_email);
	$user_pass = trim($_POST['user_pass_f']);
	$user_pass = data_clean($user_pass);
	$user_pass = sha1($user_pass);
	
	
	$user_already = "SELECT * FROM user WHERE email_id='$user_email'";
	$pre_user = mysqli_query($connect, $user_already);
	$return_if = mysqli_fetch_array($pre_user);
	if ($return_if['email_id'] == '')
		{
		$qur = "INSERT INTO user (full_name, email_id, password) VALUES ('$user_fullname' , '$user_email', '$user_pass')";
		$result = mysqli_query($connect, $qur);
		echo var_dump($return_if);
		echo "Query executed sucessfully. <br /><br /><br /><br />";
		echo "User data added successfully";
		}
	  else
		{
		echo "user already exist use another email";

		// echo var_dump($pre_user);

		}
	}
  else
	{
	echo "User data could not be added <br />";
	echo "Please fill all the required fields correctly. <br /><br />";
	echo mysqli_error($connect);

	// echo "<br />".var_dump($result);

	header('refresh:5; url=index.php');
	}
 }
?>








<div class="row"><div class="col-sm-5"><form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">


<div class="form-group"><input type="text" class="form-control" name="user_fullname_f"  placeholder="User Name"> </div>
 <div class="form-group"> <input type="email" class="form-control"  name="user_email_f" placeholder="Email" >  </div>
<div class="form-group"><input type="password" class="form-control"  name="user_pass_f" placeholder="Password" >  </div>

<input type="submit" name="submit_f" value="submit"  class="btn btn-primary">

</form></div></div>

</div>
</div>
</div>
</div>
</body>
</html>
