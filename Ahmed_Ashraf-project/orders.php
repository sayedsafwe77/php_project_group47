<?php
$db='mysql:host=localhost;dbname=php_project';
$con=new PDO($db,'root','');
$query='select * from orders ';
$sql=$con->prepare($query);
$sql->execute();
$result = $sql -> fetchAll();

?>
<!doctype html>
<html>
<head>
    <title> test </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="stat.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;500&display=swap" rel="stylesheet">-->
</head>
<body>


<div class="container">
    <table>
        <caption class="heading">Orders</caption>
        <thead>
        <tr>
            <th scope="col">ORDER ID</th>
            <th scope="col">User ID</th>
            <th scope="col">PRODUCT ID</th>
            <th scope="col">AMOUNT</th>
            <th scope="col">PRICE</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0 ; $i < count($result) ; $i++ ){
            ?>
            <form method="post" action="edit.php">
                <tr class="row">
                    <td data-label="Account"><?php  echo $result[$i]['id'] ?>  </td>
                    <td data-label="Due Date"><?php  echo $result[$i]['user_id'] ?>  </td>
                    <td data-label="Amount"><?php  echo $result[$i]['product_id'] ?>  </td>
                    <td data-label="Period"><?php  echo $result[$i]['amount'] ?>  </td>
                    <td data-label="Period"><?php  echo $result[$i]['price'] ?>  </td>

                </tr>
            </form>
            <?php
        }
        ?>
        </tbody>
    </table>


</div>
<script src="jquery-3.5.1.min.js"></script>
<script src="stat.js" ></script>
</body>
</html>