<?php
	session_start();
	include('config.php');

	$update=false;
	$id="";
	$username="";
	$email="";
	$role="";
	$image="";

	
	if(isset($_POST['add'])){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$role=$_POST['role'];

		$image=$_FILES['image']['name'];
		$upload="uploads/".$image;

		$query="INSERT INTO users(username,email,role,image)VALUES(?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssss",$username,$email,$role,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);

		header('location:dashboard.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}



	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT image FROM users WHERE id=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['image'];
		unlink($imagepath);

		$query="DELETE FROM users WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:dashboard.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM users WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['id'];
		$username=$row['username'];
		$email=$row['email'];
		$role=$row['role'];
		$image=$row['image'];
		$update=true;
	}
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$role=$_POST['role'];
		$oldimage=$_POST['oldimage'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="uploads/".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE users SET username=?,email=?,role=?,image=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssssi",$username,$email,$role,$newimage,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:dashboard.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM users WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id'];
		$vusername=$row['username'];
		$vemail=$row['email'];
		$vrole=$row['role'];
		$vimage=$row['image'];
	}
?>