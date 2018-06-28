<?php 
    //echo "Update Category Action PAge";
    //SESSION START
    session_start();
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Getting Value from Form
        $category_id = $_POST['category_id'];
        $category_title = $_POST['category_title'];
        $category_description = $_POST['category_description'];
        
        if(isset($_POST['is_active']))
        {
            $is_active = $_POST['is_active'];
        }
        else
        {
            $is_active = 0;
        }
        
        if(isset($_POST['include_in_menu']))
        {
            $include_in_menu = $_POST['include_in_menu'];
        }
        else
        {
            $include_in_menu = 0;
        }
        $updated_at = date('Y-m-d H:i:s');
        
        //Database Connection
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        //Database SElection
        $db_select = mysqli_select_db($conn, 'db_phpblog') or die(mysqli_error($conn));
        
        //Query to Update Users
        $query = "UPDATE tbl_categories SET 
            category_title = '$category_title',
            category_description = '$category_description',
            updated_at = '$updated_at',
            is_active = '$is_active',
            include_in_menu =' $include_in_menu'
             WHERE 
            category_id = '$category_id'
        ";
        //Executing Query
        $res = mysqli_query($conn,$query);
        
        if($res==true)
        {
            //Successfully Updated
            //echo "Updated SUccessfully";
            $_SESSION['update_success'] = "Category Successfully Updated";
            //Redirect to the Users Page
            header('location:http://localhost:81/phpblog/admin/categories.php');
        }
        else
        {
            //Failed to Update
            //echo "Failed to Update";
            $_SESSION['update_fail'] = "Failed to Update Category";
            
            //Redirect to Users Page
            header('location:http://localhost:81/phpblog/admin/categories.php');
        }
    }
    else
    {
        echo "Button Not Clicked";
    }
?>