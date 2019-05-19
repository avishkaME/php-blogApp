<?php
  $conn = mysqli_connect('localhost', 'root', '', 'blogapp');

  if (mysqli_connect_errno()) {
    echo 'failed to connect '. mysqli_connect_errno();
  }
