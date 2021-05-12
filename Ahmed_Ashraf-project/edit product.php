<?php
$id =  $_POST['id'];
$name= $_POST['productName'];
$price = $_POST['price'];
$db='mysql:host=localhost;dbname=php_project';
$con=new PDO($db,'root','');

if (isset($_POST['delete_button']))  {
    $query='DELETE FROM `product` WHERE id ='.$id;
    $sql=$con->prepare($query);
    $sql->execute();
} else if (isset($_POST['update_button'])) {
    $query='UPDATE `product` SET `productname`= ? ,`price`= ? WHERE id ='.$id;
    $sql=$con->prepare($query);
    $sql->execute([$name,$price]);
}
header('Location:http://localhost/project/product%20stat.php');
