<?php
if(!isset($_SESSION)) session_start();
if (is_file('../../Admin/includes/Connection.php'))
include ('../../Admin/includes/Connection.php');
$query="select * from admin where username=?";
$stmt=$connection->prepare($query);
$stmt->execute([$_SESSION['name']]);
$record=$stmt->fetch();
include("user_header.html.php");
?>
<main class="container">
    <h1 class="text-center">You are in Profile page</h1>
<img src="<?php echo "/Amit_backend_project/Admin/images/admin/".$record['image'] ?>"
style="width:200px">
<h1><?php echo $record['username'] ?></h1>
<h6><?php echo $record['email']?></h6>
<h6><?php echo $record['role'] ?></h6>

</main>