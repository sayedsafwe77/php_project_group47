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
    <form action="Adminroutes.php?action=category_saverecord" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="staticEmail" name="categorytname" value="<?=$record['name'] ?? ''?>">
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
