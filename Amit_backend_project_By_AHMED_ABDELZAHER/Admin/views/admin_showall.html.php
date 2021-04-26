<?php include('views/header.html.php') ?>

<body class="container">
   <table class="table table-dark table-bordered">
    
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>image</th>
            <th>paswssword</th>
            <th>role</th>
            
            <th>Controll</th>
            
        </tr>
    <?php foreach($records as $record):$mysrc="images/admin/".$record['image'];?>
        <tr>
            <td><?=$record['id']?></td>
            <td><?=$record['username']?></td>
            <td><?=$record['email']?></td>
            <td><image src="<?=$mysrc?>" width="40" ></image></td>
            <td><?=$record['userpassword']?></td>
            <td><?=$record['role']?></td>
            <td><a href="Adminroutes.php?action=admin_addupdateForm&id=<?=$record['id']?>" class='btn btn-success'>Edit</a>
               <form method='post' action="Adminroutes.php?action=admin_delete" class="d-inline-flex">
                    <input type='hidden' name='id' value="<?=$record['id'] ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                </form>
               
    </td>    
        </tr>
    <?php endforeach;?>




   </table>
<a href="Adminroutes.php?action=admin_addupdateForm" class="btn btn-success">Add New Account</a>
</body>

</html>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
