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
    if(isset($_COOKIE['role']))
    {
        if($_COOKIE['role']=='admin')
        {
            //to dashboard
            header('Location:http://localhost/project/dashboard2.php');
            
        }
        else
        {
            // to profile
            header('Location:http://localhost/project/profile.php');
        }
    }
    
}
else{
    // to login
    header('Location:http://localhost/project/login (2).php');
}

?>