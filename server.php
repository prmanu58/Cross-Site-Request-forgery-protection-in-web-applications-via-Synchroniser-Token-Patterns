<?php

//start session 
session_start();

//Key for CSRF token
if(empty($_SESSION['key']))
{
    $_SESSION['key']=bin2hex(random_bytes(32));
    
}

//generate CSRF token
$token = hash_hmac('sha256',"This is token:index.php",$_SESSION['key']);

$_SESSION['CSRF'] = $token; //storing the CSRF token in session variable

ob_start();

echo $token;


if(isset($_POST['sbmt']))
{
    ob_end_clean(); //clean previous echo 
    
    //validate login
    loginvalidate($_POST['CSR'],$_COOKIE['session_id'],$_POST['user_name'],$_POST['user_pswd']);

}


//Login validate function
function loginvalidate($user_CSRF,$user_sessionID, $username, $password)
{
    if($username=="pramesh" && $password=="pramesh123" && $user_CSRF==$_SESSION['CSRF'] && $user_sessionID==session_id())
    {
        echo "<script> alert('Login Sucess') </script>";
        echo "Welcome Pramesh Anuradha"."<br/>"; 
        apc_delete('CSRF_token');
    }
    else
    {
        echo "<script> alert('Login Failed') </script>";
        echo "Login Failed ! "."<br/>"."Authorization Failed!! Please reset!";
        
    }
}


?>