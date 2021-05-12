<?php
$amount= $_POST['amount'];
$productId= $_POST['id'] ;
$email = $_COOKIE['userLogin'];
$db='mysql:host=localhost;dbname=php_project';
$con=new PDO($db,'root','');

$userQuery= "SELECT id FROM `users` where email ='".$email."'";
$userSql=$con->prepare($userQuery);
$userSql->execute();
$result = $userSql -> fetchAll();
$usreId = $result[0]['id'];
/*///////////////////////////////////////////////*/
$productQuery= "SELECT price FROM `product` where id =".$productId;
$productSql=$con->prepare($productQuery);
$productSql->execute();
$result = $productSql -> fetchAll();
$productPrice = $result[0]['price'];
var_dump($productPrice);
$price = $amount * $productPrice ;
var_dump($price);
/*//////////////////////////////*/
$query='insert into `orders`(`user_id`,`product_id`,`amount`,`price`) values (?,?,?,?)';
$sql=$con->prepare($query);
$sql->execute([$usreId,$productId,$amount,$price]);
echo '<script>
           alert("Order will be with you in 2 days") 
           window.location= "http://localhost/project/products.php"
      </script>';

