<?php
include ('Admin/includes/Connection.php');
include ("Admin/includes/TableDatabaseClass.php");
$query="select * from product";
$stmt=$connection->prepare($query);
$stmt->execute();
$records=$stmt->fetchAll();
$cattable=new TableDatabase($connection,'category','id');

include("User/views/user_header.html.php");
?>
<main class="container">
    <h1 class="text-center">you are in home page which displays products</h1>
<?php foreach($records as $record):
    $recordcat=$cattable->FindById($record['category_id']);?>
<div class="mt-5 mx-auto">
<label>Product :</label>
<h6><?php echo $record['productname']?></h6>
<label>Category</label>
<h6><?php echo $recordcat['categorytname']?></h6>
</div>
<?php endforeach ;?>

</main>
</html>
<script src="Admin/js/jquery-3.5.1.min.js"></script>
<script src="Admin/js/bootstrap.min.js"></script>
