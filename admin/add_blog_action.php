<?php 
    session_start();
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
        
        
        //Database Connection
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        //Database SElection
        $db_select = mysqli_select_db($conn,'db_phpblog') or die(mysqli_error($conn));
        
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
            header('location:http://localhost:81/phpblog/admin/blogs.php');
        }
        else
        {
            //echo "Failed to Insert";
            //Set Session Message
            $_SESSION['add_fail'] = "Failed to add blog.";
            //Redirect to Home Page
            header('location:http://localhost:81/phpblog/admin/add_blog.php');
        }
    }
    else
    {
        echo "Not Clicked";
    }
?>