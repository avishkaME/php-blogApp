<?php
require('config/config.php');
require('config/db.php');

//check for Submit
if (isset($_POST['submit'])) {
  //get form data
  $title = mysqli_real_escape_string($_POST['title']);
  $body = mysqli_real_escape_string($_POST['body']);
  $writer = mysqli_real_escape_string($_POST['writer']);
}

?>
<?php include('inc/header.php'); ?>
<div class="container">
  <h1>Add Post</h1>
  <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="form-group">
      <label>Title</label>
      <input type="text" name="title" value="" class="form-control">
    </div>
    <div class="form-group">
      <label>writer</label>
      <input type="text" name="writer" value="" class="form-control">
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea name="body" class="form-control"></textarea>
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">

  </form>
</div>
<?php include('inc/footer.php'); ?>
