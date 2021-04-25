<?php
    $name=$_POST['username'];
    $password=md5($_POST['password']);
    $email=$_POST['email'];
    $profilepic=$_FILES['profilepic']['name'];
    $tmpName=$_FILES['profilepic']['tmp_name'];
    
    $userRole=$_POST['ROLE'];
     move_uploaded_file($tmpName,'userImages/'.$profilepic);
    $db='mysql:host=localhost;dbname=php_project';
    $con=new PDO($db,'root','');
    $query='insert into admin(`username`,`userpassword`,`email`,`image`,`role`) values (?,?,?,?,?)';
    $sql=$con->prepare($query);
    $res=$sql->execute([$name,$password,$email,$profilepic,$userRole]);
    var_dump($res);
?>