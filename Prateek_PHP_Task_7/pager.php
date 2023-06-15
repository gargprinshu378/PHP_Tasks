<?php

// Starting the session

session_start();

// setting the username and heading it to index.php
if(!isset($_SESSION["Username"])) {
    header("Location: index.php?msg=login");
    exit;
}  
//otherwise logging out
elseif(isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}

// by getting q=1 or anything else it will head to that file.
if(isset($_GET["q"])){
    $q=$_GET["q"];
    if($q>0 && $q<=6){
        header("Location: ./Prateek_PHP_Task_$q/index.php");
    }
}
?>