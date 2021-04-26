<?php
//According to the variable action class of controller will be called
include "includes/Connection.php";
include "includes/TableDatabaseClass.php";
include "includes/Controller.php"
?>


<?php
$mytable=new TableDatabase($connection,'products','id','image');
$mycontroller=new Controller($mytable);
//
//Get the action variable from the action sent value
$action=$_GET['action'] ?? 'home';
//if the $_GET['action'] not defined go to Adminhome.html.php the home page of admin
if ($action=='home') {require('Adminhome.html.php');}
//action variable is in the form table_action table is table name and 
//action is showall or addupdateForm or saverecord or delete
$tableaction=explode("_",$action);
$mytableaction=$tableaction[0];
$myaction="";
if (count($tableaction)>1) $myaction=$tableaction[1];
switch($mytableaction)
{   //According to the table name create $mytable object as instance of TableDatabase supply
    //the TableDatabase with the name of $mytableaction  
   case('product')
    :$mytable=new TableDatabase($connection,$mytableaction,'id');break;
   case('admin') 
   :$mytable=new TableDatabase($connection,$mytableaction,'id','image');break;
   case('category')
   :$mytable=new TableDatabase($connection,$mytableaction,'id');break;

 
}
$mycontroller=new Controller($mytable);

switch($myaction)
{
    //According to the $myaction call certain function on the controller
    case ('showall')      :$mycontroller->ShowAll();break;
    case ('addupdateForm'):$mycontroller->ShowAddNewEditForm();break;
    case ('saverecord')   :$mycontroller->UpdateAddNew();break;
    case ('delete')       :$mycontroller->Delete();break;

}
/*
if($action=='products_showall' )
{
    $mytable=new TableDatabase($connection,'products','id','image');
$mycontroller=new Controller($mytable);
$mycontroller->ShowAll();

}
if($action=='products_addupdateForm' )
{
    $arr=explode("_",$action);
    print_r($arr);
    $mytable=new TableDatabase($connection,'products','id','image');
$mycontroller=new Controller($mytable);
$mycontroller->ShowAddNewEditForm();

}
if($action=='products_saverecord' )
{
    $mytable=new TableDatabase($connection,'products','id','image');
$mycontroller=new Controller($mytable);
$mycontroller->UpdateAddNew();

}
if($action=='products_delete' )
{
    $mytable=new TableDatabase($connection,'products','id','image');
$mycontroller=new Controller($mytable);
$mycontroller->Delete();

}
if($action=='usersadmins_showall' )
{
    $mytable=new TableDatabase($connection,'usersadmins','id','image');
$mycontroller=new Controller($mytable);
$mycontroller->ShowAll();

}
if($action=='usersadmins_addupdateForm' )
{
    $mytable=new TableDatabase($connection,'usersadmins','id','image');
$mycontroller=new Controller($mytable);
$mycontroller->ShowAddNewEditForm();

}
if($action=='usersadmins_saverecord' )
{
    $mytable=new TableDatabase($connection,'usersadmins','id','image');
$mycontroller=new Controller($mytable);
$mycontroller->UpdateAddNew();

}
if($action=='usersadmins_delete' )
{
    $mytable=new TableDatabase($connection,'usersadmins','id','image');
$mycontroller=new Controller($mytable);
$mycontroller->Delete();

}*/
?>