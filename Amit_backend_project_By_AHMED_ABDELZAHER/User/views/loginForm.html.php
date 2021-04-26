<?php include('user_header.html.php') ?>

<main class="container">
  <h1 class="text-center">you are in Login page</h1>
<form class="col-6 mx-auto" method="POST" action="Userroutes.php?action=login">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</main>
<script src="../Admin/js/jquery-3.5.1.min.js"></script>
<script src="../Admin/js/bootstrap.min.js"></script>
