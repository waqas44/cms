<?php
include "header.php";
if (isset($_SESSION['name'])){

if (isset($_GET['p']) &&  $_GET['p'] !=='' )
	{
	$post_id = $_GET['p'];
	$post_check = "SELECT * FROM posts WHERE post_id = '$post_id'";
	$post_check_q = mysqli_query($connect, $post_check);
	$post_check_rtn = mysqli_fetch_array($post_check_q);
	if ($post_check_rtn['post_id'])
		{
		echo "post exist"; 
		
		
		
		
		
		
		
		
		
		
		?>
						
<form action="post_update.php" method="post">

<div class="form-group">
<input class="form-control" type="text" name="post_title" value="<?php echo $post_check_rtn['post_title'] ?>" placeholder="post title"></div>
<div class="form-group">
<textarea name="post_content" class="form-control" rows="5"  placeholder="post content"><?php echo $post_check_rtn['post_content'] ?></textarea></div>
<input type="hidden" value="<?php echo $post_check_rtn['post_id'] ?>" name="post_id">
<input class="btn btn-primary" type="submit" name="submit_content" value="UPDATE">
</form>

						
						
						
						<?php
		}
	  else
		{
		echo "post do not  exist";
		}
						}
					  else
						{ echo "<b>Post not exist any more<b>";
						 header('refresh:25, url=index.php');
						}
		}else {
			
			echo "You may need login";
			header('refresh:7, url=login.php');
			
			}

?>


						
				
</div>
</div>
</div>
</body>
</html>