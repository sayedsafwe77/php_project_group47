<?php
include('db.php');
$con= new db('localhost','php_project','root','');
if(isset($_POST['id']))
{
    $con->delete('admin',$_POST['id']);
    header('Location:http://localhost/php_project/dashboard2.php');
}
?>