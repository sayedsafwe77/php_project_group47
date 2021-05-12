<?php
$db='mysql:host=localhost;dbname=php_project';
$con=new PDO($db,'root','');
$query='select * from users ';
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
    <link rel="stylesheet" href="stat.css"> <!-- <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;500&display=swap" rel="stylesheet">-->
</head>
<body>


<div class="container">
    <table>
        <caption class="heading">Users</caption>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User name</th>
            <th scope="col">email</th>
            <th scope="col">role</th>
            <th scope="col">operations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0 ; $i < count($result) ; $i++ ){
        ?>
            <form method="post" action="edit.php">
            <tr class="row">
                <td data-label="Account"><?php  echo $result[$i]['id'] ?>  </td>
                <td data-label="Due Date"><?php  echo $result[$i]['username'] ?>  </td>
                <td data-label="Amount"><?php  echo $result[$i]['email'] ?>  </td>
                <td data-label="Period"><?php  echo $result[$i]['role'] ?>  </td>
                <td data-label="Period">
                    <button value="edit" class="editBtn" type="button" id="<?php echo  $result[$i]['id'] ?>">edit</button>
                    <button  name="delete_button" value="delete" class="deleteBtn">delete</button>
                </td>
            </tr>


            <tr class="editing" id="<?php echo  $result[$i]['id'] ?>"  style="display:none;">
                <td data-label="Account"><input name="id" value="<?php echo $result[$i]['id'] ?> " required></td>
                <td data-label="Due Date"><input name="username" value="<?php echo $result[$i]['username'] ?> " required></td>
                <td data-label="Amount"><input name="email" value="<?php echo $result[$i]['email'] ?> " required></td>
                <td data-label="Period"><input name="role" value="<?php echo $result[$i]['role'] ?> " required></td>
                <td data-label="Period">
                    <button  name="update_button" value="save" type="submit"  class="saveBtn" id="<?php echo $result[$i]['id'] ?>">Save </button>
                    <button value="cancel" class="cancelBtn" type="button" >Cancel</button>
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