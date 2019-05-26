<?php
require('config/config.php');
require('config/db.php');

//check for Submit
if (isset($_POST['submit'])) {
  //get form data
  $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $writer = mysqli_real_escape_string($conn, $_POST['writer']);

  $query = "UPDATE posts SET
              title = '$title',
              writer = '$writer',
              body = '$body'
              WHERE id = {$update_id}";

  if (mysqli_query($conn, $query)) {
    header('Location: '.ROOT_URL.'');
  }else {
    echo 'error:'.mysqli_error($conn);
  }
}
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
  <h1>Add Post</h1>
  <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="form-group">
      <label>Title</label>
      <input type="text" name="title" value="<?php echo $post['title']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>writer</label>
      <input type="text" name="writer" value="<?php echo $post['writer']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
    </div>
    <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">

  </form>
</div>
<?php include('inc/footer.php'); ?>
