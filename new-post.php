<?php
include "header.php";

if (isset($_SESSION['name']))
	{ ?>
<?php
	if (isset($_POST['submit_content']))
		{
		if (isset($_POST['post_title']) && ($_POST['post_title'] != "") 
		&& isset($_POST['post_content']) && ($_POST['post_content'] != ""))
			{
			$post_title = trim($_POST['post_title']);
			$post_title  = data_clean($post_title);
			$post_content = trim($_POST['post_content']);
			$post_content = data_clean($post_content);
			
			
			$user_login = "INSERT INTO posts (post_title, post_content) VALUES ('$post_title', '$post_content')";
			$post_qry_ins = mysqli_query($connect, $user_login);

			// $return_if =  mysqli_fetch_array($user_qry);

			if ($post_qry_ins)
				{
				echo "Post Data inserted suceess fully";
				header('refresh:5, url=index.php');
				echo mysqli_error($connect);
				}
			  else
				{
				echo "Post Data not inserted ";
				}
			}
		  else
			{
			echo "Please enter the corect Post title and content";
			}
		}
	  //else	{ header('refresh:2, url=index.php');}

?>
 <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

<div class="form-group"> <!--<input class="input-lg" type="text" name="post_title" placeholder="post title">-->

<input type="text" name="post_title" class="form-control" placeholder="Post Title" >
</div>
<div class="form-group"> 
<textarea name="post_content" class="form-control"  rows="15" placeholder="Post Content"></textarea>
</div>
<input class="btn btn-default" type="submit" name="submit_content" value="submit">
</form>




<h1>Post Title</h1>

<p>post content     Here </p>



<a  href="#" class="label label-primary">Edit</a>
<span class="label label-info">author : abc</span>

</div>
</div>
</div>
</div>
</body>
</html>
<?php
	}
  else
	{ 
	echo "you need to login";
	header('refresh:2, url=login.php');
	} ?>
