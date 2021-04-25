<?php
    $email=$_POST['email'];
    $password=$_POST['password'];
 $db='mysql:host=localhost;dbname=php_project';
 $con=new PDO($db,'root','');
 $query='select * from admin where email=?';
 $sql=$con->prepare($query);
 $stm=$sql->execute([$email]);
 $user=$sql->fetch();
 if(md5($password)==$user['userpassword'])
 {
     setcookie('userLogin',$user['email']);
     setcookie('Role',$user['role']);
    //
    if($user['role']=='user')
    {
        //redirt to profile
        header('Location:http://localhost/php_project/profile.html');
    }
    else{
        //redirt to dashboard
        header('Location:http://localhost/php_project/dashboard.php');
    }

 }
 
 ?>