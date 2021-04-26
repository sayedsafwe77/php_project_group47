<?php
if (!isset($_SESSION)) session_start();
class HomeController
{
    public function loginForm()
    {
        include ("views/loginForm.html.php");
    }
    public function Login($connect,$table)
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="select * from ".$table." where `email`=? and `userpassword`=?";
        $stmt=$connect->prepare($query);
        $stmt->execute([$email,$password]);
        $record=$stmt->fetch();
        if ($record!=null)
        {
            $_SESSION['name']=$record['username'];
            $_SESSION['role']=$record['role'];
            if ($_SESSION['role']=='admin') header('location: ../Admin/Adminroutes.php?action=home');
            if ($_SESSION['role']=='user')  header("location:../User/Userroutes.php?action=userhome");
            echo "credential found el7md lellah";
        }
        else echo ("Credential not found");
    }
    public function Logout()
    {
        session_destroy();
        header("location: ../index.html.php");
    }
}