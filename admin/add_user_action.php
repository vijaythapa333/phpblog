<?php 

    //Start SESSION
    session_start();
    
    if(isset($_POST['submit']))
    {
        
        //Getting Values from UI
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
        
        $created_at = date('Y-m-d H:i:s');
        
        //Connectng Database
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        
        //Selecting Database
        $db_select = mysqli_select_db($conn,'db_phpblog');
        
        //Query to Insert Data into Database
        $query = "INSERT INTO tbl_users SET full_name='$full_name', 
        username='$username', 
        email='$email',
        password='$password',
        is_active='$is_active',
        created_at='$created_at'
        ";
        
        //Executing Query
        $res = mysqli_query($conn,$query);
        if($res==true)
        {
            //User Successfully Inserted
            //echo "User Added Successfully";
            //Create SESSIOn VARIABLE and SET ITS VALUE
            $_SESSION['add_success']="User Added Successfully";
            
            //Redirect to Users Page
            header('location:http://localhost:81/phpblog/admin/users.php');
            
        }
        else
        {
            //Failed to Insert User
            //echo "Failed to Add User";
            $_SESSION['add_fail'] = "Failed to Add User";
            
            //REdirect toAdd User Page
            header('location:http://localhost:81/phpblog/admin/add_user.php');
        }
        
        
        
    }
?>

