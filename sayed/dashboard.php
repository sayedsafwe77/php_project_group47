<?php
// switch($_GET['operation'])
// {
//     case 'login': echo '<p style="color: red">you are logged in</p>';
//     break;
//     case 'register': echo '<p style="color: green">register done succeffully</p>';
//     break;
//     case 'addToCard': echo '<p style="color: blue">item added</p>';
//     break;
// }
if(isset($_COOKIE['userLogin']))
{
    if(isset($_COOKIE['Role']))
    {
        if($_COOKIE['Role']=='admin')
        {
            //to dashboard
            // $host=$_SERVER['SERVER_ADDR'];
            $actual_link = "$_SERVER[REQUEST_URI]";
            if($actual_link=='/php_project/dashboard2.php'){

            }
            else{
                header('Location:http://localhost/php_project/dashboard2.php');
            }
        }
        else
        {
            // to profile
            header('Location:http://localhost/php_project/profile.html');
        }
    }
    
}
else{
    // to login
    header('Location:http://localhost/php_project/login.html');
}


?>