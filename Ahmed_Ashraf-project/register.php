<?php
$name= $_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$profilepic=$_FILES['profilepic']['name'];
$tmpName=$_FILES['profilepic']['tmp_name'];
move_uploaded_file($tmpName,'userImages/'.$profilepic);
$db='mysql:host=localhost;dbname=php_project';
$con=new PDO($db,'root','');
$pattern = '/^(?:(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*)$/' ;
$namePattern = '/^(?![_.])(?!.*[_.]{2})[a-zA-Z._]+(?<![_.])$/';
$emailValidation =  filter_var($email, FILTER_VALIDATE_EMAIL );
$passwordValidation = preg_match($pattern , $password);
$usernameValidation = preg_match($namePattern , $name);
echo  $_FILES['profilepic']['name'];
if ($emailValidation && $passwordValidation && $usernameValidation){
    $query='insert into users(`username`,`email`,`userpassword`,`image`,`role`) values (?,?,?,?,"user")';
    $sql=$con->prepare($query);
    $sql->execute([$name,$email,$password,$profilepic]);
    header('Location:http://localhost/project/login (2).php');
}else if( !$usernameValidation){
    echo '<script>
            alert("syntax of username is wrong")
            window.location= "http://localhost/project/register.html"
         </script> ';
}else if( !$emailValidation){
    echo '<script>
            alert("syntax of email is wrong")
            window.location= "http://localhost/project/register.html"
         </script> ';
}else if( !$passwordValidation){
    echo '<script>
            alert("syntax of password is wrong")
            window.location= "http://localhost/project/register.html"
         </script> ';
}
