<?php
  require('config/db.php');

  //create query
  $query = SELECT * FROM posts;

  //get result
  $result = mysqli_query($conn, $query);

  //fetch data
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  //free result
  mysqli_free_result($result);

  //close connection
  mysqli_close($conn);
