<?php 
if(!isset($_SESSION))
session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/Amit_backend_project_By_AHMED_ABDELZAHER/Admin/css/bootstrap.min.css">
    <title>Abdel Zaher BackEnd Project</title>
</head>
<div>
 <?php if(isset($_SESSION['name'])):?>   
 
<h6><?=$_SESSION['name'] ?></h6>
<a href=<?php echo("/Amit_backend_project_By_AHMED_ABDELZAHER/User/Userroutes.php?action=logout")?> class="btn btn-success">Log out</a>
<a href=<?php echo("/Amit_backend_project_By_AHMED_ABDELZAHER/User/views/userhome.html.php")?> class="btn btn-danger">Profile</a>

<?php else:?>
    <a href=<?php echo("/Amit_backend_project_By_AHMED_ABDELZAHER/User/Userroutes.php?action=loginForm")?> class="btn btn-dark">Log IN</a>

<?php endif ?>
<a href="/Amit_backend_project_By_AHMED_ABDELZAHER/index.html.php" class="btn btn-dark">Home page</a>
<a href="/Amit_backend_project_By_AHMED_ABDELZAHER/User/Userroutes.php?action=register" class="btn btn-dark">register</a>

<?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'):?>
<a href="/Amit_backend_project_By_AHMED_ABDELZAHER/Admin/Adminhome.html.php" class="btn btn-dark">Admin home</a>
<?php endif;?>
</div>