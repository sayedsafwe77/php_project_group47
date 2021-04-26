<?php include('views/header.html.php');
include ("../Admin/includes/Connection.php");
$cattable=new TableDatabase($connection ,'category','id');   
?>
<body class="container">
   <table class="table table-dark table-bordered">
    
        <tr>
            <th>id</th>
            <th>name</th>
            
            <th>Category</th>
            <th>Controll</th>
            
        </tr>
    <?php foreach($records as $record):
    $catname=($cattable->FindById($record['category_id']))
        ?>
        
        <tr>
            <td><?=$record['id']?></td>
            <td><?=$record['productname']?></td>
            <td><?=$catname['categorytname'] ?></td>
            <td><a href="Adminroutes.php?action=product_addupdateForm&id=<?=$record['id']?>" class='btn btn-success'>Edit</a>
               <form method='post' action="Adminroutes.php?action=product_delete" class="d-inline-flex">
                    <input type='hidden' name='id' value="<?=$record['id'] ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                </form>
               
    </td>    
        </tr>
    <?php endforeach;?>




   </table>
<a href="Adminroutes.php?action=product_addupdateForm" class="btn btn-success">Add New Product</a>
</body>

</html>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
