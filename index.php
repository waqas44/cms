<?php include"header.php"; ?>



<?php 

  
    /* $post_author_id = $posts_get['post_author'];

  // $post_author = "SELECT * FROM users WHERE user_id = ";
   
  $find = "SELECT * FROM users WHERE user_id= '$post_author_id'";
  $result = mysqli_query($connect,$find);
  
  $posts_result = mysqli_fetch_array($result);*/
  
  
  function getAuthorName($userId){
 global $connect;
	 $q_author = "SELECT * FROM users WHERE user_id = '$userId' ";
  $result = mysqli_query($connect,$q_author);
  $array_author =  mysqli_fetch_array($result);
  $authorName = $array_author["first_name"] ;
	  return $authorName ;
	  }
  
   
  $posts_query = "SELECT *  FROM posts RIGHT JOIN users
     ON posts.post_author = users.user_id ";
  
     $posts_fetch  = mysqli_query($connect, $posts_query); 
    
	//echo var_dump($posts_get); 
 while($posts_get = mysqli_fetch_array($posts_fetch)
 		){
	//foreach ($posts_get as $key => $val ){   
 
    // 	$authorName = getAuthorName( $posts_get['post_author']);	
     $authorName = $posts_get['first_name'];      
		
	 //  echo $authorName;
	   
?>

 
 



<h4><a href="?p=<?php echo $posts_get['post_id']; ?>"><?php echo $posts_get['post_title']; ?></a></h4>

<p><?php echo $posts_get['post_content']; ?> </p>



<a  href="post_edit.php?p=<?php echo $posts_get['post_id']; ?>" class="label label-primary ">EDIT </a>
<span class="label label-info">DATE : <?php echo $posts_get['post_date'];  ?></span>
 

<span class="label label-info">author : <?php echo $posts_get['first_name']; ?></span>
<?php } ?>


</div>
</div>

</div>
</div>
</body>
</html>
