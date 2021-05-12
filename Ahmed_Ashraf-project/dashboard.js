
$('#register').click(register);
$('#addToCard').click(addToCard);
$('#login').click(login);


function login()
{
    $.get('dashboard.php',{
        name: 'sayed',
        email: 'sayedsafwet4@gmail.com',
        operation: 'login'
    },function(x,y){
        $('#welcome').html(x);
        console.log(y);
    });

}

function register()
{
   
    $.get('dashboard.php',{
        name: 'sayed',
        email: 'sayedsafwet4@gmail.com',
        operation: 'register'
    },function(data){
        $('#welcome').html(data);
        console.log(status);
    });

}



function addToCard()
{
    $.get('dashboard.php',{
        name: 'sayed',
        email: 'sayedsafwet4@gmail.com',
        operation: 'addToCard'
    },function(data){
        $('#welcome').html(data);
        console.log(status);
    });
}