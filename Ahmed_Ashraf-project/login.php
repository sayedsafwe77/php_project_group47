<?php
$email=$_POST['email'];
$password=$_POST['password'];
$db='mysql:host=localhost;dbname=php_project';
$con=new PDO($db,'root','');
$query='select * from users where email=?';
$sql=$con->prepare($query);
$stm=$sql->execute([$email]);
$user=$sql->fetch();
if(md5($password)==$user['userpassword'])
{
    setcookie('userLogin',$user['email']);
    setcookie('name',$user['username']);
    setcookie('profilepic',$user['image']);
    setcookie('role',$user['role']);
    //
    if($user['role']=='user')
    {
        //redirt to profile
        header('Location:http://localhost/project/profile.php');
    }
    else{
        //redirt to dashboard
        header('Location:http://localhost/project/dashboard2.php');
    }

}else
{
    echo '<script>
            alert( "username or password not correct" )
            window.location= "http://localhost/project/login%20(2).php"
          </script>';
}

?>