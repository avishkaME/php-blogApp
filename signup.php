<?php
require('config/config.php');
require('config/db.php');
 ?>
 <?php include('inc/header.php'); ?>
 <div class="container">
   <?php
          if (isset($_GET["eror"])) {
            if ($_GET["eror"] == "emptyfields") {
              echo '<p class="alert alert-danger"> Fill in all fields! </p>';
            }
            else if ($_GET["eror"] == "invaliduidmail" ) {
              echo '<p class="alert alert-danger"> Invalid username and e-mail! </p>';
            }
            else if ($_GET["eror"] == "invalidmail") {
              echo '<p class="alert alert-danger"> Invalid e-mail</p>';
            }
            else if ($_GET["eror"] == "passwordcheck") {
              echo '<p class="alert alert-danger"> Your passwords do not match</p>';
            }
            else if ($_GET["eror"] == "usertaken") {
              echo '<p class="alert alert-danger"> Username is already taken</p>';
            }
          }
          // else if ($_GET["Signup"] == "success") {
          //   echo '<p class="signupsuccess">Signup successful</p>';
          // }
        ?>
   <form action="inc/signup.inc.php" method="POST">
   <div class="card" style="width:95%; margin:10px 0; background-color:rgb(240, 240, 240);">
   <h3 class="card-title" style="text-transform: capitalize; text-align:center;"><b>Signup</b></h3>
     <div class="form-group">
       <label>Username</label>
       <input type="text" class="form-control" placeholder="Enter username" name="uid">
     </div>
    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control" placeholder="Enter email" name="mail">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control"  placeholder="Password" name="pwd">
    </div>
    <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" class="form-control"  placeholder="Retype Password" name="pwd-repeat">
    </div>
    <button class="btn btn-danger " style=" width:100px; " type="submit" name="signup-submit">Signup</button>
    <!-- <a href="addPost.php" class="btn btn-primary" name="signup-submit">Signup</a> -->
  </form>
  </div>
 </div>



 <?php include('inc/footer.php'); ?>
