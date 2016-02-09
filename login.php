<?php
include "header.php";

if (isset($_POST['submit_li']) && $_POST['submit_li'] !== "") //checking if user have click on submit button
	{
	
	if (isset($_POST['user_email_li']) && $_POST['user_email_li'] != ""  //Checking if user have type some text and not filed are not empty
	&& isset($_POST['user_pass_li']) && $_POST['user_pass_li'] != "")
		{
			$user_email = trim($_POST['user_email_li']);
			$user_email = data_clean($user_email);
			$user_pass = trim($_POST['user_pass_li']);
			$user_pass = data_clean($user_pass);
			$user_pass = sha1($user_pass);
			
		$user_login = "SELECT * FROM user WHERE email_id='$user_email'";
		$user_qry = mysqli_query($connect, $user_login);
		$return_if = mysqli_fetch_array($user_qry);
		if (($return_if['email_id'] == $user_email) && ($return_if['password'] == $user_pass))
			{
			echo "You are loged in suceess fully";
			
			$user_name = $_SESSION['name'] = $return_if['full_name'];
			echo $user_name;
			header('refresh:1; url=index.php');
			}
		  else
			{
			echo "Email or pasword is not matched";
			}
		}
	  else
		{
		echo "Please enter the corect email or password";
		}
	}

?>

<div class="row"><div class="col-sm-5"><form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">


<div class="form-group">
<input type="email" class="form-control" name="user_email_li"  placeholder="User Name">
</div>
<div class="form-group">
<input type="password" class="form-control" name="user_pass_li" placeholder="Password" >
</div>
<input type="submit" name="submit_li" value="submit" class="btn btn-primary" > 
</form></div></div>

 </div>

</div>
</div>
</div>
</body>
</html>