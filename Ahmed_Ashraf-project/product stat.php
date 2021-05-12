<?php
$db='mysql:host=localhost;dbname=php_project';
$con=new PDO($db,'root','');
$query='select * from product';
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
    <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>


<div class="container">
    <table>
        <caption>Product</caption>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">product name</th>
            <th scope="col">price</th>
            <th scope="col">operations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0 ; $i < count($result) ; $i++ ){
            ?>
            <form method="post" action="edit%20product.php" >
            <tr class="row">
                <td data-label="Account"><?php  echo $result[$i]['id'] ?>  </td>
                <td data-label="Due Date"><?php  echo $result[$i]['productname'] ?>  </td>
                <td data-label="Amount"><?php  echo $result[$i]['price'] ?>  </td>
                <td data-label="Period">
                    <button value="edit" type="button" class="editBtn" id="<?php echo  $result[$i]['id'] ?>">edit</button>
                    <button  name="delete_button" type="submit" value="delete" class="deleteBtn">delete</button>
                </td>
            </tr>

            <tr class="editing" id="<?php echo  $result[$i]['id'] ?>" style="display: none">
                <td data-label="Account"><input name="id" value="<?php echo $result[$i]['id'] ?> " required></td>
                <td data-label="Due Date"><input name="productName" value="<?php echo $result[$i]['productname'] ?> " required></td>
                <td data-label="Amount"><input name="price" value="<?php echo $result[$i]['price'] ?> " required></td>
                <td data-label="Period">
                    <button  name="update_button" value="save" class="saveBtn" id="<?php echo $result[$i]['id'] ?>">Save </button>
                    <button value="cancel"  type="button" class="cancelBtn">Cancel</button>
                </td>
            </tr>
            </form>
            <?php
        }
        ?>
        </tbody>
    </table>


</div>
<script src="jquery-3.5.1.min.js"></script>
<script>
    $(function(){
        $(".editBtn").click(function(){
            var val = $(this).attr('id');
            $(this).parents().siblings("#" + val+  " ").css('display' , 'contents');
            $(".row").css('display' , 'none');
        });
        $(".cancelBtn").click(function(){
            $(this).parents(".editing").css('display' , 'none');
            $(".row").css('display' , 'revert');
        });
        $(".deleteBtn").click(function(){
            alert('Are you sure?')
        });
    });
</script>
</body>
</html>