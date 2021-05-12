<?php
$db='mysql:host=localhost;dbname=php_project';
$con=new PDO($db,'root','');
$query='select * from product ';
$sql=$con->prepare($query);
$sql->execute();
$result = $sql -> fetchAll();
$i = 0 ;
?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
<link href="bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="product.css">

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="border: 1px whitesmoke;">Global</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login%20(2).php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.html">sign in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <div class="heading">
	     <h1>Top Sell</h1>
    </div>
  	<div class="images-section">
      <div class="product-box">
      	<div class="image-wrapper">
      		<div class="image-box buy"  id=" <?php echo $result[$i]['id']; $i++ ?> " style="background-image: url('https://images.unsplash.com/photo-1491553895911-0055eca6402d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=800&q=80');">
            <div class="add-to-cart">
              <span class=" "><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
            </div>
          </div>
      		<div class="price-box">
             	<h1>Black Shoe</h1>
   	         <h5>Rs 2500</h5>
        	</div>
        </div>
      </div>

      <div class="product-box">
        <div class="image-wrapper">
          <div class="image-box buy"  id=" <?php echo $result[$i]['id']; $i++ ?> " style="background-image: url('https://images.unsplash.com/photo-1605034313761-73ea4a0cfbf3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80');">
            <div class="add-to-cart">
              <span><i class="fa fa-shopping-cart " aria-hidden="true"></i></span>
            </div>
          </div>
          <div class="price-box">
              <h1>White Shoe</h1>
             <h5>Rs 3500</h5>
          </div>
        </div>
      </div>

      <div class="product-box">
        <div class="image-wrapper">
          <div class="image-box buy"  id=" <?php echo $result[$i]['id']; $i++ ?> " style="background-image: url('https://images.unsplash.com/photo-1572635196237-14b3f281503f?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=800&q=80');">
            <div class="add-to-cart">
              <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
            </div>
          </div>
          <div class="price-box">
              <h1>Black Cobra</h1>
             <h5>Rs 4500</h5>
          </div>
        </div>
      </div>

      <div class="product-box">
        <div class="image-wrapper">
          <div class="image-box buy"  id=" <?php echo $result[$i]['id']; $i++?> " style="background-image: url('https://images.unsplash.com/photo-1491553895911-0055eca6402d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=800&q=80');">
            <div class="add-to-cart ">
              <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
            </div>
          </div>
          <div class="price-box">
              <h1>Sporty Style</h1>
             <h5>Rs 7500</h5>
          </div>
        </div>
      </div>
  	</div>
    <form action="product.php" method="post" class="buy-form" style="display: none;">
        <div class="mb-3">
            <label class="form-label">Product ID</label>
            <input type="text" class="form-control productId" name="id" >
        </div>
        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" class="form-control" name="amount" placeholder="enter the amount" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<script src="jquery-3.5.1.min.js"></script>
<script src="product.js"></script>
</body>