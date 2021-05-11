<?php
	session_start();
	include('config.php');

    
	$update=false;
	$id="";
    $productname="";
    $price="";
	$image="";

	

	if(isset($_POST['add'])){
		$productname=$_POST['productname'];
		$price=$_POST['price'];
		$image=$_FILES['image']['name'];
		$upload="uploads/".$image;

		$query="INSERT INTO product(productname,price,image)VALUES(?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssss",$productname,$price,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);
		header('location:dashboard2.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}

	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT image FROM product WHERE id=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['image'];
		unlink($imagepath);

		$query="DELETE FROM product WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:dashboard2.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM product WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['id'];
		$productname=$row['productname'];
		$price=$row['price'];
		$image=$row['image'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$productname=$_POST['productname'];
		$price=$_POST['price'];
		$oldimage=$_POST['oldimage'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="uploads/".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE product SET productname=?,price=?,image=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssssi",$productname,$price,$newimage,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:dashboard2.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM product WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id'];
		$vproductname=$row['productname'];
		$vprice=$row['price'];
		$vimage=$row['image'];
	}

    
?>