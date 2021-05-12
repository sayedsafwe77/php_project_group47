<?php
$id =  $_POST['id'];
$name= $_POST['username'];
$email=$_POST['email'];
$role =$_POST['role'];
$db='mysql:host=localhost;dbname=php_project';
$con=new PDO($db,'root','');

 if (isset($_POST['delete_button'])) {
    $query='DELETE FROM `users` WHERE id ='.$id;
    $sql=$con->prepare($query);
    $stm = $sql->execute( );
    var_dump($stm);
} else if (isset($_POST['update_button'])) {
    $query='UPDATE `users` SET `username`= ? ,`email`= ? ,`role`= ?  WHERE id ='.$id;
    $sql=$con->prepare($query);
    $sql->execute([$name,$email,$role]);

 }
header('Location:http://localhost/project/stat.php');

