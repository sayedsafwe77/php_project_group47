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
    <title>Abdel Zaher BackEnd Project</title>

</head>
<div>
<?php if(isset($_SESSION['name'])):?>   
 
 <h6><?=$_SESSION['name'] ?></h6>
 <a href="../User/Userroutes.php?action=logout" class="btn btn-danger">Log out</a>
 <a href="../User/views/userhome.html.php" class="btn btn-success">Profile</a>
 <?php else:?>
     <a href="../User/Userroutes.php?action=loginForm" class="btn btn-dark">Login</a>
     <a href="../User/Userroutes.php?action=register" class="btn btn-dark">register</a>
 
 <?php endif ?>
<a href="/Amit_backend_project_By_AHMED_ABDELZAHER/index.html.php" class="btn btn-success">Home page</a>
<a href="Adminhome.html.php" class="btn btn-success">Admin home</a>
</div>