<?php
include ("../User/views/user_header.html.php");
?>
<body >
<main class="container" >
    <div class="col-3 mx-auto">
        <h6 class="text-center">You are in DashBoard page</h6>
<a href="Adminroutes.php?action=admin_showall" class="btn btn-dark w-100 mt-5">Users Admins Table</a><br>
<a href="Adminroutes.php?action=product_showall" class="btn btn-dark w-100 btn-lg mt-5">Products Table</a><br>
<a href="Adminroutes.php?action=category_showall" class="btn btn-dark w-100 mt-5">Category  Table</a>
    </div>
</main>
</body>