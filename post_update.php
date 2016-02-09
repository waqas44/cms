<?php
include "header.php";
if (isset($_SESSION['name'])){

if (isset($_POST['post_id']) &&  $_POST['post_id'] !==''
	&& isset($_POST['post_title']) &&  $_POST['post_title'] !==''
	&& isset($_POST['post_content']) &&  $_POST['post_content'] !==''	 )
	{
	$post_id = data_clean($_POST['post_id']);
	  $post_title = 	data_clean($_POST['post_title']);
	  $post_content =  data_clean($_POST['post_content']); 
	  
	$post_update = "UPDATE posts SET post_title='$post_title', post_content='$post_content'  WHERE post_id = '$post_id'";
	
	$post_update_q = mysqli_query($connect, $post_update);
	
	
	
	//$post_check_rtn = mysqli_fetch_array($post_check_q);
	
	if ($post_update_q)
		{
		echo "POST  updated"; 
		
		 $post_fetch = "SELECT * FROM posts WHERE post_id='$post_id'";
		 
		$post_fetch_q = mysqli_query($connect,$post_fetch );
		
		if ($post_update_q){
		$current_post_rtn = mysqli_fetch_array($post_fetch_q);
		header('refresh:1, url=index.php');
		
		
		
		
		?>
						
<?php /*?><form action="<?php //$_SERVER['PHP_SELF'] ?>" method="post">

<div class="form-group">
<input class="form-control" type="text" name="post_title" value="<?php echo $current_post_rtn['post_title'] ?>" placeholder="post title"></div>
<div class="form-group">
<textarea name="post_content" class="form-control" rows="5"  placeholder="post content"><?php echo $current_post_rtn['post_content'] ?></textarea></div>
<input type="text" value="<?php echo $current_post_rtn['post_id'] ?>" name="post_id">
<input class="btn btn-primary" type="submit" name="submit_content" value="UPDATE">
</form><?php */?>

						
						
						
						<?php 
						}
		}
	  else
		{
		echo "post could not  updated";
		}
						}
					  else
						{ echo "<b>All fields are required<b>";
						 //header('refresh:25, url=index.php');
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