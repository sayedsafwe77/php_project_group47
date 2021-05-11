<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$role ="";
$image="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  //  inpits form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  $image=$_FILES['image']['name'];
  $upload="uploads/".$image;
  
  // form validation
  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  
  // check data base
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  // register user
   
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password ,image,role ) 
  	VALUES('$username', '$email', '$password','$upload','$role')";
  	mysqli_query($db, $query);
    setcookie('name',$username);
    setcookie('email',$email);
    setcookie('role',$role);
    setcookie('success',"You are now logged in");
  	 header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  // $role = mysqli_real_escape_string($db, $_POST['role']);

  if (empty($email)) {
  	array_push($errors, "email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {

  	  $_COOKIE['email'] = $email;
  	  $_COOKIE['role'] = $role;
  	  $_COOKIE['success'] = "You are now logged in";
  	  header('location: index.php');
  	}
    else {
      array_push($errors, "Wrong email/password combination");
  	}
  }
  
}

?>