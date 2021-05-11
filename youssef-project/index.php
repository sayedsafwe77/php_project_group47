<?php 
  session_start(); 

  if (!isset($_COOKIE['email'])) {
  	$_COOKIE['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_COOKIE['email']);
	// setcookie("PHPSESSID","",time()-3600);
  	header("location: login.php");
  }
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,200;1,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_COOKIE['email'])) : ?>

    	<p>Welcome <strong><?php echo $_COOKIE['email']; ?></strong></p>
    	<p>you are logged in as <strong><?php echo $_COOKIE['role']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
	<?php endif ?>
		
		<?php if($_COOKIE['role']=='admin') : ?>
		<a href="dashboard.php"> view dashboard</a>
		
		<?php else : ?>
			<a href="profile.php"> view profile</a>

		<?php endif; ?>
		
	

</div>
		
</body>
</html>