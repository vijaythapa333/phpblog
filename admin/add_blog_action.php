<?php 
    session_start();
    include('../config/constants.php');
    if(!isset($_SESSION['user']))
    {
        header('location:'.SITEURL.'admin/login.php');
    }
    //echo "Add Blog Action Page";
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        //Getting VAlues from Add Blog Form
        $blog_title = $_POST['blog_title'];
        $blog_description = $_POST['blog_description'];
        $category_id = $_POST['category_id'];
        
        if(isset($_POST['is_active']))
        {
            $is_active=$_POST['is_active'];
        }
        else
        {
            $is_active = 0;
        }
        $created_at = date('Y-m-d H:i:s');
        
        
        //Connectng Database
        $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,DBNAME);
        
        //Insert Query
        $query = "INSERT INTO tbl_blogs SET 
            blog_title = '$blog_title',
            blog_description = '$blog_description',
            category_id = '$category_id',
            is_active = '$is_active',
            created_at = '$created_at'
        ";
        
        //Execute Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //echo "Inserted Successfully";
            //Set Session Message
            $_SESSION['add_success'] = "Blog added successfully.";
            //Redirect to Home Page
            header('location:'.SITEURL.'admin/blogs.php');
        }
        else
        {
            //echo "Failed to Insert";
            //Set Session Message
            $_SESSION['add_fail'] = "Failed to add blog.";
            //Redirect to Home Page
            header('location:'.SITEURL.'admin/add_blog.php');
        }
    }
    else
    {
        echo "Not Clicked";
    }
?>