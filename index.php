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
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>my Blog</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Posts</h1>
    <?php foreach ($posts as $post) : ?>
      <div class="well">
        <h3><?php echo $post['title']; ?> </h3>
        <small>Creared on <?php echo $post['created_at']; ?> by <?php echo $post['writer']; ?></small>
        <p><?php echo $post['body']; ?></p>
      </div>

    <?php endforeach; ?>
  </div>


</body>
</html>
