<?php
require('config/config.php');
require('config/db.php');

//create query
$query = 'SELECT * FROM posts ORDER BY created_at DESC';

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
<div class="container" >
  <h1 style="text-align:center;">Posts</h1>
  <?php foreach ($posts as $post) : ?>
    <div class="card" style="width:95%; margin:10px 0; background-color:rgb(240, 240, 240);">
     <div class="card-body">
      <h3 class="card-title" style="text-transform: capitalize;"><b><?php echo $post['title']; ?></b> </h3>

      <br/>
      <p class="card-text"><?php echo $post['body']; ?></p>
      <small style="color:gray; ">Creared on <?php echo $post['created_at']; ?> by <?php echo $post['writer']; ?></small>
       <br/>
      <a class="btn btn-danger" style="float:right;" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
      </div>
    </div>

  <?php endforeach; ?>
</div>
<?php include('inc/footer.php'); ?>
