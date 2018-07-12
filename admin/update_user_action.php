<?php 
    //echo "Update User Action PAge";
    //SESSION START
    session_start();
    include('../config/constants.php');
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/login.php');
    }
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Getting Value from Form
        $user_id = $_POST['user_id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(isset($_POST['is_active']))
        {
            $is_active = $_POST['is_active'];
        }
        else
        {
            $is_active = 0;
        }
        $updated_at = date('Y-m-d H:i:s');
        
        //Connectng Database
        $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,DBNAME);
        
        //Query to Update Users
        $query = "UPDATE tbl_users SET 
            full_name = '$full_name',
            username = '$username',
            email = '$email',
            password = '$password',
            updated_at = '$updated_at',
            is_active='$is_active'
             WHERE 
            user_id = '$user_id'
        ";
        //Executing Query
        $res = mysqli_query($conn,$query);
        
        if($res==true)
        {
            //Successfully Updated
            //echo "Updated SUccessfully";
            $_SESSION['update_success'] = "Users Successfully Updated";
            //Redirect to the Users Page
            header('location:'.SITEURL.'admin/users.php');
        }
        else
        {
            //Failed to Update
            //echo "Failed to Update";
            $_SESSION['update_fail'] = "Failed to Update User";
            
            //Redirect to Users Page
            header('location:'.SITEURL.'admin/users.php');
        }
    }
    else
    {
        echo "Button Not Clicked";
    }
?>