<?php include "header.php"; ?>
<div class="row">
    <div class="col-sm-3">
        <ul>
            <li></li>
        </ul>
        <ul>
            <li><a href="posts.php">Posts</a></li>
            <li><a href="pages.php">Pages</a></li>
            <li><a href="catogery.php">Catogery</a></li>
        </ul>

    </div>
</div>


<?php





function getAuthorName($userId)
{
    global $connect;
    $q_author = "SELECT * FROM users WHERE user_id = '$userId ";
    $result = mysqli_query($connect, $q_author);
    $array_author = mysqli_fetch_array($result);
    $authorName = $array_author["first_name"];
    return $authorName;
}


$posts_query = "SELECT *  FROM posts RIGHT JOIN users
     ON posts.post_author = users.user_id ";

$posts_fetch = mysqli_query($connect, $posts_query);

//echo var_dump($posts_get);
while ($posts_get = mysqli_fetch_array($posts_fetch)
) {
    //foreach ($posts_get as $key => $val ){

    // 	$authorName = getAuthorName( $posts_get['post_author']);	
    $authorName = $posts_get['first_name'];

    //  echo $authorName;
    $date = $posts_get['date_str'];

    $the_content = $posts_get['post_content'];


    ?>


    <h4><a href="?p=<?php echo $posts_get['post_id']; ?>"><?php echo $posts_get['post_title']; ?></a></h4>
    <p><?php if (strlen($the_content) > 20) {
            echo $the_content = substr($the_content, 0, 25) . '<br><a href=' . $posts_get['post_id'] . "> Read more</a>";
        } else {
            echo $the_content = $posts_get['post_content'];

        } ?></p>
    <p><?php //echo $posts_get['post_content'];
        ?> </p>


    <?php if (isset($_SESSION['name'])) { ?>


        <a href="post_edit.php?p=<?php echo $posts_get['post_id']; ?>" class="label label-primary ">EDIT </a>
    <?php } ?>
    <span class="label label-info">DATE : <?php echo $posts_get['post_date']; ?></span>
    <span class="label label-primary"> <?php echo date('d F y', $date); ?> </span>


    <span class="label label-info">author : <?php echo $posts_get['first_name']; ?></span>
<?php } ?>


</div>
</div>

</div>
</div>
</body>
</html>
