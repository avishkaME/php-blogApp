<?php
require('config/config.php');
require('config/db.php');
//require('login.php');

//check for Submit
if (isset($_POST['submit'])) {
  //get form data
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $writer = mysqli_real_escape_string($conn, $_POST['writer']);

  $query = "INSERT INTO posts(title, body, writer) VALUES ('$title', '$body', '$writer')";

  if (mysqli_query($conn, $query)) {
    header('Location: '.ROOT_URL.'');
  }else {
    echo 'error:'.mysqli_error($conn);
  }
}

?>

<?php
//form validation//

  //Message vars
  $msg = '';
  $msgClass =  '';

  //check for submit
  if (filter_has_var(INPUT_POST, 'submit')) {
    // get form data
    $title1 = $_POST['title'];
    $writer1 = $_POST['writer'];
    $text = $_POST['body'];

    if (!empty($title1) && !empty($writer1) && !empty($text)) {
      // passed
      echo "passed";
    } else {
      // failed
      $msg = 'please fill all fields';
      $msgClass = 'alert-danger';
    }
  }

 ?>

<?php include('inc/header.php'); ?>
<div class="card mx-auto" style="width:95%; margin:10px 0; background-color:rgb(240, 240, 240);">
<div class="container">

  <?php if($msg != ''): ?>
      <div class="alert <?php echo $msgClass; ?>">
        <?php echo $msg; ?>
      </div>
  <?php endif; ?>

  <h1 style="text-align:center;">Add Post</h1>
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
    <input type="submit" name="submit" value="Submit" class="btn btn-danger">

  </form>
</div>
</div>
<?php include('inc/footer.php'); ?>
