<?php 
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        echo $full_name = $_POST['full_name'];
        echo $username = $_POST['username'];
        echo $email = $_POST['email'];
        echo $password = $_POST['password'];
    }
?>