<?php 
    session_start();
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user']))
    {
        header('location:http://localhost:81/phpblog/admin/login.php');
    }
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        $blog_id = $_POST['blog_id'];
        $blog_title = $_POST['blog_title'];
        $blog_description = $_POST['blog_description'];
        $category_id = $_POST['category_id'];
        if(isset($_POST['is_active']))
        {
            $is_active = $_POST['is_active'];
        }
        else
        {
            $is_active = 0;
        }
        $updated_at = date('Y-m-d H:i:s');
        
        //Database Connect
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        //Database SElection
        $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
        
        $query = "UPDATE tbl_blogs SET 
            blog_title = '$blog_title',
            blog_description = '$blog_description',
            category_id = '$category_id',
            is_active = '$is_active',
            updated_at = '$updated_at' 
            WHERE 
            blog_id = $blog_id
        ";
        //die();
        $res = mysqli_query($conn,$query);
        if($res == true)
        {
            $_SESSION['update_success'] = "Blog Updated Successfully";
            header('location:http://localhost:81/phpblog/admin/blogs.php');
        }
        else
        {
            $_SESSION['update_fail'] = "Failed to Update Blog";
            header('location:http://localhost:81/phpblog/admin/blogs.php');
        }
    }
    else
    {
        //echo "Not Clicked";
        header('location:http://localhost:81/phpblog/admin/blogs.php');
    }
?>