<?php include"header.php"; ?>



<?php 



  $posts_query = "SELECT * FROM posts";
  
     $posts_fetch  = mysqli_query($connect, $posts_query); 
    
	//echo var_dump($posts_get); 
 while($posts_get = mysqli_fetch_array($posts_fetch)
 		){
	//foreach ($posts_get as $key => $val ){   
	   
?>

 
 



<h4><a href="?p=<?php echo $posts_get['post_id']; ?>"><?php echo $posts_get['post_title']; ?></a></h4>

<p><?php echo $posts_get['post_content']; ?> </p>



<a  href="post_edit.php?p=<?php echo $posts_get['post_id']; ?>" class="label label-primary ">EDIT </a>
<span class="label label-info">author : <?php //echo $_SESSION['name']; ?></span>
<?php } ?>


</div>
</div>

</div>
</div>
</body>
</html>
