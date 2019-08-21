<?php
require('config/config.php');
require('config/db.php');
 ?>
 <?php include('inc/header.php'); ?>
 <div class="card mx-auto" style="width:90%; margin:10px 0; background-color:rgb(240, 240, 240) ;">
 <h3 class="card-title" style="text-transform: capitalize; text-align:center;"><b>Login</b></h3>
 <div class="container">
   <form action="inc/login.inc.php" method="post">
    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control" placeholder="Enter email" name="mailuid">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control"  placeholder="Password" name="pwd">
    </div>
    
    <button class="btn btn-danger" type="submit" name="login-submit">Login</button>
    <!-- <a type="submit" name="login-submit" href="addPost.php" class="btn btn-primary">Login</a> -->
    <a href="signup.php" class="btn btn-danger"> Signup</a>
   
  </form>
  </div>
 </div>



 <?php include('inc/footer.php'); ?>
