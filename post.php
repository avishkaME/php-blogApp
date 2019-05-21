<?php
require('config/config.php');
require('config/db.php');

//get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

//create query
$query = 'SELECT * FROM posts WHERE id = '.$id;

//get result
$result = mysqli_query($conn, $query);

//fetch data
$post = mysqli_fetch_assoc($result);

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
    <a href="<?php echo ROOT_URL; ?>" class="btn btn-default">Back</a>
    <h1><?php echo $post['title']; ?> </h1>
    <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['writer']; ?></small>
    <p><?php echo $post['body']; ?></p>

  </div>


</body>
</html>
