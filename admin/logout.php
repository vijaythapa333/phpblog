<?php 
    session_start();
    include('../config/constants.php');
    //Delete all Session
    session_destroy();
    //Redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>