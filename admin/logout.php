<?php 
    session_start();
    //Delete all Session
    session_destroy();
    //Redirect to login page
    header('location:http://localhost:81/phpblog/admin/login.php');
?>