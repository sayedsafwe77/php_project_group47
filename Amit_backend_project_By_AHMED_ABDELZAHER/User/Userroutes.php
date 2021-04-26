<?php
include ("../Admin/includes/Connection.php");
include ("includes/HomeController.php");
$homecontroller=new HomeController();
$action=$_GET['action'] ?? "userhome";
if($action=='userhome') include('views/userhome.html.php');
if($action=='loginForm') {echo"الحمد لله";$homecontroller->loginForm();};
if($action=="login") $homecontroller->Login($connection,'admin');
if($action=="logout") $homecontroller->Logout();
if($action=="register") header("location: ../Admin/Adminroutes.php?action=admin_addupdateForm");