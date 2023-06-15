<?php
// session_start();
// if(isset($_POST["Login"])){
//     $login=array('Prateek' => 'Innoraft');
//     $Username=isset($_POST['Username']) ? $_POST['Username']:'';
//     $Password=isset($_POST['Password']) ? $_POST['Password']:'';
//     if (isset($login[$Username]) && $login[$Username] == $Password){
//         $_SESSION['UserData']['Username']=$login[$Username];
//         header("location:index.php");
//         exit;
//     } 
//     else {
//         $msg="<span style='color:red'>Invalid Login Details</span>";    
//     }   
// }


// Starting the session
// ini_set('session.gc_maxlifetime', 0);
// session_set_cookie_params(0);
session_start();

// Setting the username and password
$Username='Prateek';
$Password='12345';

// Getting login message
if($_GET['msg']=="login")
{
    // Condition if iseet and if the username and password matches then only it will get login
    if(isset($_POST['Username']) && isset($_POST['Password'])){
        if($_POST['Username']==$Username && $_POST['Password']==$Password)
        {
            // Storing the username and password in the session
            $_SESSION['Username']=$Username;
            $_SESSION['Password']=$Password;
            header("Location: tasks.php");
        }

        // else condition for invalid username or password 
        else{
            echo "Invalid username or password";
        }
        // Heads to the same location, i.e. , login
        header('Location:');  
    }
} 

// Condition if iseet and if the username and password matches then only it will get login
if(isset($_POST['Username']) && isset($_POST['Password'])){
    if($_POST['Username']==$Username && $_POST['Password']==$Password)
    {
        // Storing the username and password in the session
        $_SESSION['Username']=$Username;
        $_SESSION['Password']=$Password;
        header("Location: tasks.php");
        exit;
    }
    // else condition for invalid username or password 
    else{
        echo "Invalid username or password";
    }
} 
?>