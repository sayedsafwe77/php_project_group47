<?php 
if(!isset($_SESSION))
session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body class="container">
    <article class="col-6 mx-auto">
      <h6 class="text-center">You are in Register Page</h6>
    <form action="Adminroutes.php?action=admin_saverecord" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="staticEmail" name="username" value="<?=$record['username'] ?? ''?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" value="<?=$record['email'] ?? ''?>" id="inputPassword" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
    <div class="col-sm-10">
      <input type="file" name='image' class="form-control" id="inputPassword" ">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="text" name="userpassword" class="form-control" value="<?=$record['userpassword'] ?? ''?>" id="inputPassword" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
     
      <select name="role">
      <option value="admin">admin</option>
      <option value="user">user</option>
      </select>
    </div>
  </div>
  <input type="hidden" name='id' value="<?=$record['id'] ?? ''?>">
  <input type="submit" class="btn btn-success" value="save">


</form>
    </article>
</body>
</html>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
