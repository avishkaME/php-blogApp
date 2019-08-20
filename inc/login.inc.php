<?php

if (isset($_POST['login-submit'])) {

  require('../config/db.php');

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?eror=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM login_user WHERE usersEmail=? OR uidUsers=?; ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?eror=sqleror");
      exit();
    }
    else {

      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['usersPwd']);
        if ($pwdCheck == false) {
          header("Location: ../index.php?eror=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {
          session_start();
          $_SESSION['userId'] = $row['usersId'];
          $_SESSION['userUid'] = $row['uidUsers'];

          header("Location: ../addPost.php?login=sucess");
          exit();
        }
        else {
          header("Location: ../index.php?eror=wrongpwd");
          exit();
        }
      }
      else {
        header("Location: ../index.php?eror=nouser");
        exit();
      }

    }
  }
}
else{
  header("Location: ../index.php");
  exit();
}
