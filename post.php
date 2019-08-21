<?php
require('config/config.php');
require('config/db.php');

//check for delete
if (isset($_POST['delete'])) {
  //get form data
  $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

  $query = "DELETE FROM posts WHERE id = {$delete_id}";

  if (mysqli_query($conn, $query)) {
    header('Location: '.ROOT_URL.'');
  }else {
    echo 'error:'.mysqli_error($conn);
  }
}

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
<?php include('inc/header.php'); ?>
<div class="container">

  <a href="<?php echo 'index.php'; ?>" class="btn btn-dark">Back</a>
  <div class="card" style="width:95%; margin:10px 0; background-color:rgb(240, 240, 240);">
  <div class="card-body">
  <h1 style="text-transform: capitalize;"><b><?php echo $post['title']; ?></b> </h1>
  <small style="color:gray; float:right;">Created on <?php echo $post['created_at']; ?> by <?php echo $post['writer']; ?></small>
  <br/>
  <p><?php echo $post['body']; ?></p>
  </div>
  <form class="pull-right" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
    <a href="editPost.php?id=<?php echo $post['id']; ?>" class="btn btn-dark" >Edit</a>
    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
  </form>
  </div>
  
</div>


<?php include('inc/footer.php'); ?>
