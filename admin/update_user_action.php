<?php 
    //echo "Update User Action PAge";
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
        
        //Database Connection
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        //Database SElection
        $db_select = mysqli_select_db($conn, 'db_phpblog') or die(mysqli_error($conn));
        
        //Query to Update Users
        $query = "UPDATE tbl_users SET 
            full_name = '$full_name',
            username = '$username',
            email = '$email',
            password = '$password',
            updated_at = '$updated_at' WHERE 
            user_id = '$user_id'
        ";
        //Executing Query
        $res = mysqli_query($conn,$query);
        
        if($res==true)
        {
            //Successfully Updated
            echo "Updated SUccessfully";
        }
        else
        {
            //Failed to Update
            echo "Failed to Update";
        }
    }
    else
    {
        echo "Button Not Clicked";
    }
?>