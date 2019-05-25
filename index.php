<?php
require('config/db.php');

//create query
$query = 'SELECT * FROM posts';

//get result
$result = mysqli_query($conn, $query);

//fetch data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result
mysqli_free_result($result);

//close connection
mysqli_close($conn);

?>
<?php include('inc/header.php'); ?>
<div class="container">
  <h1>Posts</h1>
  <?php foreach ($posts as $post) : ?>
    <div class="well">
      <h3><?php echo $post['title']; ?> </h3>
      <small>Creared on <?php echo $post['created_at']; ?> by <?php echo $post['writer']; ?></small>
      <p><?php echo $post['body']; ?></p>
      <a class="btn btn-default" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
    </div>

  <?php endforeach; ?>
</div>
<?php include('inc/footer.php'); ?>
